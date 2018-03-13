<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/12
 * Time: 22:37
 */

namespace MMXS\TIM;

use GuzzleHttp\Client;
use MMXS\TIM\Response\CommonResponse;

abstract class AbstractRequest implements RequestInterface
{
    protected $userSig;
    protected $identifier;
    protected $appId;

    protected $client;

    /**
     * @var array
     */
    protected $body = [];

    /**
     * AbstractRequest constructor.
     *
     * @param Client $client
     * @param string $identifier
     * @param string $appId
     * @param string $userSig
     */
    public function __construct(Client $client, string $identifier, string $appId, string $userSig)
    {
        $this->client     = $client;
        $this->identifier = $identifier;
        $this->appId      = $appId;
        $this->userSig    = $userSig;
    }

    /**
     * request
     *
     * @author chenmingming
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function request()
    {
        return $this->client->post(
            $this->getUri(), [
                'base_uri' => static::BASE_URI,
                'json'     => $this->body,
                'query'    => [
                    'usersig'     => $this->userSig,
                    'identifier'  => $this->identifier,
                    'sdkappid'    => $this->appId,
                    'random'      => time() . mt_rand(1000, 9999) . mt_rand(1000, 9999),
                    'contenttype' => 'json'
                ]
            ]
        );
    }

    /**
     * @return string
     */
    public function getUserSig()
    {
        return $this->userSig;
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return string
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * send
     *
     * @author chenmingming
     * @return ResponseInterface
     */
    public function send(): ResponseInterface
    {
        $response  = $this->request();
        $className = str_replace("Request", 'Response', static::class);
        if (!class_exists($className)) {
            $className = CommonResponse::class;
        }

        return new $className($response->getBody()->getContents(), $this);
    }
}