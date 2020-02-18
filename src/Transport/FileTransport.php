<?php

namespace Lucky\RequestLogger\Transport;

use Lucky\RequestLogger\Entity\LogInterface;

/**
 * Сохранение данных в файл
 *
 * @package Lucky\RequestLogger
 */
class FileTransport implements TransportInterface
{
    use TransportTrait;

    const DEFAULT_FILENAME = 'request_logger';
    const DEFAULT_FILEPATH = '/../../../../../runtime/request_logger';

    /**
     * @var string $filePath
     */
    private $filePath;
    /**
     * @var string $fileName
     */
    private $fileName;

    /**
     * FileTransport constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->initFilePath($config['filePath'] ?? null);
        $this->initFileName($config['fileName'] ?? null);
    }

    /**
     * @param LogInterface $log
     */
    public function send(LogInterface $log): void
    {
        if (!file_exists($this->filePath)) {
            mkdir($this->filePath, 0777, true );
        }

        file_put_contents(
            $this->filePath . '/' . $this->fileName,
            var_export($this->prepareLogData($log), true) . PHP_EOL,
            FILE_APPEND | LOCK_EX
        );
    }

    /**
     * Инициализация пути для сохранения файлов
     *
     * @param string $filePath
     */
    protected function initFilePath(?string $filePath = null): void
    {
        $this->filePath = $filePath ?? __DIR__ . self::DEFAULT_FILEPATH;
    }

    /**
     * Инициализация имени файла
     *
     * @param string $fileName
     * @return void
     */
    protected function initFileName(?string $fileName = null): void
    {
        $this->fileName = $fileName ?? self::DEFAULT_FILENAME;
    }
}