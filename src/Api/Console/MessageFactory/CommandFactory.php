<?php

declare(strict_types=1);

namespace Api\Console\MessageFactory;

use Api\Console\MessageFactory;
use App\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

interface CommandFactory extends MessageFactory
{
    public function build(InputInterface $input, OutputInterface $output): Command;
}
