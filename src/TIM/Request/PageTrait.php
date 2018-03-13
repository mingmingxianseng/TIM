<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 14:47
 */

namespace MMXS\TIM\Request;

trait PageTrait
{
    /**
     * setLimit
     *
     * @author chenmingming
     *
     * @param $limit
     *
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->body['Limit'] = $limit;

        return $this;
    }

    /**
     * setOffset
     *
     * @author chenmingming
     *
     * @param $offset
     *
     * @return $this
     */
    public function setOffset($offset)
    {
        $this->body['Offset'] = $offset;

        return $this;
    }

}