# dwn-client
dwn 第三方对接类库
# 安装
>composer require dwn/partner-client

### 使用示例
~~~
use dwn\Express;
$client=new Express('89dtd90a','b966d6bbc3ac62dccd7b3c3c96b277c1');
$client->setOption('getUserInfo')->setParams(["authorization_code"=>"45e8c62cmchihijng9lv5okk1i"])->execute();
~~~
### 方法

~~~
 1、setOption 选择对应的操作
      <1>  sendCode        发送验证码
      <2>  authorization   用户登录授权
      <3>  getUserInfo     获取用户信息
      <4>  exchange        dwn兑换其他货币
      <5>  recharge        其他货币兑换dwn
      <6>  ratio           获取实时汇率
~~~

~~~
 2、setParams 设置上行数据
~~~

~~~
 3、execute  执行请求
~~~

##api文档地址

 https://documenter.getpostman.com/view/5661844/SVfUt72z?version=latest#feae8e93-6d8f-4e1d-8f8a-92d32cc8f457