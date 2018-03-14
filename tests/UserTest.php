<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 20:35
 */

namespace tests;

use MMXS\TIM\Constant\GroupType;
use MMXS\TIM\Constant\JoinGroupType;
use MMXS\TIM\Entity\Message\CustomMsg;
use MMXS\TIM\Entity\Message\TextMsg;
use MMXS\TIM\Request\AccountImportRequest;
use MMXS\TIM\Request\CreateGroupRequest;
use MMXS\TIM\Request\SendGroupMsgRequest;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function test1()
    {
        $gateway = Helper::getGateway();

        /** @var AccountImportRequest $request */
        $request = $gateway->accountImport();

        $request->setIdentifier('lubeibei')
            ->setNick('陆蓓蓓');

        $response = $request->send();

        $this->assertTrue($response->isSuccessFul());
    }

    public function testUserSig()
    {

        $gateway = Helper::getGateway();
        $sig     = $gateway->getSigner()->genSig('chenmingming');

        echo $sig;

        /** @var CreateGroupRequest $req */
        $req = $gateway->createGroup();

        $req->setName('test')
            ->setType(GroupType::PUBLIC)
            ->addMember('chenmingming')
            ->addMember('lubeibei')
            ->setGroupId('@MATCH#123')
            ->setApplyJoinOption(JoinGroupType::NEED_PERMISSION);
        $res = $req->send();
        var_dump($res->getData());
        $this->assertTrue($res->isSuccessFul());

    }

    public function testSendMsg()
    {
        $gateway = Helper::getGateway();
        /** @var SendGroupMsgRequest $req */
        $req = $gateway->sendGroupMsg();

        $groupId = '@MATCH#123';
        $msg     = new TextMsg();
        $msg->setText('hello22222');
        $msg = new CustomMsg();
        $msg->setDesc('1234')
            ->setData(json_encode(['1111' => 2222]))
            ->setExt('ext');
        $req->setGroupId($groupId)
            ->setRandom(mt_rand(100000, 9999999))
            ->addMsg($msg)
            ->setFromAccount('lubeibei');

        $res = $req->send();
        var_dump($res->getData());

        $this->assertTrue($res->isSuccessFul());
    }
}