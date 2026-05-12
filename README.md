# Celemas Log

<!-- prettier-ignore-start -->
[![ci](https://github.com/celemas/log/actions/workflows/ci.yml/badge.svg)](https://github.com/celemas/log/actions)
[![codecov](https://codecov.io/github/celemas/log/graph/badge.svg?token=2EN4S2LRFU)](https://codecov.io/github/celemas/log)
[![psalm coverage](https://shepherd.dev/github/celemas/log/coverage.svg?)](https://shepherd.dev/github/celemas/log)
[![psalm level](https://shepherd.dev/github/celemas/log/level.svg?)](https://shepherd.dev/github/celemas/log)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE.md)
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
