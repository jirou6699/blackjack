<?php

declare(strict_types=1);

namespace blackJack\Test;

use PHPUnit\Framework\TestCase;
use blackJack\Player;

require_once(__DIR__ . '/../src/Player.php');

final class PlayerTest extends TestCase
{
    public function testGetName(): void
    {
        $player = new Player();
        $this->assertSame('あなた', $player->getName());
    }
}
