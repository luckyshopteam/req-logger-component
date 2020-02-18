<?php
/**
 * @copyright Copyright &copy; LuckyOnline, lucky.online, 2019
 * @package
 * @version   1.0.0
 */

namespace Lucky\RequestLogger;

use Lucky\RequestLogger\Entity\LogInterface;
use Lucky\RequestLogger\Exception\InvalidConfigException;
use Lucky\RequestLogger\Transport\KafkaTransport;
use Lucky\RequestLogger\Transport\TransportInterface;

/**
 * @author LuckyOnline
 * @since  1.0
 */
class Client implements ClientInterface
{
    /**
     * @var Client $instance
     */
    protected static $instance;

    /**
     * @var TransportInterface
     */
    protected $transport;

    /**
     * Инициализация клиента
     *
     * @param array $config
     *
     * @return void
     * @throws InvalidConfigException
     */
    public static function init(array $config): void
    {
        $client = new static();
        $client->setTransport(static::createTransport($config['transport'] ?? []));

        static::$instance = $client;
    }

    /**
     * @inheritDoc
     */
    public static function instance(): ?ClientInterface
    {
        return static::$instance;
    }

    /**
     * @param TransportInterface $transport
     *
     * @return Client
     */
    public function setTransport(TransportInterface $transport): ClientInterface
    {
        $this->transport = $transport;

        return $this;
    }

    /**
     * @param LogInterface $log
     *
     * @return void
     */
    public function sendLog(LogInterface $log): void
    {
        $this->transport->send($log);
    }

    /**
     * @param array|object $config
     *
     * @return TransportInterface
     * @throws InvalidConfigException
     */
    protected static function createTransport($config)
    {
        if (!$config) {
            throw new InvalidConfigException('Transport configuration is empty');
        } elseif (is_object($config)) {
            $transport = $config;
        } else {
            $transportClass = $config['class'] ?? KafkaTransport::class; //по дефолту ставим кафку
            unset($config['class']);
            $transport = new $transportClass($config);
        }

        if ($transport instanceof TransportInterface) {
            return $transport;
        }

        throw new InvalidConfigException('The class ' . get_class($transport) .' must implement ' . TransportInterface::class);
    }
}