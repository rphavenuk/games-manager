<?php

declare(strict_types=1);

namespace Api\Console\Action;

enum InputTags: string
{
    case CREATE_BRANCH  = 'api.console.create_branch.input';
    case LIST_BRANCHES  = 'api.console.list_branches.input';
    case LIST_GAMES     = 'api.console.list_games.input';
}
