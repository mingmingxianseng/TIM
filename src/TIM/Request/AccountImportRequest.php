<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/12
 * Time: 23:22
 */

namespace MMXS\TIM\Request;

use MMXS\TIM\AbstractRequest;
use MMXS\TIM\Response\AccountImportResponse;
use MMXS\TIM\ResponseInterface;

class AccountImportRequest extends AbstractRequest
{
    public function getUri(): string
    {
        return 'im_open_login_svc/account_import';
    }

    /**
     * send
     *
     * @author chenmingming
     * @return AccountImportResponse
     */
    public function send(): ResponseInterface
    {
        $response = $this->request();

        return new AccountImportResponse($response->getBody()->getContents(), $this);
    }

    /**
     * setIdentifier
     *
     * @author chenmingming
     *
     * @param $identifier
     *
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->body['Identifier'] = $identifier;

        return $this;
    }

    /**
     * setNick
     * @author chenmingming
     * @param $nick
     *
     * @return $this
     */
    public function setNick($nick)
    {
        $this->body['Nick'] = $nick;

        return $this;
    }

    /**
     * setFaceUrl
     * @author chenmingming
     * @param $faceUrl
     *
     * @return $this
     */
    public function setFaceUrl($faceUrl)
    {
        $this->body['FaceUrl'] = $faceUrl;

        return $this;
    }
}