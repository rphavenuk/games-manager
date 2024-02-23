<?php

declare(strict_types=1);

namespace Tests\Unit\Games;

use DateInterval;
use DateTimeImmutable;
use Infra\Factory\CampaignFactory;
use Infra\Factory\GameFactory;
use Infra\Factory\MeetFactory;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use RpHaven\Games\Branch\Space;
use RpHaven\Games\Game;
use RpHaven\Games\Game\Party\Participant\GamesMaster;
use RpHaven\Games\Meet\Duration;
use RpHaven\Games\Table;
use Tests\Unit\Traits\StaticMeetFactory;

final class TableTest extends TestCase
{
    use ProphecyTrait;
    use StaticMeetFactory;

    private static GameFactory $gameFactory;
    private static CampaignFactory $campaignFactory;



    public static function setUpBeforeClass(): void
    {
        self::$gameFactory = new GameFactory();
        self::$campaignFactory = new CampaignFactory();
    }
    public function testItHasAStringableName(): void
    {
        $name = 'One-shot Rotation';
        $lifetime = new Duration(new DateTimeImmutable(),  new DateTimeImmutable('+7 days'));
        $table = Table::set($name, $lifetime, $this->prophesize(Space::class)->reveal());

        $this->assertSame($name, $table->name);
        $this->assertSame($name, (string) $table);
        $this->assertSame($name, $table->toString());
    }

    public function testItHasGames(): void
    {
        $lifetime = new Duration(new DateTimeImmutable(),  new DateTimeImmutable('+7 days'));
        $table = Table::set(
            'One-shot Rotation',
            $lifetime,
            $this->prophesize(Space::class)->reveal(),
        );

        $this->assertSame(0, $table->count());
        $game1 = $this->game('D&D 5E', 'Barney');
        $changedTable = $table->add($game1);
        $this->assertSame(0, $table->count());
        $this->assertSame(1, $changedTable->count());
        $this->assertSame($game1, $changedTable->games()->current());
    }

    public function testItThrowsAnExceptionIfAGameSessionCollidesWithAnotherGame(): void
    {
        $lifetime = new Duration(new DateTimeImmutable(),  new DateTimeImmutable('+30 days'));
        $table = Table::set(
            'One-shot Rotation',
            $lifetime,
            $this->prophesize(Space::class)->reveal(),
        );
        $game1 = $this->game('D&D 5E', 'Barney');
        $game2 = $this->game('Infinity', 'Barney');
        $table = $table->add($game1);
    }

    private function game(
        string $system,
        string $gamesMaster,
        DateTimeImmutable $firstSessionStart = new DateTimeImmutable()
    ): Game {
        $gamesMaster = GamesMaster::create($gamesMaster);
        $meets = $this->meetFactory()->series(
            $firstSessionStart,
            new DateInterval('P7D'),
            3
        );
        $campaign = self::$campaignFactory->meets(...$meets);

        return self::$gameFactory->init($system, $gamesMaster, $campaign);
    }
}
