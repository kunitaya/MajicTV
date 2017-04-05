## 初期構築方法

* 必要なもの  
  - [vagrant](https://www.vagrantup.com/downloads.html)  
  - [chef-DK](https://downloads.chef.io/chef-dk/)  
  - [node.js](https://nodejs.org/ja/)  
  - [Virtualbox](https://www.virtualbox.org/wiki/Downloads)  


### 起動方法
```
berks vendor cookbooks
vagrant plugin install vagrant-omnibus
vagrant up
```

### Composer（必要であれば）
```
php composer.phar install --no-dev
```

composer install は composer.lock の内容になるように環境構築  
composer update は最新を探してきて composer.lock を上書き  

### サブモジュール化手順

```
ser.phar install --no-dev
# php composer.phar update

# rm -rf docs fuel/core fuel/package
# git submodule add -f git://github.com/fuel/core.git fuel/core
# git submodule add -f git://github.com/fuel/oil.git fuel/packages/oil
# git submodule add -f git://github.com/fuel/auth.git fuel/packages/auth
# git submodule add -f git://github.com/fuel/parser.git fuel/packages/parser
# git submodule add -f git://github.com/fuel/orm.git fuel/packages/orm
# git submodule add -f git://github.com/fuel/email.git fuel/packages/email
# git submodule add -f git://github.com/moobay9/fuelpkg.git fuel/packages/fuelpkg

# git submodule foreach 'git pull'
コミットしてプッシュ
```

### サブモジュールの示すリビジョンを変更する

上述の手順により、1.9-devを利用する形になるので、1.8最新版を利用するようリビジョン変更を行う。

```
サブモジュール内に入って git checkout した後、外側(サブモジュールを利用している本体側)で git add; git commit -m 'FuelPHP Submodule Version change(1.8)'; git push します。
```

### マイグレーション(vagrant の環境用)
```
FUEL_ENV=vagrant php oil r migrate
```
