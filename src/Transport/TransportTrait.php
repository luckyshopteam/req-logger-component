<?php

namespace Lucky\RequestLogger\Transport;

use Lucky\RequestLogger\Entity\LogInterface;

/**
 * @author LuckyOnline
 */
trait TransportTrait
{
    /**
     * Подготовка данных лога к отправке
     *
     * @param LogInterface $log
     * @return array
     */
    public function prepareLogData(LogInterface $log): array
    {
        return [
            'appKey'             => $log->getAppKey(),
            'action'             => $log->getAction(),
            'filter1'            => $log->getFilter1(),
            'filter2'            => $log->getFilter2(),
            'filter3'            => $log->getFilter3(),
            'filter4'            => $log->getFilter4(),
            'filter5'            => $log->getFilter5(),
            'date'               => $log->getDate(),
            'datetime'           => $log->getDatetime(),
            'isInternal'         => $log->getIsInternal(),
            'requestUrl'         => $log->getRequestUrl(),
            'requestData'        => $log->getRequestData(),
            'requestMethod'      => $log->getRequestMethod(),
            'requestHeader'      => $log->getRequestHeader(),
            'responseData'       => $log->getResponseData(),
            'responseHeader'     => $log->getResponseHeader(),
            'responseStatusCode' => $log->getResponseStatusCode(),
            'data'               => $log->getData(),
        ];
    }
}