<?php

declare(strict_types=1);

namespace blackJack\Test;

use PHPUnit\Framework\TestCase;
use blackJack\Game;
use blackJack\Deck;
use blackJack\Player;

require_once(__DIR__ . '/../src/Game.php');


final class GameTest extends TestCase
{
    public function testStart(): void
    {
        $deck = new Deck();
        $trumpCards = $deck->trumpCards();
        $player = new Player($trumpCards);
        $game = new Game();
        // Todo　仮で設定、後から修正する
        $this->assertSame(2, $game->start($player));
    }
}
