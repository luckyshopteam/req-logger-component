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
class RequestLogger
{
    /**
     * @var ClientInterface
     */
    private static $client;

    /**
     * @return ClientInterface
     */
    public static function client() :ClientInterface
    {
        return self::$client;
    }

    /**
     * @param ClientInterface $client
     * @return void
     */
    public static function setClient(ClientInterface $client) :void
    {
        self::$client = $client;
    }

    /**
     * @param LogInterface $entity
     * @param string       $queue
     *
     * @return void
     */
    public static function logEntity(LogInterface $entity, string $queue = Queues::REQUEST_LOG_QUEUE)
    {
        self::client()->log($entity, $queue);
    }
}