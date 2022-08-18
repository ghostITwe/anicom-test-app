# Anicom-test-app

Репозиторий тестового задания для компании AnicomGroup


## Локальный запуск

Склонировать репозиторий

```bash
  git clone https://github.com/ghostITwe/anicom-test-app
```

Перейти в директорию проекта

```bash
  cd anicom-test-app
```

Установить необходимые зависимости

```bash
  composer i
```

Выполнить команду sail up, перед этим нужно запустить докер демон.

```bash
    Linux: sudo systemctl start docker
    Windwos: запустить DockerDesktop
```

```bash
  ./vendor/bin/sail up
```

После запуска sail up, сгенерировать `APP_KEY` для дальнейшей работы

```bash
  sail artisan key:generate
```

Запустить миграции для создания таблиц в базу данных

```bash
  sail artisan migrate --seed
```

Чтобы корректно отображались стили нужно выполнить команду

```bash
    ./vendor/bin/sail npm i 
    ./vendor/bin/sail npm run dev
```


## Переменные среды

Чтобы корректно запустился проект, необходимо изменить `.env.example` на `.env`, после чего ввести нужные значения

`DB_DATABASE` = anicom_test_app

`DB_USERNAME` = anicom

`DB_PASSWORD` = anicomGroup

## Авторизация для управления категориями и продуктами

Нужно перейти по адресу {host}/admin/login

`Login` = adminAnicomGroup

`Password` = AnicomGroupPassword
