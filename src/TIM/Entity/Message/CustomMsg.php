<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 20:28
 */

namespace MMXS\TIM\Entity\Message;

use MMXS\TIM\Constant\MsgType;

class CustomMsg extends AbstractMsg
{
    public function getMsgType(): string
    {
        return MsgType::TIM_CUSTOM;
    }

    /**
     * setData
     *
     * @author chenmingming
     *
     * @param string $data
     *
     * @return $this
     */
    public function setData(string $data)
    {
        $this->msgContent['Data'] = $data;

        return $this;
    }

    /**
     * setDesc
     *
     * @author chenmingming
     *
     * @param string $desc
     *
     * @return $this
     */
    public function setDesc(string $desc)
    {
        $this->msgContent['Desc'] = $desc;

        return $this;
    }

    /**
     * setExt
     *
     * @author chenmingming
     *
     * @param $ext
     *
     * @return $this
     */
    public function setExt($ext)
    {
        $this->msgContent['Ext'] = $ext;

        return $this;
    }

    /**
     * setSound
     *
     * @author chenmingming
     *
     * @param $sound
     *
     * @return $this
     */
    public function setSound($sound)
    {
        $this->msgContent['Sound'] = $sound;

        return $this;
    }

}