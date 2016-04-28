# PHP-ParseUtils
The PareseUtils is for PHP to Parse our protocol.

If you have any questions,please [let me know](http://www.zhaiqianfeng.com/blog/guest-book/).

##Code example
<code>
    public function prase($orginalStr)
    {
        
        $parse = new ParseUtils($orginalStr);

        $res = $parse->getByte();
        $res .= $parse->getShort();

        return $res;
    }
</code>
