<?php

declare(strict_types=1);

namespace Api\Console\Action\CreateVenue;

use App\Command\CreateSpaces;
use Api\Console\Action\InputTags;
use Api\Console\Input\Keys;
use Api\Console\MessageFactory\CommandFactory;
use Api\Console\MessageFactory\Traits\ExtractValuesTrait;
use Api\Console\Traits\InputSet;
use RpHaven\Games\Branch\Space;
use RpHaven\Games\Branch\Space\Details\Venue;
use RpHaven\Games\Branch\Space\Details\Venue\Coordinates;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

final class CreateVenueCommand implements CommandFactory
{
    use ExtractValuesTrait;
    use InputSet;

    public function __construct(
        #[TaggedIterator(InputTags::CREATE_VENUE->value)]
        iterable $inputs
    ) {
        $this->setInputs($inputs);
    }

    public function build(InputInterface $input, OutputInterface $output): CreateSpaces
    {
        $content = $this->extractValues($input, $output);

        $venue = new Venue(Coordinates::create(
            $content->get(Keys::LATITUDE),
            $content->get(Keys::LONGITUDE),
        ));

        $space = Space::open(
            name: $content->get(Keys::SPACE_NAME),
            details: $venue,
            uri: $content->get(Keys::URI),
        );

        return new CreateSpaces($space);
    }
}
