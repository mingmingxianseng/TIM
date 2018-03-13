<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 19:59
 */

namespace MMXS\TIM\Entity\Message;

use MMXS\TIM\Constant\MsgType;

class LocationMsg extends AbstractMsg
{
    public function getMsgType(): string
    {
        return MsgType::TIM_LOCATION;
    }

    /**
     * setDesc
     *
     * @author chenmingming
     *
     * @param $desc
     *
     * @return $this
     */
    public function setDesc($desc)
    {
        $this->msgContent['Desc'] = $desc;

        return $this;
    }

    /**
     * setLatitude
     *
     * @author chenmingming
     *
     * @param $latitude
     *
     * @return $this
     */
    public function setLatitude($latitude)
    {
        $this->msgContent['Latitude'] = $latitude;

        return $this;
    }

    /**
     * setLongitude
     *
     * @author chenmingming
     *
     * @param $longitude
     *
     * @return $this
     */
    public function setLongitude($longitude)
    {
        $this->msgContent['Longitude'] = $longitude;

        return $this;
    }
}