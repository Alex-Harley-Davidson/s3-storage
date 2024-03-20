<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://sue.eu/wp-content/uploads/sites/6/2022/06/aws-logo-920x920-sue-v04.png" height="100px">
    </a>
    <h1 align="center">S3 storage</h1>
    <br>
</p>

Инструкция по установке c Docker:
---------------------------------

Установка пакетов при помощи композера:

```
docker-compose run --rm backend composer install
```

Инициализация приложения:

```
docker-compose run --rm backend php init
```
Следуем инструкциям консоли: выбор окружения, генерация файлов

Запустить приложение:

```
docker-compose up -d
```

<p>Функционал: на главной странице расположена форма для загрузки файла в хранилище</p>