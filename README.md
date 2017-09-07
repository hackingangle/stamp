## 使用说明

### 依赖

1. mysql
    - version5.5+
1. php
    - version7.2+


### 初始化

1. 进入项目目录
``` bash
cd $项目目录$
```

1. 安装php依赖
```bash
composer install
```

1. 修改数据库连接
``` bash
vim .env
```

1. 创建数据库结构
``` bash
php artisan migrate
```

### 入口

1. 管理入口
    - http://127.0.0.1:8000/dashboard
1. 网站入口
    - http://127.0.0.1:8000/