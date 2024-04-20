# アプリケーション名　　
### Atte  
勤怠管理アプリ  
<img width="1823" alt="スクリーンショット 2024-04-14 19 30 12" src="https://github.com/cobaaan/atte/assets/77657934/cb4c3c73-f97a-49db-ad03-d7615e85250e">　　


## 環境構築　　
### Dockerビルド　　

1.git clone git@github.com:estra-inc/confirmation-test-contact-form.git　　
2.DockerDesktopアプリを立ち上げる　　
3.docker-compose up -d --build　　
　　
### Laravel環境構築

1.docker-compose exec php bash  
2.composer install  
3.「.env.example」ファイルを 「.env」ファイルに命名を変更。または、新しく.envファイルを作成  
4..envに以下の環境変数を追加  
```DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass```

5.アプリケーションキーの作成  
php artisan key:generate  
6.マイグレーションの実行  
php artisan migrate  
7.シーディングの実行  
php artisan migrate  

## 使用技術(実行環境)　　
PHP8.3.3　　
Laravel8.83.27　　
MySQL8.3.0　　
　　
## ER図　　
![atte drawio](https://github.com/cobaaan/atte/assets/77657934/6aac3edf-32b6-48ce-9e1c-d5e428d5f02a)　　


## URL　　
開発環境：http://localhost/　　
データベース：http://localhost:8080/index.php　　
　　
本番環境：http://atte.blog　　
