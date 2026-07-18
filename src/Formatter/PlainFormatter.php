<?php

declare(strict_types=1);

namespace Celema\Log\Formatter;

use Celema\Log\Formatter;
use Override;

/** @api */
final class PlainFormatter implements Formatter
{
	#[Override]
	public function format(string $message, array $context = []): string
	{
		return $message;
	}
}
