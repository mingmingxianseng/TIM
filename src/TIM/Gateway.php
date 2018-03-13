<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 11:15
 */

namespace MMXS\TIM;

use GuzzleHttp\Client;

/**
 * Class Gateway
 *
 * @package MMXS\TIM
 * @method createGroup()
 * @method accountImport()
 * @method destroyGroup()
 * @method getGroupInfo()
 */
class Gateway
{
    private $identifier;
    private $appId;
    private $userSig;
    private $client;

    public function __construct(string $identifier, string $appId, string $userSig)
    {
        $this->identifier = $identifier;
        $this->appId      = $appId;
        $this->userSig    = $userSig;
        $this->client     = new Client();
    }

    /**
     * __call
     *
     * @author chenmingming
     *
     * @param $name
     * @param $arguments
     *
     * @return mixed
     * @throws TimException
     */
    public function __call($name, $arguments)
    {
        $requestClass = 'YX\\Match\\TIM\Request\\' . ucfirst($name) . 'Request';
        if (!class_exists($requestClass)) {
            throw new TimException("invalid argument name:{$name}");
        }

        return new $requestClass($this->client, $this->identifier, $this->appId, $this->userSig);
    }
}