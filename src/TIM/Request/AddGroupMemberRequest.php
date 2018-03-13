<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 13:51
 */

namespace MMXS\TIM\Request;

use MMXS\TIM\AbstractRequest;
use MMXS\TIM\Response\AddGroupMemberResponse;

/**
 * Class AddGroupMemberRequest
 *
 * @method AddGroupMemberResponse send()
 * @package MMXS\TIM\Request
 */
class AddGroupMemberRequest extends AbstractRequest
{
    public function getUri(): string
    {
        return 'group_open_http_svc/add_group_member';
    }
}