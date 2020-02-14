<?php
/**
 * @copyright Copyright &copy; LuckyOnline, lucky.online, 2019
 * @package
 * @version   1.0.0
 */

namespace Lucky\RequestLogger;

use Lucky\RequestLogger\Entity\LogInterface;

/**
 * @author LuckyOnline
 * @since  1.0
 */
interface ClientInterface
{
    /**
     * @param LogInterface $entity
     * @param string       $queue
     *
     * @return void
     */
    public function log(LogInterface $entity, string $queue = Queues::REQUEST_LOG_QUEUE): void;
}