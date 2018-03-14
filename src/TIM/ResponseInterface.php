<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/12
 * Time: 22:42
 */

namespace MMXS\TIM;

interface ResponseInterface
{
    /**
     * isSuccessFul 接口请求是否成功
     *
     * @author chenmingming
     * @return bool
     */
    public function isSuccessFul(): bool;

    /**
     * getMessage 接口返回描述
     *
     * @author chenmingming
     * @return string
     */
    public function getMessage(): string;

    /**
     * getCode 接口返回码
     *
     * @author chenmingming
     * @return string
     */
    public function getCode(): string;

    /**
     * getData 获取返回对象
     * @author chenmingming
     * @return mixed
     */
    public function getData();
}