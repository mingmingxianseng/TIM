<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/12
 * Time: 22:36
 */

namespace MMXS\TIM;

interface RequestInterface
{
    const BASE_URI = 'https://console.tim.qq.com/v4/';

    /**
     * getUri 获取本接口的URI
     *
     * @author chenmingming
     * @return string
     */
    public function getUri(): string;

    /**
     * send
     *
     * @author chenmingming
     * @return ResponseInterface
     */
    public function send(): ResponseInterface;
}