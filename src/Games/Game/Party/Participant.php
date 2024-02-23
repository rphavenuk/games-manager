<?php

declare(strict_types=1);

namespace RpHaven\Games\Game\Party;

use RpHaven\Games\Interface\ToStringable;

interface Participant extends ToStringable
{
    public function roles(): iterable;

    public function hasRole(Role $role): bool;
}
