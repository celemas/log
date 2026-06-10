# Celemas Log

<!-- prettier-ignore-start -->
[![ci](https://codeberg.org/celemas/log/badges/workflows/ci.yml/badge.svg?style=flat&logo=codeberg&logoColor=white&label=ci)](https://codeberg.org/celemas/log/actions)
[![code coverage](https://img.shields.io/endpoint?url=https%3A%2F%2Fcov.celemas.dev%2Fcelemas%2Fsire%2Fcode%2Fbadge.json)](https://cov.celemas.dev/celemas/log/code)
[![type coverage](https://img.shields.io/endpoint?url=https%3A%2F%2Fcov.celemas.dev%2Fcelemas%2Fsire%2Ftypes%2Fbadge-cover.json)](https://cov.celemas.dev/celemas/log/types)
[![psalm level](https://img.shields.io/endpoint?url=https%3A%2F%2Fcov.celemas.dev%2Fcelemas%2Fsire%2Ftypes%2Fbadge-level.json)](https://cov.celemas.dev/celemas/log/types)
[![Software License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE.md)
<!-- prettier-ignore-end -->

A simple PSR-3 logger using PHP's `error_log` function.

## Installation

```bash
composer require celemas/log
```

## Usage

Create a logger without arguments to write to PHP's default SAPI error logger.

```php
use Celemas\Log\Logger;

$logger = new Logger();
$logger->info('Application started');
```

See the [documentation](docs/index.md) for file logging, level filtering, and formatter usage.

## Testing

During testing, PHP's `error_log` ini setting is set to a temporary file. To print the output to the console, prepend a special env variable to the PHPUnit cli command, as follows:

```bash
ECHO_LOG=1 phpunit
```

### Test Environment Requirements

Tests require:

- `ini_set()` function enabled (for `error_log` redirection)
- Writable system temp directory (for test log file isolation)
- PHP `error_reporting` must be modifiable

These are standard in development environments but may fail in restricted PHP configurations where `ini_set` is disabled via `disable_functions`.

## License

This project is licensed under the [MIT license](LICENSE.md).
