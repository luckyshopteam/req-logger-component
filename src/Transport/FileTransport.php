<?php

namespace Lucky\RequestLogger\Transport;

use Lucky\RequestLogger\LogInterface;

/**
 * Сохранение данных в файл
 * @package Lucky\RequestLogger
 */
class FileTransport implements TransportInterface
{

    /**
     * @var string $filePath
     */
    private $filePath;

    /**
     * FileTransport constructor.
     *
     * @param string $filePath
     */
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
        if (!file_exists(dirname($this->filePath))) {
            mkdir(dirname($this->filePath), 0777, true);
        }
    }

    /**
     * @param LogInterface $log
     */
    public function send(LogInterface $log): void
    {
        file_put_contents(
            $this->filePath,
            var_export($log, true) . PHP_EOL,
            FILE_APPEND | LOCK_EX
        );
    }

}