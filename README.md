<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## laravel-jwt-api-auth

Авторизация с помощью библиотеки JWT. С разделением на скоупы для администратора и юзера

**ENUM**

```composer require bensampo/laravel-enum```

config/app.php provider 

```'BenSampo\Enum\EnumServiceProvider'```

use

```php artisan make:enum NAME```

**JWT**

```composer require tymon/jwt-auth:^1.0.0```

config/app.php provider

```php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"```

secret key (JWT_SECRET=GENERATED_KEY in .env)

```php artisan jwt:secret```

**IDE HELPER**

```composer require --dev barryvdh/laravel-ide-helper```

app/Providers/AppServiceProvider.php register method

```
if ($this->app->environment() !== 'production') {
    $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
}
```

generate helpers file

```php artisan ide-helper:generate```
