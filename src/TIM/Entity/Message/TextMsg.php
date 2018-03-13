<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 19:56
 */

namespace MMXS\TIM\Entity\Message;

use MMXS\TIM\Constant\MsgType;

class TextMsg extends AbstractMsg
{
    /**
     * @inheritdoc
     */
    public function getMsgType(): string
    {
        return MsgType::TIM_TEXT;
    }

    /**
     * setText
     *
     * @author chenmingming
     *
     * @param string $text
     *
     * @return $this
     */
    public function setText(string $text)
    {
        $this->msgContent['Text'] = $text;

        return $this;
    }
}