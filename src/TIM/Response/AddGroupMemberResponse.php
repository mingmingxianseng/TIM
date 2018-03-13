<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 13:53
 */

namespace MMXS\TIM\Response;

use MMXS\TIM\AbstractResponse;

class AddGroupMemberResponse extends AbstractResponse
{
    /**
     * getMemberList
     *
     * @author chenmingming
     * @return array
     */
    public function getMemberList()
    {
        return $this->data['MemberList'] ?? [];
    }

    /**
     * isJoinSuccessful
     *
     * @author chenmingming
     *
     * @param $account
     *
     * @return bool
     */
    public function isJoinSuccessful($account)
    {
        foreach ($this->getMemberList() as $v) {
            if ($v['Member_Account'] === $account) {
                return $v['Result'] !== 0;
            }
        }

        return false;
    }
}