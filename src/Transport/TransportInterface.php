<?php

namespace Lucky\RequestLogger\Transport;

use Lucky\RequestLogger\LogInterface;

interface TransportInterface
{

    /**
     * @param LogInterface $log
     */
    public function send(LogInterface $log): void;
}