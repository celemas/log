<?php

declare(strict_types=1);

namespace Celema\Log\Formatter;

use DateTimeInterface;
use Stringable;
use Throwable;

trait PreparesValue
{
	private function prepare(
		mixed $value,
		bool $includeTraceback,
		string $tracebackIndent = '',
	): string {
		return match (true) {
			// Exceptions must be first as they are Stringable
			$value instanceof Throwable => $this->getExceptionMessage(
				$value,
				$includeTraceback,
				$tracebackIndent,
			),
			is_scalar($value) || $value instanceof Stringable => (string) $value,
			$value instanceof DateTimeInterface => $value->format('Y-m-d H:i:s T'),
			is_object($value) => '[Instance of ' . $value::class . ']',
			is_array($value) => $this->prepareArray($value),
			default => '[' . get_debug_type($value) . ']',
		};
	}

	/** @param array<array-key, mixed> $value */
	private function prepareArray(array $value): string
	{
		$encoded = json_encode($value, JSON_UNESCAPED_SLASHES);

		return '[Array ' . ($encoded !== false ? $encoded : '...') . ']';
	}

	/**
	 * The exception, then each previous exception it wraps, so the original
	 * cause of a rethrown error stays in the log.
	 */
	private function getExceptionMessage(
		Throwable $exception,
		bool $includeTraceback,
		string $tracebackIndent,
	): string {
		$parts = [];

		for ($current = $exception; $current !== null; $current = $current->getPrevious()) {
			$part = $current::class . ': ' . $current->getMessage();

			if ($includeTraceback) {
				$trace = $current->getTraceAsString();

				if ($tracebackIndent) {
					// Indent each frame: split on '#', rejoin with indent+'#'
					$trace = implode($tracebackIndent . '#', explode('#', $trace));
				}

				$part .= "\n" . $trace;
			}

			$parts[] = $part;
		}

		return implode("\n" . $tracebackIndent . 'Caused by: ', $parts);
	}
}
