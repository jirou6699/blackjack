<?php

declare(strict_types=1);

namespace blackJack\Test;

use PHPUnit\Framework\TestCase;
use blackJack\Player;
use blackJack\Deck;

require_once(__DIR__ . '/../src/Player.php');

final class PlayerTest extends TestCase
{
    public function testGetFirstHand(): void
    {
        $deck = new Deck();
        $trumpCards = $deck->trumpCards();
        $player = new Player($trumpCards);
        $this->assertCount(2, $player->getFirstHand());
    }

    public function testAddCard(): void
    {
        $deck = new Deck();
        $trumpCards = $deck->trumpCards();
        $player = new Player($trumpCards);
        $this->assertCount(2, $player->addCard());
    }

    public function testGetHand(): void
    {
        $deck = new Deck();
        $trumpCards = $deck->trumpCards();
        $player = new Player($trumpCards);
        $this->assertSame([['ハート', '3'], ['クラブ', '10'], ['スペード', 'J']], $player->getHand([['ハート', '3'], ['クラブ', '10']], ['スペード', 'J']));
        $this->assertSame([['クラブ', 'A'], ['クラブ', '10'], ['スペード', 'Q']], $player->getHand([['クラブ', 'A'], ['クラブ', '10']], ['スペード', 'Q']));
    }

    public function testGetName(): void
    {
        $deck = new Deck();
        $trumpCards = $deck->trumpCards();
        $player = new Player($trumpCards);
        $this->assertSame('あなた', $player->getName());
    }
}
