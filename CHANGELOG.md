# Changelog

## [Unreleased](https://codeberg.org/celemas/log/compare/0.3.0...HEAD)

No notable changes since the last release.

## [0.3.0](https://codeberg.org/celemas/log/src/tag/0.3.0) (2026-06-10)

### Breaking Changes

- Rename package metadata, root namespace, repository URLs, homepage, and contact email to Celemas.

## [0.2.0](https://codeberg.org/celemas/log/src/tag/0.2.0) (2026-04-30)

### Breaking

- Made `Logger` final.
- Switched logger constants and level filtering from numeric severities to PSR-3 string levels.
- Renamed the logger constructor parameters from `logfile` and `minimumLevel` to `file` and `level`, and moved `formatter` after `level`.
- Removed `MessageFormatter`, `TemplateFormatter`, and `ContextFormatter`; use `PlainFormatter` or `TextFormatter` instead.
- Changed `Formatter::format()` to accept a default empty array context instead of nullable context.

### Changed

- Made `TextFormatter` the default formatter, combining placeholder interpolation with appended unused context.
- Used timezone-aware `DATE_ATOM` timestamps in log records.
- Normalized default SAPI log records to one physical line while preserving multiline explicit file logs.
- Threw `Psr\Log\InvalidArgumentException` for invalid log levels instead of relying on assertions.

### Fixed

- Removed null bytes after formatting so formatter-provided values cannot write null bytes to logs.
- Appended a newline after each explicit file log record.

## [0.1.0](https://codeberg.org/celemas/log/src/tag/0.1.0) (2026-01-31)

Initial release.

### Added

- Simple PSR-3 compatible logger implementation
- SAPI and explicit file logging through PHP's `error_log`
- Configurable log levels and message formatting
