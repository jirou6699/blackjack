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
        // プレーヤーとディーラーの２名でゲーム
        $game = new Game(2);
        $this->assertSame(2, $game->start());
    }
}
