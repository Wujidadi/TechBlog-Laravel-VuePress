# TechBlog (Laravel & VuePress)

用 Laravel + VuePress 搭建的技術部落格。

---

## Quick Start

### 在宿主環境上，本專案根目錄中執行

```bash
cp .env.example .env
# 如果你的 CPU 是 ARM 架構，要把 .env 裡的 DOCKER_IMAGE_VERSION_AP 改為 3.0-arm
docker-compose up -d
docker exec -it TechBlog-Laravel-VuePress-Main zsh  # 進入 Docker 容器
```

### 在 Docker 容器內執行

```bash
composer i
composer update           # 可選項
php artisan key:generate  # 首次啟動專案時才需要執行
npm ci
cd vuepress
npm ci
```

---

## 編譯頁面

### 將 `vurpress/docs` 下的 Markdown 檔案編譯成 Laravel 路由可存取的頁面

```bash
cd vuepress
npm run docs:build
```

---

## 參考資料

+ [Answer by kevnk - Using Vuepress within a Laravel project - Stack Overflow](https://stackoverflow.com/a/53396105/9402488)
+ [Vuepress Within a Laravel Application - Server Side Up](https://serversideup.net/vuepress-within-a-laravel-application/)
