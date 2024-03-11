<?php

declare(strict_types=1);

namespace App\Command\Handler;

use App\Command\CommandHandler;
use App\Command\CreateTables as CreateTablesCommand;

final readonly class CreateTables implements CommandHandler
{
    public function __invoke(CreateTablesCommand $createTables)
    {
        foreach ($createTables->tables() as $table) {

        }
    }
}
