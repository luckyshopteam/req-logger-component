<?php

namespace Lucky\RequestLogger\Transport;

use Lucky\RequestLogger\Entity\LogInterface;

/**
 * Заглушка
 *
 * @package Lucky\RequestLogger
 */
class NullTransport implements TransportInterface
{
    public function __construct(array $config) {}

    public function send(LogInterface $log): void { }
}