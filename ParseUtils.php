<?php
/**
 * +----------------------------------------------------------------------+
 * | PHP ParseUtils                                                       |
 * +----------------------------------------------------------------------+
 * | Copyright (c)  ZhaiQianfeng                                          |
 * +----------------------------------------------------------------------+
 * | The PareseUtils is for PHP to Parse our protocol                     |
 * +----------------------------------------------------------------------+
 * | Authors: ZhaiQianfeng <zhaiqianfeng@163.com>                         |
 * | WebSite: http://www.zhaiqianfeng.com/blog/                           |
 * | GitHub:  https://github.com/zhaiqianfeng                             |
 * +----------------------------------------------------------------------+
 */

namespace Common\Utils;


class ParseUtils
{
    private $index = 0;
    private $byteArr;

    /**
     * ParseUtils constructor.
     * @param $orginalStr 16进制字符串
     */
    public function __construct($orginalStr)
    {
        $len = ceil(strlen($orginalStr) / 2);

        $tempArr = array();

        for ($i = 0; $i < $len; $i++) {
            $tempArr[] = substr($orginalStr, $i * 2, 2);
        }
        $this->byteArr = $tempArr;
    }

    /**
     * @return mixed
     */
    public function getByte()
    {
        return hexdec($this->getBytes(1));
    }

    /**
     * @return mixed
     */
    public function getShort()
    {
        return hexdec($this->getBytes(2));
    }

    /**
     * @return mixed
     */
    public function getInt()
    {
        return hexdec($this->getBytes(4));
    }


    /**
     * @return mixed
     */
    public function getIndex()
    {
        if ($this->index >= count($this->byteArr)) {
            throw new \Exception("Index Out Of Range Exception,index is " . $this->index . ",and range is" . count($this->byteArr));
        }
        return $this->index;
    }

    /**
     * @param mixed $index
     */
    public function setIndex($index)
    {
        if ($index >= count($this->byteArr) || $index < 0) {
            throw new \Exception("Index Out Of Range Exception,index is " . $index . ",and range is" . count($this->byteArr));
        }
        $this->index = $index;
    }

    /**
     * @param $str
     * @param $len
     * @return mixed
     */
    private function getBytes($len = 1)
    {
        $res = '';
        for ($i = 0; $i < $len; $i++) {
            $res .= $this->byteArr[$this->getIndex()];
            $this->setIndex($this->getIndex() + 1);
        }

        return $res;
    }
}