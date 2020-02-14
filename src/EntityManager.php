<?php
/**
 * @copyright Copyright &copy; LuckyOnline, lucky.online, 2019
 * @package
 * @version   1.0.0
 */

namespace Lucky\RequestLogger;

use Lucky\RequestLogger\Entity\LogInterface;
use Lucky\RequestLogger\Message\QueueInterface;

/**
 * @author LuckyOnline
 * @since  1.0
 */
class EntityManager implements EntityManagerInterface
{
    /**
     * @var QueueInterface
     */
    private $queue;

    /**
     * @param QueueInterface $queue
     *
     * @return EntityManagerInterface
     */
    public function setQueue(QueueInterface $queue): EntityManagerInterface
    {
        $this->queue = $queue;

        return $this;
    }

    /**
     * @param LogInterface $entity
     * @param string       $queue
     *
     * @return void
     */
    public function push(LogInterface $entity, string $queue = Queues::REQUEST_LOG_QUEUE): void
    {
        $this->queue->push($entity->prepareToBrokerInsert(), $queue);
    }
}