<?php

declare(strict_types=1);

namespace blackJack\Test;

use PHPUnit\Framework\TestCase;
use blackJack\Deck;

require_once(__DIR__ . '/../src/Deck.php');


final class DeckTest extends TestCase
{
    public function testTrumpCards(): void
    {
        $card = new Deck();
        $this->assertSame([['ハート', 'A'], ['ハート', '2'], ['ハート', '3'], ['ハート', '4'], ['ハート', '5'], ['ハート', '6'], ['ハート', '7'], ['ハート', '8'], ['ハート', '9'], ['ハート', '10'], ['ハート', 'J'], ['ハート', 'Q'], ['ハート', 'K'], ['スペード', 'A'], ['スペード', '2'], ['スペード', '3'], ['スペード', '4'], ['スペード', '5'], ['スペード', '6'], ['スペード', '7'], ['スペード', '8'], ['スペード', '9'], ['スペード', '10'], ['スペード', 'J'], ['スペード', 'Q'], ['スペード', 'K'], ['ダイヤ', 'A'], ['ダイヤ', '2'], ['ダイヤ', '3'], ['ダイヤ', '4'], ['ダイヤ', '5'], ['ダイヤ', '6'], ['ダイヤ', '7'], ['ダイヤ', '8'], ['ダイヤ', '9'], ['ダイヤ', '10'], ['ダイヤ', 'J'], ['ダイヤ', 'Q'], ['ダイヤ', 'K'], ['クラブ', 'A'], ['クラブ', '2'], ['クラブ', '3'], ['クラブ', '4'], ['クラブ', '5'], ['クラブ', '6'], ['クラブ', '7'], ['クラブ', '8'], ['クラブ', '9'], ['クラブ', '10'], ['クラブ', 'J'], ['クラブ', 'Q'], ['クラブ', 'K']], $card->trumpCards());
    }

    public function testGetTwoCards(): void
    {
        $deck = new Deck();
        $this->assertCount(2, $deck->getTwoCards());
    }

    public function testGetOneCard(): void
    {
        $deck = new Deck();
        $this->assertCount(2, $deck->getOneCard());
    }
}
