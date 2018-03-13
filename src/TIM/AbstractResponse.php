<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/12
 * Time: 22:46
 */

namespace MMXS\TIM;

abstract class AbstractResponse implements ResponseInterface
{
    protected $data = [];
    protected $request;

    /**
     * AbstractResponse constructor.
     *
     * @param string           $responseJson
     * @param RequestInterface $request
     */
    public function __construct($responseJson, RequestInterface $request)
    {
        $this->data    = json_decode($responseJson, true);
        $this->request = $request;
    }

    public function isSuccessFul(): bool
    {
        return $this->data['ActionStatus'] === 'OK';
    }

    public function getMessage(): string
    {
        return $this->data['ErrorInfo'] ?? '';
    }

    public function getCode(): string
    {
        return $this->data['ErrorCode'] ?? '';
    }

    /**
     * @return array|mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

}