<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/12
 * Time: 23:51
 */

namespace MMXS\TIM\Request;

use MMXS\TIM\AbstractRequest;
use MMXS\TIM\Constant\GroupType;
use MMXS\TIM\Constant\JoinGroupType;
use MMXS\TIM\Response\CreateGroupResponse;
use MMXS\TIM\ResponseInterface;
use MMXS\TIM\TimException;

/**
 * Class CreateGroupRequest
 *
 * @package MMXS\TIM\Request
 * @wiki https://cloud.tencent.com/document/product/269/1615
 */
class CreateGroupRequest extends AbstractRequest
{
    use GroupIdTrait;
    public function getUri(): string
    {
        return 'group_open_http_svc/create_group';
    }

    /**
     * setOwnerAccount
     *
     * @author chenmingming
     *
     * @param $ownerAccount
     *
     * @return $this
     */
    public function setOwnerAccount($ownerAccount)
    {
        $this->body['Owner_Account'] = $ownerAccount;

        return $this;
    }

    /**
     * setName
     *
     * @author chenmingming
     *
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->body['Name'] = $name;

        return $this;
    }

    /**
     * setIntroduction
     *
     * @author chenmingming
     *
     * @param $introduction
     *
     * @return $this
     */
    public function setIntroduction($introduction)
    {
        $this->body['Introduction'] = $introduction;

        return $this;
    }

    /**
     * setNotification
     *
     * @author chenmingming
     *
     * @param $notification
     *
     * @return $this
     */
    public function setNotification($notification)
    {
        $this->body['Notification'] = $notification;

        return $this;
    }

    /**
     * setFaceUrl
     *
     * @author chenmingming
     *
     * @param $faceUrl
     *
     * @return $this
     */
    public function setFaceUrl($faceUrl)
    {
        $this->body['FaceUrl'] = $faceUrl;

        return $this;
    }

    /**
     * setMaxMemberCount
     *
     * @author chenmingming
     *
     * @param $maxMemberCount
     *
     * @return $this
     */
    public function setMaxMemberCount($maxMemberCount)
    {
        $this->body['MaxMemberCount'] = $maxMemberCount;

        return $this;
    }

    /**
     * setApplyJoinOption
     *
     * @author chenmingming
     *
     * @param $option
     *
     * @return $this
     * @throws TimException
     */
    public function setApplyJoinOption($option)
    {
        if (!in_array($option, JoinGroupType::TYPE_LIST)) {
            throw new TimException("ApplyJoinOption is invalid");
        }
        $this->body['ApplyJoinOption'] = $option;

        return $this;
    }

    /**
     * setMemberList
     *
     * @author chenmingming
     *
     * @param array $memberList
     *
     * @return $this
     */
    public function setMemberList(array $memberList)
    {
        $this->body['MemberList'] = $memberList;

        return $this;
    }

    /**
     * setType
     *
     * @author chenmingming
     *
     * @param $type
     *
     * @return $this
     * @throws TimException
     */
    public function setType($type)
    {
        if (!in_array($type, GroupType::TYPE_LIST)) {
            throw new TimException("Type [\"{$type}\"] is invalid.");
        }
        $this->body['Type'] = $type;

        return $this;
    }

    /**
     * setAppDefinedData
     *
     * @author chenmingming
     *
     * @param array $appDefineData
     *
     * @return $this
     */
    public function setAppDefinedData(array $appDefineData)
    {
        $this->body['AppDefinedData'] = $appDefineData;

        return $this;
    }

    /**
     * addMember
     *
     * @author chenmingming
     *
     * @param string $account
     * @param bool   $isAdmin
     * @param array  $appMemberDefinedData
     *
     * @return $this
     */
    public function addMember($account, $isAdmin = false, array $appMemberDefinedData = [])
    {
        $data = [
            'Member_Account' => $account
        ];
        if ($isAdmin) {
            $data['Role'] = 'Admin';
        }
        if ($appMemberDefinedData) {
            $data['AppMemberDefinedData'] = $appMemberDefinedData;
        }
        $this->body['MemberList'][] = $data;

        return $this;
    }

    /**
     * send
     *
     * @author chenmingming
     * @return CreateGroupResponse
     */
    public function send(): ResponseInterface
    {
        $request = $this->request();

        return new CreateGroupResponse($request->getBody()->getContents(), $this);
    }

}