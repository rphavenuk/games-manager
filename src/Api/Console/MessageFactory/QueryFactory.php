<?php

declare(strict_types=1);

namespace Api\Console\MessageFactory;

use Api\Console\MessageFactory;
use App\Query;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

interface QueryFactory extends MessageFactory
{
    public function build(InputInterface $input, OutputInterface $output): Query;
}
