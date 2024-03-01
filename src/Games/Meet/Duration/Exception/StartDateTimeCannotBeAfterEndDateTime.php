<?php

declare(strict_types=1);

namespace RpHaven\Games\Meet\Duration\Exception;

use DateTimeImmutable;
use InvalidArgumentException;

final class StartDateTimeCannotBeAfterEndDateTime extends InvalidArgumentException implements DurationException
{
    public function __construct(
        public readonly DateTimeImmutable $start,
        public readonly DateTimeImmutable $end,
    ) {
        parent::__construct(sprintf(
            'The start datetime %s must be before the end datetime %s',
            $this->start->format(DATE_ATOM),
            $this->end->format(DATE_ATOM),
        ));
    }
}
