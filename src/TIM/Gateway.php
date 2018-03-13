<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 11:15
 */

namespace MMXS\TIM;

use GuzzleHttp\Client;
use MMXS\TIM\TLS\TLSSig;
use Psr\Log\LoggerInterface;

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
    private $config
        = [
            'app_id'        => '',
            'accountType'   => '',
            'admin_account' => '',
            'private_key'   => '',
            'public_key'    => ''
        ];
    /**
     * @var TLSSig
     */
    private $signer;
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Gateway constructor.
     *
     * @param array           $config
     * @param LoggerInterface $logger
     *
     * @throws \Exception
     */
    public function __construct($config = [], LoggerInterface $logger)
    {
        $this->config     = array_merge($this->config, $config);
        $this->identifier = $this->config['admin_account'];
        $this->appId      = $this->config['app_id'];
        $this->client     = new Client();
        $this->logger     = $logger;
        $this->signer     = new TLSSig($this->appId, $this->config['private_key'], $this->config['public_key']);
        $this->userSig    = $this->signer->genSig($this->identifier);
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
        $requestClass = 'MMXS\\TIM\Request\\' . ucfirst($name) . 'Request';
        if (!class_exists($requestClass)) {
            throw new TimException("invalid argument name:{$name}");
        }
        $this->logger->debug('request ' . $requestClass);

        return new $requestClass($this->client, $this->identifier, $this->appId, $this->userSig);
    }

    /**
     * @return TLSSig
     */
    public function getSigner(): TLSSig
    {
        return $this->signer;
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

}