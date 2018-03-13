<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 10:25
 */

namespace MMXS\TIM\Request;

use MMXS\TIM\AbstractRequest;

class DestroyGroupRequest extends AbstractRequest
{
    use GroupIdTrait;

    public function getUri(): string
    {
        return 'group_open_http_svc/destroy_group';
    }

}