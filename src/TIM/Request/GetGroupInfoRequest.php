<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 10:31
 */

namespace MMXS\TIM\Request;

use MMXS\TIM\AbstractRequest;
use MMXS\TIM\Response\GetGroupInfoResponse;
use MMXS\TIM\ResponseInterface;

class GetGroupInfoRequest extends AbstractRequest
{
    public function getUri(): string
    {
        return 'group_open_http_svc/get_group_info';
    }

    /**
     * setGroupList
     *
     * @author chenmingming
     *
     * @param array $groupList
     *
     * @return $this
     */
    public function setGroupList(array $groupList)
    {
        $this->body['GroupIdList'] = $groupList;

        return $this;
    }

    /**
     * send
     * @author chenmingming
     * @return GetGroupInfoResponse
     */
    public function send(): ResponseInterface
    {
        $response = $this->request();

        return new GetGroupInfoResponse($response->getBody()->getContents(), $this);
    }

}