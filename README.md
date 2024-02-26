## About AppConnect
AppConnect is a module for OXID eSales that enables app connection to the Shop.

```
This module is intended to be used on non production stages!
```

### Installation
```
composer require esyon/appconnect
```

### Migrations
The module needs to create an additional DB field for saving the token, so be sure to run the migrations

```
vendor/bin/oe-eshop-db_migrate migrations:migrate
```

### Usage
The usage is straight forward. Simply call the desired endpoints in the corresponding controllers for your desired functionality