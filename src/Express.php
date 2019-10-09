<?php


namespace dwn;

use dwn\Channel\Option;
use dwn\Exception\Exception;

class Express
{
    private $url='http://47.103.217.50';

    private $app_id='';

    private $secret='';

    private $option=null;

    private $params=null;
    public function __construct(string $app_id=null,string $secret=null,string $url=null)
    {
       !is_null($url)&&$this->url=$url;
       !is_null($app_id)&&$this->app_id=$app_id;
       !is_null($secret)&&$this->secret=$secret;
    }

    /**
     * 选择操作
     * @param string $option
     * @return object
     */
    public function setOption(string $option):object
    {
         $this->option=$option;
         return $this;
    }

    /**
     * 设置参数
     * @param array $params
     * @return object
     */
    public function setParams(array $params):object
    {
        $this->params=$params;
        return $this;
    }

    /**
     * 执行方法
     * @param array $params
     * @return mixed
     */
    public function execute(array $params=[]){
        $option = $this->option;
        $client=new Option($this->url,$this->app_id,$this->secret);
        $results=$client->$option(array_merge($this->params,$params));
        return $results;
    }

}
