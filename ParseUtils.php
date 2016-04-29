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
    private $buffer;
    private $orginalStr;
    private $validMaxIndex;


    /**
     * ParseUtils constructor.
     * @param $hexStr 16进制字符串
     */
    public function __construct($hexStr)
    {
        $len = ceil(strlen($hexStr) / 2);

        $tempArr = array();

        for ($i = 0; $i < $len; $i++) {
            $tempArr[] = substr($hexStr, $i * 2, 2);
        }

        $this->buffer = $tempArr;
        $this->validMaxIndex = count($this->buffer) - 1;
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
    public function getOrginalStr()
    {
        return $this->orginalStr;
    }

    /**
     * @return array
     */
    public function getBuffer()
    {
        return $this->buffer;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        if ($this->index >= count($this->buffer)) {
            throw new \Exception("get Index Out Of Range Exception,index is " . $this->index . ",and range is" . count($this->buffer));
        }
        return $this->index;
    }

    /**
     * @param mixed $index
     */
    public function setIndex($index)
    {
        if ($index >= count($this->buffer) || $index < 0) {
            throw new \Exception("set Index Out Of Range Exception,index is " . $index . ",and range is" . count($this->buffer));
        }
        $this->index = $index;
    }

    /**
     * @param $len
     */
    public function ignoreBytes($len)
    {
        $this->getBytes($len, False);
    }

    /**
     * @param int $len
     * @param bool $unIgnore
     * @return string
     */
    private function getBytes($len = 1, $unIgnore = true)
    {
        $res = '';
        for ($i = 0; $i < $len; $i++) {
            if ($unIgnore) {
                $res .= $this->buffer[$this->index];
            }
            if ($this->index < $this->validMaxIndex) {
                $this->index++;
            }else{
                break;
            }
        }

        return $res;
    }
}