# Google Cloud Message PHP SDK
PHP sdk to push android notifications with Google Cloud Manager

## Install
```
composer install gianarb/php-gcm
```

## Getting Started
```php
$client = new GuzzleHttp\Client();
$publisher = new Publisher($client, "googleSendKeyID");

$publisher->push(["firstDeviceToken"], [
    'message'   => '',
    'title'     => '',
    'subtitle'  => '',
    'tickerText'    => '',
    'vibrate'   => 1,
    'sound'     => 1,
    'largeIcon' => 'large_icon',
    'smallIcon' => 'small_icon'
]);
```

## Tests
```
vendor/bin/phpunit
```
