<?php

namespace RpHaven\Games\Meet;

use DateInterval;
use DateTimeImmutable;
use RpHaven\Games\Meet\Duration\Exception\StartDateTimeCannotBeAfterEndDateTime;

interface Duration
{

    public function start(): DateTimeImmutable;

    public function end(): DateTimeImmutable;

    public function diff(): DateInterval;

    public function intersects(Duration $duration): bool;
}

