# Google Cloud Message PHP SDK
[![Build Status](https://travis-ci.org/gianarb/php-gcm.svg)](https://travis-ci.org/gianarb/php-gcm) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gianarb/php-gcm/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gianarb/php-gcm/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/gianarb/php-gcm/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/gianarb/php-gcm/?branch=master)
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
