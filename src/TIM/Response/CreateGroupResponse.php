<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 09:52
 */

namespace MMXS\TIM\Response;

use MMXS\TIM\AbstractResponse;

class CreateGroupResponse extends AbstractResponse
{
    /**
     * getGroupId
     *
     * @author chenmingming
     * @return string
     */
    public function getGroupId()
    {
        return $this->data['GroupId'] ?? '';
    }
}