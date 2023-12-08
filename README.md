##Телеграм-бот

### Настройка бота:

Бот разработан на Laravel с помощью библиотеки Telegraph

Документация [Laravel Telegraph](https://defstudio.github.io/telegraph/).

- cp .env.example .env
- composer install
- ./vendor/bin/sail up -d
- создать бота с помощью [BotFather](https://telegram.me/BotFather)
- sail artisan telegraph:new-bot
- вместо localhost получить домен через утилиту [ngrok](https://ngrok.com/) (необходимо для отправки вебхуков)
- поместить сгенерированный домен в переменную APP_URL файла .env
- sail artisan telegraph:set-webhook
- sail artisan tester
