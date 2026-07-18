<?php

declare(strict_types=1);

namespace Celema\Log;

interface Formatter
{
	public function format(string $message, array $context = []): string;
}
