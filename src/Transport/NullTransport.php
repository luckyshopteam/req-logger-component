<?php

namespace Lucky\RequestLogger\Transport;

use Lucky\RequestLogger\LogInterface;

/**
 * Заглушка
 *
 * @package Lucky\RequestLogger
 */
class NullTransport implements TransportInterface
{

    public function send(LogInterface $log): void
    {
    }
}