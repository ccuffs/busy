# busy
Serviço web para consultar a disponibilidade de professores


## Config

```
php artisan migrate:install
```

```
php artisan migrate:fresh
```

```
crontab -e
```

```
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

## Dev

```
php artisan make:migration create_users_table --create=users
```

```
php artisan migrate
```

## Teste

```
php artisan cache:clear
```

```
php -S localhost:8000 -t public
```