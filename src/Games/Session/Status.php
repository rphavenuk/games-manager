<?php

declare(strict_types=1);

namespace RpHaven\Games\Session;

enum Status: string
{
    case CANCELLED = 'Cancelled';
    case PENDING_CONFIRMATION = 'Pending Confirmation';

    case CONFIRMED = 'Confirmed';

}