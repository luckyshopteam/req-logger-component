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
class Client implements ClientInterface
{

    /**
     * @var TransportInterface
     */
    protected $transport;

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

}