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

/**
 * Class GetGroupInfoRequest
 *
 * @method GetGroupInfoResponse send()
 * @package MMXS\TIM\Request
 * @wiki https://cloud.tencent.com/document/product/269/1617
 */
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