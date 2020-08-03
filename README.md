# practice_pdo
 PDOでのDB操作開発環境
 
# バージョン
php:7.2
mysql:8.0

# はじめに
- Docker導入済み
- docker-composeコマンドが使用できる

# 手順
rootディレクトリで
```$xslt
docker-compose up -d
```
そして
```$xslt
docker-compose build
```
DBに初期情報流し込み

localhost:8080
でサイト表示
localhost:8888
でphpmyadmin表示

## 注意
Mysql8.0から、接続時の認証方式が変更になったらしい
mysqlのコンテナに入って、rootの認証方式を変更した
```
alter user 'root'@'%' identified with mysql_native_password by 'secret'
```
