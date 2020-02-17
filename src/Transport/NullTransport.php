<?php

namespace Lucky\RequestLogger\Transport;

/**
 * Заглушка
 *
 * @package Lucky\RequestLogger
 */
class NullTransport implements TransportInterface
{

    public function __construct(array $config) {}

    public function send(array $data, string $queue): void { }
}