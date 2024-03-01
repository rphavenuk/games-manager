<?php

declare(strict_types=1);

namespace Tests\Functional\Context;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use DateTimeImmutable;
use Tests\Functional\Traits\ProphecyTrait;

final class GamesManager implements Context
{
    use ProphecyTrait;

    private readonly array $games;

    private readonly DateTimeImmutable $today;

    /**
     * @Given that there are games:
     */
    public function thatThereAreGames(TableNode $games): void
    {
        $originalGames = [];
        foreach ($games->getHash() as $game) {
            $originalGames[] = json_decode(json_encode($game), false);
        }

        $this->games = $originalGames;
    }

    /**
     * @Given today is :today
     */
    public function todayIs(string $today): void
    {
        $this->today = new DateTimeImmutable($today);
    }

    /**
     * @When I check available games
     */
    public function iCheckAvailableGames(): void
    {
        throw new PendingException();
    }

    /**
     * @Then I see the following games:
     */
    public function iSeeTheFollowingGames(TableNode $expectedGames): void
    {
        throw new PendingException();
    }
}
