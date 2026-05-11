<?php

declare(strict_types=1);

namespace Celemas\Log\Formatter;

use Celemas\Log\Formatter;
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
