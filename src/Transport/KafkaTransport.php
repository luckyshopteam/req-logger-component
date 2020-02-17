<?php

namespace Lucky\RequestLogger\Transport;

use Lucky\RequestLogger\Exception\InvalidConfigException;
use Lucky\RequestLogger\Exception\TransportException;
use RdKafka\Conf;
use RdKafka\Producer;
use RdKafka\TopicConf;

/**
 * Class Queue
 *
 * @package Lucky\RequestLogger
 */
class KafkaTransport implements TransportInterface
{
    private $brokers;
    private $logLevel;

    private $producer;
    private $producerConf;

    private $topicConf;

    public function __construct(array $config)
    {
        if (!isset($config['brokers'])) {
            throw new InvalidConfigException('Broker list must be set');
        }

        $this->setBrokers($config['brokers']);
        $this->setLogLevel($config['logLevel'] ?? LOG_NOTICE);
    }

    /**
     * @param array  $data
     * @param string $queue
     *
     * @throws TransportException
     */
    public function send(array $data, string $queue): void
    {
        try {
            $topic = $this->getProducer()->newTopic($queue);
            $topic->produce(RD_KAFKA_PARTITION_UA, 0, $this->serialize($data));
            $this->getProducer()->poll(15000);
        } catch (\Throwable $exception) {
            throw new TransportException('Unknown error', 500, $exception);
        }
    }

    /**
     * @return TopicConf
     */
    private function getTopicConf()
    {
        if (!$this->topicConf) {
            $this->topicConf = new TopicConf();
            // produce
            $this->topicConf->set('acks', 'all'); // подтверждение записи;
            $this->topicConf->set('message.timeout.ms', 5000); // макс таймаут отправки сообщения
            // consumer
            $this->topicConf->set('auto.offset.reset', 'largest');
        }

        return $this->topicConf;
    }

    /**
     * @return Conf
     */
    private function getProducerConf()
    {
        if (!$this->producerConf) {
            $this->producerConf = new Conf();
            $this->producerConf->set('retries', 5); // максимальное кол-во попыток
            $this->producerConf->set('bootstrap.servers', $this->brokers); // бутстрап серверов
            $this->producerConf->set('metadata.request.timeout.ms', 5000);
            $this->producerConf->set('topic.metadata.refresh.interval.ms', 5000);
            $this->producerConf->setDefaultTopicConf($this->getTopicConf());

            // ставим обработчики ошибок
            $this->producerConf->setDrMsgCb(function($kafka, $message) {
                if ($message->err) {
                    throw new TransportException('Error send message');
                }
            });
            $this->producerConf->setErrorCb(function($kafka, $err, $reason) {
                throw (new TransportException(printf("Kafka error: %s (reason: %s)\n", rd_kafka_err2str($err), $reason)));
            });
        }

        return $this->producerConf;
    }

    /**
     * @return \RdKafka\Producer
     */
    private function getProducer()
    {
        if (!$this->producer) {
            $this->producer = new Producer($this->getProducerConf());
            $this->producer->setLogLevel($this->logLevel);
            $this->producer->addBrokers($this->brokers);
        }

        return $this->producer;
    }

    /**
     * Сериализуем только объекты которые есть в пп.
     * В дальнейшем оставим только json объект
     *
     * @param array $data
     * @return false|string
     */
    private function serialize(array $data)
    {
        return json_encode([
            'body'       => json_encode($data),
            'headers'    => [],
            'properties' => [],
        ]);
    }

    /**
     * @inheritDoc
     */
    public function setLogLevel(int $level): void
    {
        $this->logLevel = $level;
    }

    /**
     * @inheritDoc
     */
    public function setBrokers(string $brokers): void
    {
        $this->brokers = $brokers;
    }
}