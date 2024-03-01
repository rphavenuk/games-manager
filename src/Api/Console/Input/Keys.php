<?php

declare(strict_types=1);

namespace Api\Console\Input;

enum Keys: string
{
    case URI = 'uri';
    case BRANCH_NAME = 'branchname';
}
