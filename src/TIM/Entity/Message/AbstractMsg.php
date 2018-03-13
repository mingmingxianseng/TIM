<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 19:53
 */

namespace MMXS\TIM\Entity\Message;

abstract class AbstractMsg implements MsgInterface
{
    protected $msgContent = [];

    public function getMsgContent(): array
    {
        return $this->msgContent;
    }

    /**
     * getData
     *
     * @author chenmingming
     * @return array
     */
    public function getData()
    {
        return [
            'MsgType'    => $this->getMsgType(),
            'MsgContent' => $this->msgContent
        ];
    }
}