

# zyan/laravel-response-json

laravel框架json返回

## 要求

1. php >= 7.2
2. Composer

## 安装

```shell
composer require zyan/laravel-response-json -vvv
```
## 配置

app/Http/Controllers/Controller.php

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

//使用命名空间
use Zyan\JsonResponse\JsonResponse;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use JsonResponse; //use 这个 trait
}

```

## 使用
app/Http/Controllers/User/LoginController.php
```php
<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;


class LoginContoller extends Controller
{
    public function login(){
        //登录成功
        if(true){
            $user = User::get(1);
            return $this->success($user);
        }else{ //失败
            return $this->error('密码错误');
        }
    }
    
    public function getUser(){
        $user = User::get(1);
        return $this->jsonReturn(200,'操作成功',$user);
    }
}
```

## 方法
成功
```php
public function success($data = []);

//return
{
  "code": 1,
  "msg": "ok",
  "data" : []
}
```

失败
```php

//失败
public function error($msg = '操作失败', $data = [], $code = 0);

//return
{
  "code": 0,
  "msg": "操作失败",
  "data" : []
}
```

原生


```php

//失败
public function jsonReturn($code = 200, $msg = '操作成功', $data = ['username' => '用户名']);

//return
{
  "code": 200,//自定义code
  "msg": "操作失败",//说明
  "data" : { //数据
    "username":"用户名"
  }
}
```

## 参与贡献

1. fork 当前库到你的名下
2. 在你的本地修改完成审阅过后提交到你的仓库
3. 提交 PR 并描述你的修改，等待合并

## License

[MIT license](https://opensource.org/licenses/MIT)
