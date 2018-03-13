<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 13:43
 */

namespace MMXS\TIM\Request;

use MMXS\TIM\AbstractRequest;
use MMXS\TIM\Response\getGroupMemberInfoResponse;
use MMXS\TIM\ResponseInterface;

class GetGroupMemberInfoRequest extends AbstractRequest
{
    use PageTrait;
    use GroupIdTrait;

    public function getUri(): string
    {
        return 'group_open_http_svc/get_group_member_info';
    }

    /**
     * setMemberInfoFilter
     *
     * @author chenmingming
     *
     * @param $filter
     *
     * @return $this
     */
    public function setMemberInfoFilter($filter)
    {
        $this->body['MemberInfoFilter'] = $filter;

        return $this;
    }

    /**
     * setAppDefinedDataFilterGroupMember
     *
     * @author chenmingming
     *
     * @param $filter
     *
     * @return $this
     */
    public function setAppDefinedDataFilterGroupMember($filter)
    {
        $this->body['AppDefinedDataFilter_GroupMember'] = $filter;

        return $this;
    }

    /**
     * setMemberRoleFilter
     *
     * @author chenmingming
     *
     * @param $filter
     *
     * @return $this
     */
    public function setMemberRoleFilter($filter)
    {
        $this->body['MemberRoleFilter'] = $filter;

        return $this;
    }

    /**
     * send
     *
     * @author chenmingming
     * @return getGroupMemberInfoResponse
     */
    public function send(): ResponseInterface
    {
        $response = $this->request();

        return new getGroupMemberInfoResponse($response->getBody()->getContents(), $this);
    }

}