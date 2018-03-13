<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 19:46
 */

namespace MMXS\TIM\Constant;

class JoinGroupType
{
    // 入群方式

    // 自由加入
    const FREE = 'FreeAccess';
    // 需要验证  默认
    const NEED_PERMISSION = 'NeedPermission';
    // 禁止加群
    const DISABLE_APPLY = 'DisableApply';

    const TYPE_LIST
        = [
            self::FREE,
            self::NEED_PERMISSION,
            self::DISABLE_APPLY
        ];
}