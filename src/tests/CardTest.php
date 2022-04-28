<?php

declare(strict_types=1);

namespace blackJack\Test;

use PHPUnit\Framework\TestCase;
use blackJack\Card;

require_once(__DIR__ . '/../src/Card.php');

final class CardTest extends TestCase
{
    public function testGetPoint(): void
    {
        $card = new Card();
        // カード2枚の合計
        $this->assertSame(12, $card->getPoint([['スペード', '7'], ['クラブ', '5']]));
        $this->assertSame(4, $card->getPoint([['ハート', '3'], ['クラブ', 'A']]));
        // カード3枚の合計
        $this->assertSame(10, $card->getPoint([['ハート', '3'], ['クラブ', 'A'],['スペード', '6']]));
        $this->assertSame(23, $card->getPoint([['ハート', '10'], ['クラブ', 'K'],['スペード', '3']]));
        // カード4枚の合計
        $this->assertSame(24, $card->getPoint([['ハート', '10'], ['クラブ', 'K'],['スペード', '3'],['ダイヤ', 'A']]));
        $this->assertSame(27, $card->getPoint([['スペード', '4'], ['スペード', 'J'],['クラブ', '3'],['ダイヤ', 'K']]));
    }
}
