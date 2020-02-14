<?php

declare(strict_types=1);

namespace Lucky\RequestLogger;

/**
 * @param array|ClientInterface $config Параметры для инициализации клиента
 */
function init($config = []): void {
    $client = is_array($config) ? (new ClientBuilder)->build($config) : $config;
    RequestLogger::setClient($client);
}