# PHP-ParseUtils
The PareseUtils is for PHP to Parse our protocol.

If you have any questions,please [let me know](http://www.zhaiqianfeng.com/about/).

##Code example

    public function prase($orginalStr)
    {
        //init hex string
        $parse = new ParseUtils($orginalStr);

        //parse the protocol
        $res = $parse->getByte();
        $res .= $parse->getShort();

        //set the byte index
        $parse->setIndex(1);
        $res .= $parse->getShort();

        //ignore next 10bytes
        $parse->ignoreBytes(10);
        $res .= $parse->getShort();

        return $res;
    }

