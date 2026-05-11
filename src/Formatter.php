<?php

declare(strict_types=1);

namespace Celemas\Log;

interface Formatter
{
	public function format(string $message, array $context = []): string;
}
