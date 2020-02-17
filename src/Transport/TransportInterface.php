<?php

namespace Lucky\RequestLogger\Transport;

interface TransportInterface
{
    public function __construct(array $config);

    /**
     * @param array $data
     * @param string|null $queue
     */
    public function send(array $data, string $queue): void;
}