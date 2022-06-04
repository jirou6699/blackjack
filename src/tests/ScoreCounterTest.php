<?php

declare(strict_types=1);

namespace blackJack\Test;

use PHPUnit\Framework\TestCase;
use blackJack\ScoreCounter;

require_once(__DIR__ . '/../lib/ScoreCounter.php');

final class ScoreCounterTest extends TestCase
{
    public function testScore(): void
    {
        $card = new ScoreCounter();
        // カード2枚の合計
        $this->assertSame(4, $card->score([['スペード', '2'], ['クラブ', '2']]));
        $this->assertSame(9, $card->score([['スペード', '2'], ['クラブ', '7']]));
        $this->assertSame(12, $card->score([['スペード', '7'], ['クラブ', '5']]));
        $this->assertSame(12, $card->score([['スペード', '2'], ['クラブ', 'K']]));
        $this->assertSame(13, $card->score([['スペード', 'A'], ['クラブ', 2]]));
        $this->assertSame(14, $card->score([['ハート', '3'], ['クラブ', 'A']]));
        $this->assertSame(21, $card->score([['スペード', '10'], ['ハート', 'A']]));
        $this->assertSame(12, $card->score([['スペード', 'A'], ['ハート', 'A']]));
        // // カード3枚の合計
        $this->assertSame(9, $card->score([['ハート', '3'], ['クラブ', '3'], ['スペード', '3']]));
        $this->assertSame(12, $card->score([['ハート', '3'], ['クラブ', '4'], ['スペード', '5']]));
        $this->assertSame(12, $card->score([['ハート', '4'], ['クラブ', 'A'], ['スペード', '7']]));
        $this->assertSame(14, $card->score([['ハート', '10'], ['クラブ', 'A'], ['スペード', '3']]));
        $this->assertSame(17, $card->score([['ハート', 'K'], ['クラブ', 'A'], ['スペード', '6']]));
        $this->assertSame(17, $card->score([['ハート', '2'], ['クラブ', '4'], ['スペード', 'A']]));
        $this->assertSame(20, $card->score([['ハート', 'K'], ['クラブ', '4'], ['スペード', '6']]));
        $this->assertSame(21, $card->score([['ハート', 'K'], ['クラブ', '4'], ['スペード', '7']]));
        $this->assertSame(21, $card->score([['ハート', '3'], ['クラブ', 'A'], ['スペード', '7']]));
        $this->assertSame(13, $card->score([['ハート', 'A'], ['クラブ', 'A'], ['スペード', 'A']]));
        // カード4枚の合計
        $this->assertSame(9, $card->score([['スペード', '2'], ['スペード', '3'], ['クラブ', '2'], ['ダイヤ', '2']]));
        $this->assertSame(15, $card->score([['スペード', '2'], ['スペード', '5'], ['クラブ', '3'], ['ダイヤ', '5']]));
        $this->assertSame(17, $card->score([['スペード', '2'], ['スペード', '2'], ['クラブ', '2'], ['ダイヤ', 'A']]));
        $this->assertSame(21, $card->score([['スペード', '5'], ['スペード', '5'], ['クラブ', 'K'], ['ダイヤ', 'A']]));
        $this->assertSame(20, $card->score([['ハート', 'A'], ['クラブ', '2'], ['スペード', '3'], ['ダイヤ', '4']]));
        $this->assertSame(14, $card->score([['ハート', 'A'], ['クラブ', 'A'], ['スペード', 'A'], ['ダイヤ', 'A']]));
        // カード5枚の時
        $this->assertSame(15, $card->score([['ハート', 'A'], ['クラブ', 'A'], ['スペード', 'A'], ['ダイヤ', 'A'], ['ダイヤ', 'A']]));
    }

    public function testRank(): void
    {
        $card = new ScoreCounter();
        $this->assertSame([2, 2], $card->rank([['スペード', '2'], ['クラブ', '2']]));
        $this->assertSame([3, 4], $card->rank([['スペード', '3'], ['クラブ', '4']]));
        $this->assertSame([5, 6], $card->rank([['スペード', '5'], ['クラブ', '6']]));
        $this->assertSame([7, 8], $card->rank([['スペード', '7'], ['クラブ', '8']]));
        $this->assertSame([9, 10], $card->rank([['スペード', '9'], ['クラブ', '10']]));
        $this->assertSame([10, 10], $card->rank([['スペード', 'J'], ['クラブ', 'Q']]));
        $this->assertSame([10, 11], $card->rank([['スペード', 'K'], ['クラブ', 'A']]));
    }
}
