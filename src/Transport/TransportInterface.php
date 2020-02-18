<?php

namespace Lucky\RequestLogger\Transport;

use Lucky\RequestLogger\Entity\LogInterface;

interface TransportInterface
{
    public function __construct(array $config);

    /**
     * @param LogInterface $log
     */
    public function send(LogInterface $log): void;
}