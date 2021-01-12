# Laravel Settings

Adds a settings page and provides a getter for runtime app variables stored in a DB table

This is a fork of an abandoned project. Currently undergoes minimal maintenance for legacy reasons.

Compatible with Laravel ^6.x

## Installation

1) Composer

Add this repository to your composer file:
```
 "repositories": [
        {
            "url": "https://github.com/brandnewteam/laravel-settings.git",
            "type": "git"
        }
    ]
```

Require the latest release:

` "brandnewteam/laravel-settings": "v1.2" `

2) Publication

`php artisan vendor:publish` will publish `config/settings.php` and `resources/vendor/settings` 

3) Migration

You can set the table name in `config/settings.php`, then migrate using `php artisan migrate`

4) Configuration

General settings for the package can be found in `config/settings.php`

## Usage

Web interface: 

Access the module trough the route defined in `config/settings.php` to add and edit your settings

Retrieving the values:

```php
/**
 * States if a given setting key exists  
 * @param string setting_key
 * @return bool
*/
Settings::has('SETTING_KEY');

/**
 * If the given key is found retrieves the value, returns the second argument as default, null if no value can be provided
 * On wildcard * returns an array of matching values
 * @param string setting_key
 * @return string | null | array  
*/
Settings::get('SETTING_KEY');

Settings::get('SETTING_KEY', 'default');

Settings::get('SETTING_*');
```
