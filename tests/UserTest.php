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

        $request->setIdentifier('fandongdong')
            ->setNick('范东东');

        $response = $request->send();

        $this->assertTrue($response->isSuccessFul());
    }

    public function testUser()
    {
        $gateway = Helper::getGateway();
        $sig     = $gateway->getSigner()->genSig('chenmingming');

        echo $sig;
    }

    public function testUserSig()
    {

        $gateway = Helper::getGateway();
        $sig     = $gateway->getSigner()->genSig('chenmingming');

        echo $sig;

        /** @var CreateGroupRequest $req */
        $req = $gateway->createGroup();

        $req->setName('test-ANDROID')
            ->setType(GroupType::PUBLIC)
            ->addMember('chenmingming')
            ->addMember('lianjiwei')
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

        $groupId = '@TGS#2BU52ODFV';
        $msg     = new TextMsg();
        $msg->setText('hello22222');
        $msg = new CustomMsg();
        $msg->setDesc('1234')
            ->setData(json_encode(['1111' => "纪委聊天室"]))
            ->setExt('ext');
        $req->setGroupId($groupId)
            ->setRandom(mt_rand(100000, 9999999))
            ->addMsg($msg)
            ->setFromAccount('lianjiwei');

        $res = $req->send();
        var_dump($res->getData());

        $this->assertTrue($res->isSuccessFul());
    }
}