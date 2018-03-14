<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 15:46
 */

namespace MMXS\TIM\Request;

use MMXS\TIM\AbstractRequest;
use MMXS\TIM\Entity\Message\AbstractMsg;
use MMXS\TIM\Entity\Message\MsgInterface;

class SendGroupMsgRequest extends AbstractRequest
{
    use GroupIdTrait;

    /**
     * setRandom
     *
     * @author chenmingming
     *
     * @param $random
     *
     * @return $this
     */
    public function setRandom($random)
    {
        $this->body['Random'] = $random;

        return $this;
    }

    /**
     * setMsgBody
     *
     * @author chenmingming
     *
     * @param array $messages
     *
     * @return $this
     */
    public function setMsgBody(array $messages)
    {
        $this->body['MsgBody'] = $messages;

        return $this;
    }

    /**
     * addMsg
     *
     * @author chenmingming
     *
     * @param MsgInterface $msg
     *
     * @return $this
     */
    public function addMsg(MsgInterface $msg)
    {
        $this->body['MsgBody'][] = $msg->getData();

        return $this;
    }

    /**
     * setFromAccount
     *
     * @author chenmingming
     *
     * @param $fromAccount
     *
     * @return $this
     */
    public function setFromAccount($fromAccount)
    {
        $this->body['From_Account'] = $fromAccount;

        return $this;
    }

    /**
     * setMsgPriority
     *
     * @author chenmingming
     *
     * @param $msgPriority
     *
     * @return $this
     */
    public function setMsgPriority($msgPriority)
    {
        $this->body['MsgPriority'] = $msgPriority;

        return $this;
    }

    /**
     * OnlineOnlyFlag
     *
     * @author chenmingming
     * @return $this
     */
    public function setOnlineOnlyFlag()
    {
        $this->body['OnlineOnlyFlag'] = 1;

        return $this;
    }

    /**
     * setOfflinePushInfo
     *
     * @author chenmingming
     *
     * @param array $info
     *
     * @return $this
     */
    public function setOfflinePushInfo(array $info)
    {
        $this->body['OfflinePushInfo'] = $info;

        return $this;
    }

    /**
     * setForbidCallbackControl
     *
     * @author chenmingming
     *
     * @param array $control
     *
     * @return $this
     */
    public function setForbidCallbackControl(array $control)
    {
        $this->body['ForbidCallbackControl'] = $control;

        return $this;
    }

    public function getUri(): string
    {
        return 'group_open_http_svc/send_group_msg';
    }

}