<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 19:48
 */

namespace MMXS\TIM\Constant;

class MsgType
{
    // 文本消息
    const TIM_TEXT = 'TIMTextElem';
    // 表情消息
    const TIM_FACE = 'TIMFaceElem';
    // 地理位置消息
    const TIM_LOCATION = 'TIMLocationElem';

    //自定义消息，当接收方为IOS系统且应用处在后台时，此消息类型可携带除文本以外的字段到APNS。
    //注意，一条组合消息中只能包含一个TIMCustomElem自定义消息元素。
    const TIM_CUSTOM = 'TIMCustomElem';
    //语音消息。（服务端集成Rest API不支持发送该类消息）
    const TIM_SOUND = 'TIMSoundElem';
    //图像消息。（服务端集成Rest API不支持发送该类消息）
    const TIM_IMAGE = 'TIMImageElem';
    //文件消息。（服务端集成Rest API不支持发送该类消息）
    const TIM_FILE = 'TIMFileElem';
}