<?php


namespace dwn\Channel;
use dwn\HttpRequest;
abstract class Base
{
    use HttpRequest;
    /**
     * 请求地址
     * @var string
     */
     protected $url= 'http://47.102.36.123:8686';
    /**
     * 资源返回
     * @var string
     */

     protected $secret;
    /**
     * 请求头
     * @var array
     */
     protected $header=[];

    function __construct($app_id,$secret)
    {
        $this->header=[
            'appId:'.$app_id,
            'Content-Type: application/json'
        ];
        $this->secret=$secret;
    }

    /**
     * @param $values
     * @return string
     * 把参数装成url
     */
    private function ToUrlParams($values)
    {
        $buff = "";
        foreach ($values as $k => $v)
        {
            if($k != "sign" && $v != "" && !is_array($v)){
                $buff .= $k . "=" . $v . "&";
            }
        }
        $buff = trim($buff, "&");
        return $buff;
    }

    //生成签名
    public function MakeSign($values)
    {
        //签名步骤一：按字典序排序参数
        ksort($values);
        $string = $this -> ToUrlParams($values);
        //签名步骤二：在string后加入KEY
        $string = $string . "&key=".$this -> secret;
        //签名步骤三：MD5加密
        $string = md5($string);
        //签名步骤四：所有字符转为大写
        $result = strtoupper($string);
        return $result;
    }

    /**
     * 发送验证码
     * @param array $params
     * @return array
     */
    abstract public function sendCode(array $params):array ;

    /**
     * 用户授权
     * @param array $params
     * @return array
     */
    abstract public function authorization(array $params):array ;
    /**
     * 用户信息
     * @param array $params
     * @return array
     */
    abstract public function getUserInfo(array $params):array ;
    /**
     * dwn兑换其他货币
     * @param array $params
     * @return array
     */
    abstract public function exchange(array $params):array ;
    /**
     * 其他货币兑换dwn
     * @param array $params
     * @return array
     */
    abstract public function recharge(array $params):array ;

    /**
     * 获取实时汇率
     * @return array
     */
    abstract public function ratio():array ;

    /**
     * 获取用户数据
     * @return array
     */
    abstract public function getNetworks(array $params):array ;
}
