# terminal-pizza

## DataBase
Внести данные о базе в   /config/db.ini

Дамп DB   /maksim_terminal_pizza.sql

## Условие задания:
Сделать “терминал” для приёма заказов на пиццу. Фронтовая часть будет состоять из 3 дропдаунов и кнопки “заказать”. В дропдаунах можно выбрать тип и размер пиццы, соус.

Пиццы: Пепперони, Деревенская, Гавайская, Грибная.

Размер, см: 21, 26, 31, 45.

Соусы: сырный, кисло-сладкий, чесночный, барбекю

Цены можно брать произвольные. Но, они должны различаться между типами пиццы. И, чем больше размер, тем больше должна быть цена. За один раз заказать можно только одну пиццу.

После нажатия кнопки “заказать”, на фронте должен появиться чек с ценой заказа, и его описанием(то, что было выбрано в дропдаунах).  Пользоваться бэкенд фреймворками нельзя. Можно использовать composer. Стилевое оформление не принципиально.

Усложнения:
* Организовать бэкенд структуру по ООП принципам. Как минимум должен быть абстрактный класс для пицц и класс, ответственный за подсчёт суммы заказа.
* Подключить MySQL. Ханить и получать данные о пиццах, соусах и ценах из БД.
* На фронт части используем jQuery. Кнопка заказа должна работать через ajax запрос.
