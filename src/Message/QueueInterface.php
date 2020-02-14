<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 2019-03-04
 * Time: 23:55
 */

namespace Lucky\RequestLogger\Message;

interface QueueInterface
{
    public function __construct(array $config);

    /**
     * @param array $data
     * @param string|null $queue
     */
    public function push(array $data, string $queue): void;

    /**
     * @param bool $emulate
     * @return void
     */
    public function setEmulatePush(bool $emulate): void;
}