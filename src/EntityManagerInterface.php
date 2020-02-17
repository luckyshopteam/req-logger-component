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
interface EntityManagerInterface
{
    /**
     * @param LogInterface $entity
     * @param string       $queue
     *
     * @return void
     */
    public function sendLog(LogInterface $entity, string $queue = Queues::REQUEST_LOG_QUEUE) :void;

    /**
     * @param TransportInterface $transport
     *
     * @return EntityManagerInterface
     */
    public function setTransport(TransportInterface $transport) :EntityManagerInterface;
}