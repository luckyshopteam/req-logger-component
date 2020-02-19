<?php
/**
 * @copyright Copyright &copy; LuckyOnline, lucky.online, 2019
 * @package
 * @version   1.0.0
 */

namespace Lucky\RequestLogger;

use DateTime;

/**
 * @author LuckyOnline
 * @since  1.0
 */
interface LogInterface
{
    /**
     * @return string
     */
    public function getAppKey();

    /**
     * @param string $value
     * @return void
     */
    public function setAppKey(string $value): void;

    /**
     * @return string|integer
     */
    public function getAction();

    /**
     * @param string|integer $value
     * @return void
     */
    public function setAction($value = null): void;

    /**
     * @return string|integer
     */
    public function getFilter1();

    /**
     * @return string|integer
     */
    public function getFilter2();

    /**
     * @return string|integer
     */
    public function getFilter3();

    /**
     * @return string|integer
     */
    public function getFilter4();

    /**
     * @return string|integer
     */
    public function getFilter5();

    /**
     * @return DateTime
     */
    public function getDatetime(): ?DateTime;

    /**
     * @return boolean
     */
    public function getIsInternal(): ?bool;

    /**
     * @return string
     */
    public function getRequestUrl(): ?string;

    /**
     * @return mixed
     */
    public function getRequestHeader(): ?string;

    /**
     * @return mixed
     */
    public function getRequestData(): ?string;

    /**
     * @return mixed
     */
    public function getResponseHeader(): ?string;

    /**
     * @return mixed
     */
    public function getResponseData(): ?string;

    /**
     * @return string
     */
    public function getRequestMethod(): ?string;

    /**
     * @return integer
     */
    public function getResponseStatusCode(): ?int;

    /**
     * @return array
     */
    public function getData(): ?array;

    /**
     * @param array $value
     * @return void
     */
    public function setData(?array $value): void;

    /**
     * @param string|integer $value
     * @return void
     */
    public function setFilter1($value): void;

    /**
     * @param string|integer $value
     * @return void
     */
    public function setFilter2($value): void;

    /**
     * @param string|integer $value
     * @return void
     */
    public function setFilter3($value): void;

    /**
     * @param string|integer $value
     * @return void
     */
    public function setFilter4($value): void;

    /**
     * @param string|integer $value
     * @return void
     */
    public function setFilter5($value): void;

    /**
     * @param DateTime $value
     * @return void
     */
    public function setDatetime(DateTime $value): void;

    /**
     * @param boolean $value
     *
     * @return void
     */
    public function setIsInternal(bool $value): void;

    /**
     * @param string $value
     *
     * @return void
     */
    public function setRequestUrl(string $value): void;

    /**
     * @param mixed $value
     * @return void
     */
    public function setRequestHeader(?string $value): void;

    /**
     * @param mixed $value
     * @return void
     */
    public function setRequestData(string $value): void;

    /**
     * @param mixed $value
     * @return void
     */
    public function setResponseHeader(?string $value): void;

    /**
     * @param mixed $value
     * @return void
     */
    public function setResponseData(string $value): void;

    /**
     * @param mixed $value
     *
     * @return void
     */
    public function setRequestMethod(string $value): void;

    /**
     * @param int $value
     *
     * @return void
     */
    public function setResponseStatusCode(int $value): void;
}