<?php
/**
 * @copyright Copyright &copy; LuckyOnline, lucky.online, 2019
 * @package
 * @version   1.0.0
 */

namespace Lucky\RequestLogger;

use Lucky\RequestLogger\Transport\TransportInterface;

/**
 * @author LuckyOnline
 * @since  1.0
 */
interface ClientInterface
{
    /**
     * @param LogInterface $entity
     * @return void
     */
    public function sendLog(LogInterface $entity): void;

    /**
     * @param TransportInterface $transport
     * @return ClientInterface
     */
    public function setTransport(TransportInterface $transport): ClientInterface;
}