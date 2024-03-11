<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch\Space;

enum Status: string
{
    case OPEN = 'open';
    case CLOSED = 'closed';

    case PENDING = 'pending';
}
