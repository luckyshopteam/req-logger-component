<?php
/**
 * @copyright Copyright &copy; LuckyOnline, lucky.online, 2019
 * @package
 * @version   1.0.0
 */

namespace Lucky\RequestLogger\Entity;

/**
 * @author LuckyOnline
 * @since  1.0
 */
interface LogInterface
{
    /**
     * @return array
     */
    public function prepareToBrokerInsert(): array;

    /**
     * @return array
     */
    public function prepareToStoreInsert(): array;

    /**
     * @return integer|string|null
     */
    public function getAppKey();

    /**
     * @param int|null $value
     * @return void
     */
    public function setAppKey($value): void;

    /**
     * @return integer|null
     */
    public function getProjectId();

    /**
     * @param int|null $value
     * @return void
     */
    public function setProjectId($value): void;

    /**
     * @return integer
     */
    public function getAction(): ?int;

    /**
     * @param int|null $value
     * @return void
     */
    public function setAction(?int $value): void;

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
     * @return string
     */
    public function getDate(): ?string;

    /**
     * @return string
     */
    public function getDatetime(): ?string;

    /**
     * @return integer
     */
    public function getIsInternal(): ?int;

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
     * @return integer
     */
    public function getRequestMethod(): ?int;

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
     * @param string $value
     *
     * @return void
     */
    public function setDate(string $value): void;

    /**
     * @param string $value
     *
     * @return void
     */
    public function setDatetime(string $value): void;

    /**
     * @param int $value
     *
     * @return void
     */
    public function setIsInternal(int $value): void;

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
    public function setRequestMethod(int $value): void;

    /**
     * @param int $value
     *
     * @return void
     */
    public function setResponseStatusCode(int $value): void;
}