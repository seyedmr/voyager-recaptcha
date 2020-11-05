# Voyager Recaptcha
Voyager Recaptcha helps you to add recaptcha to your voyager login page.

## Install
1. `composer require seyedmr/voyager-recaptcha`
2. `php artisan vendor:publish --tag voyager-recaptcha`

## Configuration

Add `VOYAGER_RECAPTCHA_SECRET` and `VOYAGER_RECAPTCHA_SITEKEY` into **.env**
```dotenv
VOYAGER_RECAPTCHA_SECRET=secret-key
VOYAGER_RECAPTCHA_SITEKEY=site-key
```

(You can obtain them from [here](https://www.google.com/recaptcha/admin))

**THE END** :)
