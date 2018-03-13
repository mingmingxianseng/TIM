<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 19:44
 */

namespace MMXS\TIM\Constant;

class GroupType
{
    //群组形态
    // 公开群
    const PUBLIC = 'Public';
    // 私密群
    const PRIVATE = 'Private';
    // 聊天室
    const CHAT_ROOM = 'ChatRoom';
    // 互动聊天室
    const AV_CHAT_ROOM = 'AVChatRoom';
    // 在线成员广播大群
    const B_CHAT_ROOM = 'BChatRoom';

    const TYPE_LIST
        = [
            self::PUBLIC,
            self::PRIVATE,
            self::CHAT_ROOM,
            self::AV_CHAT_ROOM,
            self::B_CHAT_ROOM
        ];

}