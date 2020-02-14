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
interface EntityManagerInterface
{
    /**
     * @param LogInterface $entity
     * @param string       $queue
     *
     * @return void
     */
    public function push(LogInterface $entity, string $queue = Queues::REQUEST_LOG_QUEUE) :void;

    /**
     * @param QueueInterface $store
     *
     * @return EntityManagerInterface
     */
    public function setQueue(QueueInterface $store) :EntityManagerInterface;
}