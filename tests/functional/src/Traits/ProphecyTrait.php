<?php

declare(strict_types=1);

namespace Tests\Functional\Traits;

use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophet;

trait ProphecyTrait
{
    private Prophet $prophet;

    /**
     * @param string $classOrInterface
     * @return ObjectProphecy
     */
    private function prophesize(string $classOrInterface): ObjectProphecy
    {
        if (!isset($this->prophet)) {
            $this->prophet = new Prophet();
        }

        return $this->prophet->prophesize($classOrInterface);
    }
}
