<?php

namespace Lucky\RequestLogger\Transport;

/**
 * Сохранение данных в файл
 *
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
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->initFilePath($config['filePath'] ?? null);
    }

    /**
     * @param array  $data
     * @param string $queue
     */
    public function send(array $data, string $queue): void
    {
        if (!file_exists($this->filePath)) {
            mkdir($this->filePath, 0777, true );
        }

        file_put_contents($this->filePath . '/' . $queue, var_export($data, true) . PHP_EOL, FILE_APPEND | LOCK_EX);
    }

    /**
     * Инициализация пути для для сохранения файлов
     *
     * @param string $filePath
     */
    protected function initFilePath(?string $filePath = null): void
    {
        $this->filePath = $filePath ? $filePath : __DIR__ . '/../../../../../runtime/request_logger';
    }
}