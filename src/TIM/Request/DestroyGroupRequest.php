<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 10:25
 */

namespace MMXS\TIM\Request;

use MMXS\TIM\AbstractRequest;
use MMXS\TIM\Response\CommonResponse;
use MMXS\TIM\ResponseInterface;

class DestroyGroupRequest extends AbstractRequest
{

    /**
     * setGroupId
     *
     * @author chenmingming
     *
     * @param $groupId
     *
     * @return $this
     */
    public function setGroupId($groupId)
    {
        $this->body['GroupId'] = $groupId;

        return $this;
    }

    public function getUri(): string
    {
        return 'group_open_http_svc/destroy_group';
    }

    /**
     * send
     *
     * @author chenmingming
     * @return ResponseInterface
     */
    public function send(): ResponseInterface
    {
        $response = $this->request();

        return new CommonResponse($response->getBody()->getContents(), $this);
    }

}