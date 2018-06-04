# laravel-translation-manager

# Laravel Translations

The most time-consuming tasks when translating an application is to extract all the template contents to be translated and to keep all the translation files in sync. This package includes a command called `translation:update` that helps you with these tasks.

## Installation

```sh
$ composer require alexeybob/laravel-translation-manager dev-master
$ php artisan vendor:publish --tag=abtmPublishes --force
$ HTTPDUSER=$(ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1)
$ sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:$(whoami):rwX resources/lang
$ sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:$(whoami):rwX resources/lang
```