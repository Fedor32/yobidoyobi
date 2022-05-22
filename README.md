# Тестовое задание
___
Реализовать REST API методы для сохранения, редактирования и получения Заказа.

Заказ должен содержать 
- номер,
- фио,
- общую сумму заказа,
- дату его создания
- адрес доставки.

Задание необходимо реализовать на Laravel.

## Установка
___
Клонировать репозиторий.

Скачать зависимости `composer install`

Настроить подключение к БД в файле `.env`

Применить миграции `$ php artisan migrate`

## Методы API
___

#### Регистрация пользователя `POST` `/api/auth/register`
```
Body {
    "name": "Fedor",
    "email": "test@test.ru",
    "password": "12345678",
    "password_confirmation": "12345678"
}

Header
    Content-Type:application/json
    Accept:application/json
```

#### Авторизация (получение токена) `POST` `/api/auth/register`
```
Body {
    "email": "test@test.ru",
    "password": "12345678"
}
Header
    Content-Type:application/json
    Accept:application/json
```

#### Список заказов `GET` `/api/orders`
```
Header
    Content-Type:application/json
    Accept:application/json
    Authorization: Bearer <Token>
```

#### Создать заказ `POST` `/api/orders`
```
Body {
    "number": "1",
    "client": "Ёбидоёби",
    "total_sum": "150",
    "address": "ул. Приморский проспект, 137 к.1",
}
Header
    Content-Type:application/json
    Accept:application/json
    Authorization: Bearer <Token>
```
#### Получить информацию о заказе по ID `GET` `/api/orders/{ID}`
```
Header
    Content-Type:application/json
    Accept:application/json
    Authorization: Bearer <Token>
```

#### Изменить заказ `PUT` `/api/orders`
```
Body {
    "number": "1",
    "client": "Ёбидоёби",
    "total_sum": "150",
    "address": "ул. Приморский проспект, 137 к.1",
}
Header
    Content-Type:application/json
    Accept:application/json
    Authorization: Bearer <Token>
```

#### Удалить заказ `DELETE` `/api/orders/{ID}`
```
Header
    Content-Type:application/json
    Accept:application/json
    Authorization: Bearer <Token>
```
