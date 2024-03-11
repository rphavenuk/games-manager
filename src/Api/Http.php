<?php

declare(strict_types=1);

namespace Api;

use Api\Http\DependencyInjection\HttpExtension;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

final class Http extends AbstractBundle
{
    public function getContainerExtension(): HttpExtension
    {
        return new HttpExtension();
    }
}
