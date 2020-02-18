<?php
/**
 * @copyright Copyright &copy; LuckyOnline, lucky.online, 2019
 * @package
 * @version   1.0.0
 */

namespace Lucky\RequestLogger\Entity;

use Lucky\RequestLogger\Exception\InvalidArgumentException;

/**
 * @author LuckyOnline
 * @since  1.0
 */
class Log implements LogInterface
{
    const REQUEST_METHOD_OPTIONS = 0;
    const REQUEST_METHOD_GET     = 1;
    const REQUEST_METHOD_POST    = 2;
    const REQUEST_METHOD_PUT     = 3;
    const REQUEST_METHOD_HEAD    = 4;
    const REQUEST_METHOD_DELETE  = 5;
    const REQUEST_METHOD_PATCH   = 6;

    const REQUEST_METHOD_LIST = [
        self::REQUEST_METHOD_OPTIONS => 'OPTIONS',
        self::REQUEST_METHOD_GET     => 'GET',
        self::REQUEST_METHOD_POST    => 'POST',
        self::REQUEST_METHOD_PUT     => 'PUT',
        self::REQUEST_METHOD_HEAD    => 'HEAD',
        self::REQUEST_METHOD_DELETE  => 'DELETE',
        self::REQUEST_METHOD_PATCH   => 'PATCH',
    ];

    protected $appKey;
    protected $projectId;
    protected $action;
    protected $filter1;
    protected $filter2;
    protected $filter3;
    protected $filter4;
    protected $filter5;
    protected $date;
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
     * @throws InvalidArgumentException
     */
    public function setAppKey($value): void
    {
        $this->checkScalar('appKey', $value);
        $this->appKey = $value;
    }

    /**
     * @inheritDoc
     */
    public function getProjectId(): ?int
    {
        return $this->projectId;
    }

    /**
     * @inheritDoc
     */
    public function getAction(): ?int
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
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @inheritDoc
     */
    public function getDatetime(): ?string
    {
        return $this->datetime;
    }

    /**
     * @inheritDoc
     */
    public function getIsInternal(): ?int
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
    public function getRequestMethod(): ?int
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
     */
    public function setProjectId($value): void
    {
        $this->projectId = $value;
    }

    /**
     * @inheritDoc
     */
    public function setAction(?int $value): void
    {
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
    public function setDate(?string $value): void
    {
        $this->date = $value;
    }

    /**
     * @inheritDoc
     */
    public function setDatetime(?string $value): void
    {
        $this->datetime = $value;
    }

    /**
     * @inheritDoc
     */
    public function setIsInternal(?int $value): void
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
    public function setRequestMethod(?int $value): void
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