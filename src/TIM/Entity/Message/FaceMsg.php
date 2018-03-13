<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 20:26
 */

namespace MMXS\TIM\Entity\Message;

use MMXS\TIM\Constant\MsgType;

class FaceMsg extends AbstractMsg
{
    public function getMsgType(): string
    {
        return MsgType::TIM_FACE;
    }

    /**
     * setIndex
     *
     * @author chenmingming
     *
     * @param $index
     *
     * @return $this
     */
    public function setIndex($index)
    {

        $this->msgContent['Index'] = $index;

        return $this;
    }

    /**
     * setData
     *
     * @author chenmingming
     *
     * @param $data
     *
     * @return $this
     */
    public function setData($data)
    {
        $this->msgContent['Data'] = $data;

        return $this;
    }

}