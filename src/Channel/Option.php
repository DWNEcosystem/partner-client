<?php


namespace dwn\Channel;
 class Option extends Base
{
     /**
      * 发送验证码
      * @param array $params
      * @return array
      * @throws \dwn\Exception\Exception
      */
    public function sendCode(array $params):array
    {
        if(!isset($params['mobile'])||empty($params['mobile'])||!isset($params['region'])||empty($params['region'])){
            return ["code"=>402,'message'=>'参数错误'];
        }
         return $this->post($this->url.'/sendCode', $params,$this->header);
    }

     /**
      * 用户登录授权
      * @param array $params
      * @return array
      * @throws \dwn\Exception\Exception
      */
    public function authorization(array $params): array
    {
        if(!isset($params['mobile'])||empty($params['mobile'])||!isset($params['code'])||empty($params['code'])){
            return ["code"=>402,'message'=>'参数错误'];
        }
        return $this->post($this->url.'/authorization', $params,$this->header);
    }

     /**
      * 获取用户信息
      * @param array $params
      * @return array
      * @throws \dwn\Exception\Exception
      */
    public function getUserInfo(array $params): array
    {
        if(!isset($params['authorization_code'])||empty($params['authorization_code'])){
            return ["code"=>402,'message'=>'参数错误'];
        }
        return $this->post($this->url.'/userInfo', $params,$this->header);
    }

     /**
      * @param array $params
      * @return array
      * @throws \dwn\Exception\Exception
      */
    public function exchange(array $params): array
    {
        if(!isset($params['authorization_code'])||empty($params['authorization_code'])||!isset($params['num'])||empty($params['num'])){
            return ["code"=>402,'message'=>'参数错误'];
        }
        $this->ratio();
        return $this->post($this->url.'/exchange', $params,$this->header);
    }

     /**
      * @param array $params
      * @return array
      * @throws \dwn\Exception\Exception
      */
    public function recharge(array $params): array
    {
        if(!isset($params['authorization_code'])||empty($params['authorization_code'])||!isset($params['num'])||empty($params['num'])){
            return ["code"=>402,'message'=>'参数错误'];
        }
        $this->ratio();
        return $this->post($this->url.'/recharge', $params,$this->header);
    }

     /**
      * @return array
      * @throws \dwn\Exception\Exception
      */
    public function ratio(): array
    {
        return $this->get($this->url.'/ratio',[]);
    }
 }