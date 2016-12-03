# Twitter OAuth テスト

## 環境

初回のみ
```bash
composer install
docker build -t twitter_oauth .
```
起動
```bash
docker run -e CONSUMER_KEY=xxxx -e CONSUMER_SECRET=xxxx -v `pwd`:/var/www/html/ -p 80:80 -it twitter_oauth
```

参考ページ  
http://qiita.com/sofpyon/items/982fe3a9ccebd8702867