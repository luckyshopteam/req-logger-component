<?php
/**
 * @copyright Copyright &copy; LuckyOnline, lucky.online, 2019
 * @package
 * @version   1.0.0
 */

namespace Lucky\RequestLogger;

use Lucky\RequestLogger\Exception\InvalidConfigException;
use Lucky\RequestLogger\Transport\KafkaTransport;
use Lucky\RequestLogger\Transport\TransportInterface;

/**
 * @author LuckyOnline
 * @since  1.0
 */
class ClientEntityManagerBuilder
{
    /**
     * @param array $config
     *
     * @return EntityManagerInterface
     * @throws InvalidConfigException
     */
    public function build(array $config): EntityManagerInterface
    {
        $manager = new EntityManager();
        $manager->setTransport($this->createTransport($config['transport'] ?? []));

        return $manager;
    }

    /**
     * @param array|object $config
     *
     * @return TransportInterface
     * @throws InvalidConfigException
     */
    public function createTransport($config)
    {
        if (is_object($config)) {
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