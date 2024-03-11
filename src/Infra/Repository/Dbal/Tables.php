<?php

declare(strict_types=1);

namespace Infra\Repository\Dbal;

enum Tables: string
{
    case BRANCHES = 'branches';
    case GAMES = 'games';
    case SPACES = 'spaces';
    case MEETS = 'meets';
    case TABLES = 'tables';
    case TABLES_MEETS = 'tables_meets';
    case CAMPAIGNS = 'campaigns';
    case SESSIONS = 'sessions';
    case VENUES = 'venues';
}
