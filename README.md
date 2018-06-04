# Manage Laravel Translations

This is a package to manage Laravel translation files. It will change translation files with your changes. All changed file will be backuped before updated.

## Installation

```sh
$ composer require alexeybob/laravel-translation-manager dev-master
$ php artisan vendor:publish --tag=abtmPublishes --force
```

The package needs access to `resources/lang` to `read/write`
```sh
$ HTTPDUSER=$(ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1)
$ sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:$(whoami):rwX resources/lang
$ sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:$(whoami):rwX resources/lang
```