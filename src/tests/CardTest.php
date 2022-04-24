<?php

declare(strict_types=1);

namespace blackJack\Test;

use PHPUnit\Framework\TestCase;
use blackJack\Card;

require_once(__DIR__ . '/../src/Card.php');

final class CardTest extends TestCase
{
    public function testGetTotalPoints(): void
    {
        $card = new Card();
		// カード2枚の合計
        $this->assertSame(12, $card->getTotalPoints([['スペード', '7'], ['クラブ', '5']]));
        $this->assertSame(4, $card->getTotalPoints([['ハート', '3'], ['クラブ', 'A']]));
		// カード3枚の合計
        $this->assertSame(10, $card->getTotalPoints([['ハート', '3'], ['クラブ', 'A'],['スペード', '6']]));
        $this->assertSame(23, $card->getTotalPoints([['ハート', '10'], ['クラブ', 'K'],['スペード', '3']]));
		// カード4枚の合計
        $this->assertSame(24, $card->getTotalPoints([['ハート', '10'], ['クラブ', 'K'],['スペード', '3'],['ダイヤ', 'A']]));
        $this->assertSame(27, $card->getTotalPoints([['スペード', '4'], ['スペード', 'J'],['クラブ', '3'],['ダイヤ', 'K']]));
    }
}
