<?php

declare(strict_types=1);

namespace RpHaven\Games\Interface;

interface ToStringable extends \Stringable
{

    public function toString(): string;
}
