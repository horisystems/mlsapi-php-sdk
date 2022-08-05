# MLS API PHP Library

The library provides convenient access to the MLS API functionality from applications written in the PHP language.

## Requirements

PHP 7.x.x and later.

## Dependencies

The library require the following extensions in order to work properly:

-   [`Guzzle`](https://docs.guzzlephp.org/en/stable/)

> If you use Composer, these dependencies should be handled automatically. If you install manually, you'll want to make sure that these extensions are available.

## Development

Get [Composer][composer]. For example, on macOS:

```bash
brew install composer
```

Install dependencies:

```bash
composer install
```

## Getting Started

### Install

You can install the library via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer install mslapi/mslapi-php-sdk
```

### Usage

Simple usage requires you to `init` and `authenticate`.

```php
use Mslapi/Mslapi/Client;

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

The MLS API documentation is available [here](https://moatsystems.com/mls-api/). If you need further assistance, don't hesitate to [contact us](https://moatsystems.com/contact/).

## License

This project is licensed under the [MIT License](./LICENSE).  
  
## Copyright

(c) 2022 Moat Systems Limited.