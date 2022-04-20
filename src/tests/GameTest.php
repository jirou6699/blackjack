<?php

declare(strict_types=1);

namespace blackJack\Test;

use PHPUnit\Framework\TestCase;
use blackJack\Game;

require_once(__DIR__ . '/../src/Game.php');


final class GameTest extends TestCase
{
    public function testStart(): void
    {
        $game = new Game(2);
		// Todo　仮で設定、後から修正する
        $this->assertSame(2, $game->start());
    }
}
