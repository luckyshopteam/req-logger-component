<?php
/**
 * @copyright Copyright &copy; LuckyOnline, lucky.online, 2019
 * @package
 * @version   1.0.0
 */

namespace Lucky\RequestLogger;

use Lucky\RequestLogger\Entity\LogInterface;
use Lucky\RequestLogger\Transport\TransportInterface;

/**
 * @author LuckyOnline
 * @since  1.0
 */
class EntityManager implements EntityManagerInterface
{
    /**
     * @var TransportInterface
     */
    private $transport;

    /**
     * @param TransportInterface $transport
     *
     * @return EntityManagerInterface
     */
    public function setTransport(TransportInterface $transport): EntityManagerInterface
    {
        $this->transport = $transport;

        return $this;
    }

    /**
     * @param LogInterface $entity
     * @param string       $queue
     *
     * @return void
     */
    public function sendLog(LogInterface $entity, string $queue = Queues::REQUEST_LOG_QUEUE): void
    {
        $this->transport->send($entity->prepareToBrokerInsert(), $queue);
    }
}