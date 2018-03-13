<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 11:11
 */

namespace MMXS\TIM\Response;

use MMXS\TIM\AbstractResponse;

class GetGroupInfoResponse extends AbstractResponse
{
    /**
     * getGroupInfo
     *
     * @author chenmingming
     * @return array
     */
    public function getGroupInfo()
    {
        return $this->data['GroupInfo'] ?? [];
    }
}