<?php

declare(strict_types=1);

namespace blackJack\Test;

use PHPUnit\Framework\TestCase;
use blackJack\Card;
use blackJack\Deck;

require_once(__DIR__ . '/../src/Card.php');

final class CardTest extends TestCase
{
    public function testGetPoint(): void
    {
        $card = new Card();
        // カード2枚の合計
        $this->assertSame(4, $card->getPoint([['スペード', '2'], ['クラブ', '2']]));
        $this->assertSame(9, $card->getPoint([['スペード', '2'], ['クラブ', '7']]));
        $this->assertSame(12, $card->getPoint([['スペード', '7'], ['クラブ', '5']]));
        $this->assertSame(12, $card->getPoint([['スペード', '2'], ['クラブ', 'K']]));
        $this->assertSame(13, $card->getPoint([['スペード', 'A'], ['クラブ', 2]]));
        $this->assertSame(14, $card->getPoint([['ハート', '3'], ['クラブ', 'A']]));
        $this->assertSame(21, $card->getPoint([['スペード', '10'], ['ハート', 'A']]));
        $this->assertSame(12, $card->getPoint([['スペード', 'A'], ['ハート', 'A']]));
        // // カード3枚の合計
        $this->assertSame(9, $card->getPoint([['ハート', '3'], ['クラブ', '3'],['スペード', '3']]));
        $this->assertSame(12, $card->getPoint([['ハート', '3'], ['クラブ', '4'],['スペード', '5']]));
        $this->assertSame(12, $card->getPoint([['ハート', '4'], ['クラブ', 'A'],['スペード', '7']]));
        $this->assertSame(14, $card->getPoint([['ハート', '10'], ['クラブ', 'A'],['スペード', '3']]));
        $this->assertSame(17, $card->getPoint([['ハート', 'K'], ['クラブ', 'A'],['スペード', '6']]));
        $this->assertSame(17, $card->getPoint([['ハート', '2'], ['クラブ', '4'],['スペード', 'A']]));
        $this->assertSame(20, $card->getPoint([['ハート', 'K'], ['クラブ', '4'],['スペード', '6']]));
        $this->assertSame(21, $card->getPoint([['ハート', 'K'], ['クラブ', '4'],['スペード', '7']]));
        $this->assertSame(21, $card->getPoint([['ハート', '3'], ['クラブ', 'A'],['スペード', '7']]));
        $this->assertSame(13, $card->getPoint([['ハート', 'A'], ['クラブ', 'A'],['スペード', 'A']]));
        // カード4枚の合計
        $this->assertSame(9, $card->getPoint([['スペード', '2'], ['スペード', '3'],['クラブ', '2'],['ダイヤ', '2']]));
        $this->assertSame(15, $card->getPoint([['スペード', '2'], ['スペード', '5'],['クラブ', '3'],['ダイヤ', '5']]));
        $this->assertSame(17, $card->getPoint([['スペード', '2'], ['スペード', '2'],['クラブ', '2'],['ダイヤ', 'A']]));
        $this->assertSame(21, $card->getPoint([['スペード', '5'], ['スペード', '5'],['クラブ', 'K'],['ダイヤ', 'A']]));
        $this->assertSame(20, $card->getPoint([['ハート', 'A'], ['クラブ', '2'],['スペード', '3'],['ダイヤ', '4']]));
        $this->assertSame(14, $card->getPoint([['ハート', 'A'], ['クラブ', 'A'],['スペード', 'A'],['ダイヤ', 'A']]));
        // カード5枚の時
        $this->assertSame(15, $card->getPoint([['ハート', 'A'], ['クラブ', 'A'],['スペード', 'A'],['ダイヤ', 'A'], ['ダイヤ', 'A']]));
    }
}
