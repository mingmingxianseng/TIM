<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 14:04
 */

namespace tests;

use MMXS\TIM\Gateway;
use MMXS\TIM\Request\CreateGroupRequest;
use MMXS\TIM\Request\DestroyGroupRequest;
use MMXS\TIM\Request\GetGroupInfoRequest;
use MMXS\TIM\TLS\TLSSig;
use PHPUnit\Framework\TestCase;

class GroupTest extends TestCase
{

    /**
     * testAddGroup
     *
     * @author chenmingming
     * @return string
     * @throws \MMXS\TIM\TimException
     */
    public function testAddGroup()
    {
        /** @var CreateGroupRequest $request */
        $request = Helper::getGateway()->createGroup();
        $request->setType($request::TYPE_PUBLIC)
            ->setName('test room')
            ->setIntroduction('test introduction')
            ->setApplyJoinOption($request::JOIN_OPT_DISABLE_APPLY);

        $response = $request->send();
        $this->assertTrue($response->isSuccessFul());

        return $response->getGroupId();
    }

    /**
     * testGetGroupInfo
     *
     * @author  chenmingming
     *
     * @param $groupId
     *
     * @depends testAddGroup
     */
    public function testGetGroupInfo($groupId)
    {
        /** @var GetGroupInfoRequest $request */
        $request = Helper::getGateway()->getGroupInfo();
        $request->setGroupList([$groupId]);

        $response = $request->send();
        $this->assertTrue($response->isSuccessFul());

        return $groupId;
    }

    /**
     * testDestroyGroup
     *
     * @author  chenmingming
     *
     * @param $groupId
     *
     * @depends testGetGroupInfo
     */
    public function testDestroyGroup($groupId)
    {
        /** @var DestroyGroupRequest $request */
        $request = Helper::getGateway()->destroyGroup();
        $request->setGroupId($groupId);

        $response = $request->send();
        $this->assertTrue($response->isSuccessFul());
    }

}