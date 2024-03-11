<?php

declare(strict_types=1);

namespace App\Command\Handler;

use App\Command\CommandHandler;
use App\Command\CreateSpaces as CreateSpacesCommand;

final class CreateSpaces implements CommandHandler
{
    public function __construct()
    {

    }

    public function __invoke(CreateSpacesCommand $createSpaces)
    {
        var_dump($createSpaces);
    }
}
