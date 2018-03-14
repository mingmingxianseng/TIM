<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 19:52
 */

namespace MMXS\TIM\Entity\Message;

interface MsgInterface
{
    /**
     * getMsgType 获取消息类型
     *
     * @author chenmingming
     * @return string
     */
    public function getMsgType(): string;

    /**
     * getMsgContent 获取消息体
     *
     * @author chenmingming
     * @return array
     */
    public function getMsgContent(): array;

    /**
     * getData 获取整个消息结构体
     *
     * @author chenmingming
     * @return array
     */
    public function getData(): array;
}