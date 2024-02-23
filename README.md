# MLS API PHP Library

[![Build Status](https://github.com/horisystems/mlsapi-php-sdk/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/horisystems/mlsapi-php-sdk/actions?query=branch%3Amain)
[![Latest Stable Version](http://poser.pugx.org/mlsapi/mlsapi-php-sdk/v)](https://packagist.org/packages/mlsapi/mlsapi-php-sdk)
[![Total Downloads](https://poser.pugx.org/mlsapi/mlsapi-php-sdk/downloads.svg)](https://packagist.org/packages/mlsapi/mlsapi-php-sdk)
[![License](https://poser.pugx.org/mlsapi/mlsapi-php-sdk/license.svg)](https://packagist.org/packages/mlsapi/mlsapi-php-sdk)

The library provides convenient access to the MLS API functionality from applications written in the PHP language.

## Requirements

PHP 7.x.x and later.

## Dependencies

The library require the following extensions in order to work properly:

-   [`Guzzle`](https://docs.guzzlephp.org/en/stable/)

> If you use Composer, these dependencies should be handled automatically. If you install manually, you'll want to make sure that these extensions are available.

## Development

Get [Composer](https://formulae.brew.sh/formula/composer). For example, on macOS:

```bash
brew install composer
```

Install dependencies:

```bash
composer install
```

## Manual Testing

Set environment variables in terminal. For example, on macOS:

```bash
export username="your_username"
export password="your_password"

# The login credentials are for the prototype plan. Rate limiting applies.
```

Execute test:

```bash
composer update && composer validate
./vendor/bin/phpunit tests
```

## Getting Started

### Install

You can install the library via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require mlsapi/mlsapi-php-sdk
```

### Usage

Simple usage requires you to `init` and `authenticate`.

```php
use Mlsapi\Mlsapi\Client;

$sdk = Client::init($config); // guzzle config .
$sdk->authentication($username, $password); // return auth data.
```

Alternatively, you can save the token.

```php
$sdk = Client::initWithToken($token);
```

Then, you can call the MLS API endpoint to retrieve data.

```php
$sdk->teams()->getAll();
$sdk->teams()->getById($id);

// Additional API Endpoints
//
// teams
// players
// hist
// rtd
// assists
// offence
// topscorer
// fixtures
// standings
// news
```

The MLS API documentation is available [here](https://horisystems.com/mls-api/). If you need further assistance, don't hesitate to [contact us](https://horisystems.com/contact/).

## License

This project is licensed under the [MIT License](./LICENSE).  
  
## Copyright

(c) 2020 - 2024 Hori Systems Limited. All Rights Reserved.
