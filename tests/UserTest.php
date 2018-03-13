<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 20:35
 */

namespace tests;

use MMXS\TIM\Constant\GroupType;
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
            ->setGroupId('@TTT#123$1234');
        $res = $req->send();

        $this->assertTrue($res->isSuccessFul());
    }

    public function testSendMsg()
    {
        $gateway = Helper::getGateway();
        /** @var SendGroupMsgRequest $req */
        $req = $gateway->sendGroupMsg();

        $msg = new TextMsg();
        $msg->setText('hello');
        $req->setGroupId('@TTT#123$1234')
            ->setRandom(mt_rand(10000, 999999))
            ->setMsgBody([$msg->getData()]);

        $res = $req->send();

        $this->assertTrue($res->isSuccessFul());
    }
}