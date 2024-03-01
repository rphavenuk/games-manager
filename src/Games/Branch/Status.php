<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch;

enum Status: int
{
    case OPEN = 1;
    case CLOSED = 2;
}
