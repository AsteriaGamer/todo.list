# Todo.list

Пример простого списка задач на базе фреймворка Laravel + Vue + MySQL.

### Возможности:

  - Добавление, удаление, редактирование задач.
  - Изменение состояния заданий с визуальными отметками (выполнено, не выполнено,  просрочено, новое задание)
  - Выбор времени исполнения задач
  - Выбор ответственных за выполнение задачи пользователей
  - Добавление, удаление, редактирование подзадач
  - Назначение времени решения подзадач
  - Вся работа происходит на одной странице браузера, без перезагрузок.

### Установка:

Для установки необходимо:

 - иметь [настроенный](https://laravel.com/docs/8.x/installation#installation) для работы с laravel web-сервер. 
 - установить nodejs (желательно выше 12 версии) и пакетный менеджер npm
 - склонировать или скачать данный  репозиторий, и поместить его содержимое в папку web-сервера.
 - настроить проект в файле .env (изменить данные для подключения к СУБД, временную зону, имя сайта, домен, выключить режим отладки если необходимо). 
 - установить зависимости используемые фреймворком. Их список уже содержится в файле composer.json. 
 - развернуть субд (необходимые файлы миграции присутствуют).

> cd /var/www 
> git clone https://github.com/AsteriaGamer/todo.list.git todo-project 
> cd todo-project 
> composer install 
> npm install
> php artisan migrate
> npm run watch

   ### Изображения:
   ![enter image description here](https://raw.githubusercontent.com/AsteriaGamer/todo.list/master/image-example/example1.png?token=AAIPP5C4AWGKXE27TLTG4W27TXL4E)![enter image description here](https://raw.githubusercontent.com/AsteriaGamer/todo.list/master/image-example/example2.png?token=AAIPP5DRG3O3XQSEI4DHAV27TXMAM)![enter image description here](https://raw.githubusercontent.com/AsteriaGamer/todo.list/master/image-example/example3.png?token=AAIPP5BE42TRSWCTYXUX5OC7TXMBY)![enter image description here](https://raw.githubusercontent.com/AsteriaGamer/todo.list/master/image-example/example4.png?token=AAIPP5BZ6ZZF34TXZ5IINSS7TXMDO)![enter image description here](https://raw.githubusercontent.com/AsteriaGamer/todo.list/master/image-example/example5.png?token=AAIPP5D3EHSPX3XJZSQXG3S7TXMDA)
