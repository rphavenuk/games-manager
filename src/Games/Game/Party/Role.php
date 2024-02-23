<?php

declare(strict_types=1);

namespace RpHaven\Games\Game\Party;

enum Role: string
{
    case GAMES_MASTER = 'Games Master';
    case PLAYER       = 'Player';
}
