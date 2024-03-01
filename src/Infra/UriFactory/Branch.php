<?php

declare(strict_types=1);

namespace Infra\UriFactory;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use RpHaven\Games\BranchManager\UriFactory;

final class Branch implements UriFactory
{

    public function create(string $branchName): UriInterface
    {
        $branchName = preg_replace('/^\w/', '-', $branchName);

        var_dump($branchName);
        return new Uri(sprintf(
            'https://raven.co.uk/branch/%s',
            $branchName
        ));
    }
}
