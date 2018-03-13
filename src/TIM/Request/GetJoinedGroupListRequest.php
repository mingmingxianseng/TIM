<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 14:45
 */

namespace MMXS\TIM\Request;

use MMXS\TIM\AbstractRequest;

class GetJoinedGroupListRequest extends AbstractRequest
{
    use PageTrait;

    public function getUri(): string
    {
        return 'group_open_http_svc/get_joined_group_list';
    }

    /**
     * setMemberAccount
     *
     * @author chenmingming
     *
     * @param $account
     *
     * @return $this
     */
    public function setMemberAccount($account)
    {
        $this->body['Member_Account'] = $account;

        return $this;
    }

    /**
     * setGroupType
     *
     * @author chenmingming
     *
     * @param $groupType
     *
     * @return $this
     */
    public function setGroupType($groupType)
    {
        $this->body['GroupType'] = $groupType;

        return $this;
    }

    /**
     * setResponseFilter
     *
     * @author chenmingming
     *
     * @param $filter
     *
     * @return $this
     */
    public function setResponseFilter($filter)
    {
        $this->body['ResponseFilter'] = $filter;

        return $this;
    }
}