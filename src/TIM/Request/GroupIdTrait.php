<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 15:48
 */

namespace MMXS\TIM\Request;

trait GroupIdTrait
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
}