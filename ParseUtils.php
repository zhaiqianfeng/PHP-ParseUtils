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
    private $index=0;
    private $orginalStr;

    /**
     * ParseUtils constructor.
     * @param $orginalStr 16进制字符串
     */
    public function __construct($orginalStr)
    {
     $this->orginalStr=$orginalStr;
    }

    /**
     * @return mixed
     */
    public function getByte(){
        return hexdec($this->getBytes(2));
    }

    /**
     * @return mixed
     */
    public function getShort(){
        return hexdec($this->getBytes(4));
    }

    /**
     * @return mixed
     */
    public function getInt(){
        return hexdec($this->getBytes(8));
    }


    /**
     * @return mixed
     */
    public function getIndex()
    {
        return $this->index;
    }

    

    /**
     * @param mixed $index
     */
    public function setIndex($index)
    {
        $this->index = $index;
    }

    /**
     * @param $str
     * @param $len
     * @return mixed
     */
    private function getBytes($len){
        $res=substr($this->orginalStr,$this->getIndex(),$len);
        $this->setIndex($this->getIndex()+$len);
        return $res;
    }
}