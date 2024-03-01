<?php

declare(strict_types=1);

use RpHaven\Games\Attendee\Member;
use RpHaven\Games\Attendee\Pronouns;
use RpHaven\Games\Branch\Tables;
use RpHaven\Games\Branch\Space\Venue;
use RpHaven\Games\Branch\Space\Venue\Coordinates;
use RpHaven\Games\Game;
use RpHaven\Games\Game\Campaign;
use RpHaven\Games\Game\Party;
use RpHaven\Games\Game\Party\Participant\GamesMaster;
use RpHaven\Games\Game\Party\Participant\Player;
use RpHaven\Games\Game\Session;
use RpHaven\Games\Game\System;
use RpHaven\Games\Session\Duration;
use RpHaven\Games\Session\Status;
use RpHaven\Games\Table;

require_once sprintf('%s/vendor/autoload.php', dirname(__DIR__, 2));

$branch = Tables::create('Stratford');

$space = new Venue(
    'Escape Bar Stratford',
    Coordinates::create('51.540271832375176', '0.003079726521125813'),
);

$oneshotSession = new Session(
    space: $space,
    duration: new Duration(new DateTimeImmutable(), new DateTimeImmutable('+3 hours')),
    status: Status::PENDING_CONFIRMATION,
);

$campaign = Campaign::create($session);

$party = Party::form(new GamesMaster(new Member('Barney Hanlon', Pronouns::create('he/him'))));

$party = $party
    ->add(new Player(Member::create('Lawrence Fishburne', 'he/him')))
    ->add(new Player(Member::create('Janet Jackson', 'She/Her')))
    ->add(new Player(Member::create('Elliot Page', 'He/Him', 'They/Them')));

$game1 = new Game(
    campaign: $campaign,
    system: new System('D&D 5E'),
    party: $party,
);

$table = Table::create('One shot table');
$table = $table->add($game1);



$branch = $branch->add($table);

foreach ($branch->tables() as $table) {
    foreach ($table->games() as $game) {
        //var_dump($game->firstSession());
    }
}


