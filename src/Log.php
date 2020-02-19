<?php
/**
 * @copyright Copyright &copy; LuckyOnline, lucky.online, 2019
 * @package
 * @version   1.0.0
 */

namespace Lucky\RequestLogger;

use DateTime;
use Lucky\RequestLogger\Exception\InvalidArgumentException;

/**
 * @author LuckyOnline
 * @since  1.0
 */
class Log implements LogInterface
{
    protected $appKey;
    protected $action;
    protected $filter1;
    protected $filter2;
    protected $filter3;
    protected $filter4;
    protected $filter5;
    protected $datetime;
    protected $isInternal;
    protected $requestUrl;
    protected $requestHeader;
    protected $requestData;
    protected $responseHeader;
    protected $responseData;
    protected $requestMethod;
    protected $responseStatusCode;
    protected $data;

    /**
     * @inheritDoc
     */
    public function getAppKey()
    {
        return $this->appKey;
    }

    /**
     * @inheritDoc
     */
    public function setAppKey(string $value): void
    {
        $this->appKey = $value;
    }

    /**
     * @inheritDoc
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @inheritDoc
     */
    public function getFilter1()
    {
        return $this->filter1;
    }

    /**
     * @inheritDoc
     */
    public function getFilter2()
    {
        return $this->filter2;
    }

    /**
     * @inheritDoc
     */
    public function getFilter3()
    {
        return $this->filter3;
    }

    /**
     * @inheritDoc
     */
    public function getFilter4()
    {
        return $this->filter4;
    }

    /**
     * @inheritDoc
     */
    public function getFilter5()
    {
        return $this->filter5;
    }

    /**
     * @inheritDoc
     */
    public function getDatetime(): ?DateTime
    {
        return $this->datetime;
    }

    /**
     * @inheritDoc
     */
    public function getIsInternal(): ?bool
    {
        return $this->isInternal;
    }

    /**
     * @inheritDoc
     */
    public function getRequestUrl(): ?string
    {
        return $this->requestUrl;
    }

    /**
     * @inheritDoc
     */
    public function getRequestHeader(): ?string
    {
        return $this->requestHeader;
    }

    /**
     * @inheritDoc
     */
    public function getRequestData(): ?string
    {
        return $this->requestData;
    }

    /**
     * @inheritDoc
     */
    public function getResponseHeader(): ?string
    {
        return $this->responseHeader;
    }

    /**
     * @inheritDoc
     */
    public function getResponseData(): ?string
    {
        return $this->responseData;
    }

    /**
     * @inheritDoc
     */
    public function getRequestMethod(): ?string
    {
        return $this->requestMethod;
    }

    /**
     * @inheritDoc
     */
    public function getResponseStatusCode(): ?int
    {
        return $this->responseStatusCode;
    }

    /**
     * @inheritDoc
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public function setAction($value = null): void
    {
        $this->checkScalar('action', $value);
        $this->action = $value;
    }

    /**
     * @inheritDoc
     */
    public function setData(?array $value): void
    {
        $this->data = $value;
    }

    /**
     * @inheritDoc
     */
    public function setDatetime(DateTime $value): void
    {
        $this->datetime = $value;
    }

    /**
     * @inheritDoc
     */
    public function setIsInternal(bool $value): void
    {
        $this->isInternal = $value;
    }

    /**
     * @inheritDoc
     */
    public function setRequestUrl(?string $value): void
    {
        $this->requestUrl = $value;
    }

    /**
     * @inheritDoc
     */
    public function setRequestHeader(?string $value): void
    {
        $this->requestHeader = $value;
    }

    /**
     * @inheritDoc
     */
    public function setRequestData(?string $value): void
    {
        $this->requestData = $value;
    }

    /**
     * @inheritDoc
     */
    public function setResponseHeader(?string $value): void
    {
        $this->responseHeader = $value;
    }

    /**
     * @inheritDoc
     */
    public function setResponseData(?string $value): void
    {
        $this->responseData = $value;
    }

    /**
     * @inheritDoc
     */
    public function setRequestMethod(?string $value): void
    {
        $this->requestMethod = $value;
    }

    /**
     * @inheritDoc
     */
    public function setResponseStatusCode(?int $value): void
    {
        $this->responseStatusCode = $value;
    }

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public function setFilter1($value): void
    {
        $this->checkScalar('filter1', $value);
        $this->filter1 = $value;
    }

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public function setFilter2($value): void
    {
        $this->checkScalar('filter2', $value);
        $this->filter2 = $value;
    }

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public function setFilter3($value): void
    {
        $this->checkScalar('filter3', $value);
        $this->filter3 = $value;
    }

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public function setFilter4($value): void
    {
        $this->checkScalar('filter4', $value);
        $this->filter4 = $value;
    }

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public function setFilter5($value): void
    {
        $this->checkScalar('filter5', $value);
        $this->filter5 = $value;
    }

    /**
     * @param null  $attr
     * @param mixed $value
     *
     * @return void
     * @throws InvalidArgumentException
     */
    protected function checkScalar($attr, $value)
    {
        if (isset($value) && !is_scalar($value)) {
            throw new InvalidArgumentException('Attribute ' . $attr . ' must be a scalar type.');
        }
    }

}