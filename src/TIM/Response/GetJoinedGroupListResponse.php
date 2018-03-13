<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 15:28
 */

namespace MMXS\TIM\Response;

use MMXS\TIM\AbstractResponse;

class GetJoinedGroupListResponse extends AbstractResponse
{
    public function getTotalCount()
    {
        return $this->data['TotalCount'] ?? 0;
    }

    /**
     * getGroupIdList
     *
     * @author chenmingming
     * @return array
     */
    public function getGroupIdList()
    {
        return $this->data['GroupIdList'] ?? [];
    }

}