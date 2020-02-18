<?php
/**
 * @copyright Copyright &copy; LuckyOnline, lucky.online, 2019
 * @package
 * @version   1.0.0
 */

namespace Lucky\RequestLogger;

use Lucky\RequestLogger\Entity\LogInterface;
use Lucky\RequestLogger\Transport\TransportInterface;

/**
 * @author LuckyOnline
 * @since  1.0
 */
interface ClientInterface
{
    /**
     * Инициализация клиента
     *
     * @param array $config
     * @return void
     */
    public static function init(array $config): void;

    /**
     * Получение экземпляра клиента.
     * Сначала нужно проинициализировать клиент вызвав метод init()
     *
     * @return ClientInterface|null
     *
     * @see init()
     * @see Client::init()
     */
    public static function instance(): ?ClientInterface;

    /**
     * @param LogInterface $entity
     * @return void
     */
    public function sendLog(LogInterface $entity): void;

    /**
     * @param TransportInterface $transport
     * @return ClientInterface
     */
    public function setTransport(TransportInterface $transport) :ClientInterface;
}