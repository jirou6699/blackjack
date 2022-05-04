<?php

declare(strict_types=1);

namespace blackJack\Test;

use PHPUnit\Framework\TestCase;
use blackJack\HandEvaluator;

require_once(__DIR__ . '/../src/HandEvaluator.php');


final class HandEvaluatorTest extends TestCase
{
    public function testConvertToValues(): void
    {
        // プレーヤー２人
        $handEvaluator = new HandEvaluator([['あなた' => 5], ['ディーラー' => 4]]);
        $this->assertSame([['あなた' => 16], ['ディーラー' => 17]], $handEvaluator->convertToValues());

        $handEvaluator = new HandEvaluator([['あなた' => 6], ['ディーラー' => 8]]);
        $this->assertSame([['あなた' => 15], ['ディーラー' => 13]], $handEvaluator->convertToValues());

        $handEvaluator = new HandEvaluator([['あなた' => 10], ['ディーラー' => 11]]);
        $this->assertSame([['あなた' => 11], ['ディーラー' => 10]], $handEvaluator->convertToValues());

        $handEvaluator = new HandEvaluator([['あなた' => 15], ['ディーラー' => 16]]);
        $this->assertSame([['あなた' => 6], ['ディーラー' => 5]], $handEvaluator->convertToValues());

        $handEvaluator = new HandEvaluator([['あなた' => 20], ['ディーラー' => 14]]);
        $this->assertSame([['あなた' => 1], ['ディーラー' => 7]], $handEvaluator->convertToValues());

        $handEvaluator = new HandEvaluator([['あなた' => 22], ['ディーラー' => 21]]);
        $this->assertSame([['あなた' => 1], ['ディーラー' => 0]], $handEvaluator->convertToValues());

        $handEvaluator = new HandEvaluator([['あなた' => 25], ['ディーラー' => 27]]);
        $this->assertSame([['あなた' => 4], ['ディーラー' => 6]], $handEvaluator->convertToValues());

        // プレーヤー３人
        $handEvaluator = new HandEvaluator([['あなた' => 4], ['ディーラー' => 6], ['さとうさん' => 8]]);
        $this->assertSame([['あなた' => 17], ['ディーラー' => 15], ['さとうさん' => 13]], $handEvaluator->convertToValues());

        $handEvaluator = new HandEvaluator([['あなた' => 5], ['ディーラー' => 8], ['さとうさん' => 10]]);
        $this->assertSame([['あなた' => 16], ['ディーラー' => 13], ['さとうさん' => 11]], $handEvaluator->convertToValues());

        $handEvaluator = new HandEvaluator([['あなた' => 11], ['ディーラー' => 14], ['さとうさん' => 18]]);
        $this->assertSame([['あなた' => 10], ['ディーラー' => 7], ['さとうさん' => 3]], $handEvaluator->convertToValues());

        $handEvaluator = new HandEvaluator([['あなた' => 15], ['ディーラー' => 17], ['さとうさん' => 20]]);
        $this->assertSame([['あなた' => 6], ['ディーラー' => 4], ['さとうさん' => 1]], $handEvaluator->convertToValues());

        $handEvaluator = new HandEvaluator([['あなた' => 21], ['ディーラー' => 22], ['さとうさん' => 23]]);
        $this->assertSame([['あなた' => 0], ['ディーラー' => 1], ['さとうさん' => 2]], $handEvaluator->convertToValues());

        $handEvaluator = new HandEvaluator([['あなた' => 25], ['ディーラー' => 27], ['さとうさん' => 29]]);
        $this->assertSame([['あなた' => 4], ['ディーラー' => 6], ['さとうさん' => 8]], $handEvaluator->convertToValues());

        // プレーヤー4人
        $handEvaluator = new HandEvaluator([['あなた' => 5], ['さとうさん' => 7], ['いとうさん' => 9], ['ディーラー' => 10]]);
        $this->assertSame([['あなた' => 16], ['さとうさん' => 14], ['いとうさん' => 12], ['ディーラー' => 11]], $handEvaluator->convertToValues());

        $handEvaluator = new HandEvaluator([['あなた' => 11], ['さとうさん' => 12], ['いとうさん' => 13], ['ディーラー' => 14]]);
        $this->assertSame([['あなた' => 10], ['さとうさん' => 9], ['いとうさん' => 8], ['ディーラー' => 7]], $handEvaluator->convertToValues());

        $handEvaluator = new HandEvaluator([['あなた' => 15], ['さとうさん' => 17], ['いとうさん' => 19], ['ディーラー' => 21]]);
        $this->assertSame([['あなた' => 6], ['さとうさん' => 4], ['いとうさん' => 2], ['ディーラー' => 0]], $handEvaluator->convertToValues());

        $handEvaluator = new HandEvaluator([['あなた' => 21], ['さとうさん' => 21], ['いとうさん' => 21], ['ディーラー' => 21]]);
        $this->assertSame([['あなた' => 0], ['さとうさん' => 0], ['いとうさん' => 0], ['ディーラー' => 0]], $handEvaluator->convertToValues());

        $handEvaluator = new HandEvaluator([['あなた' => 22], ['さとうさん' => 24], ['いとうさん' => 25], ['ディーラー' => 27]]);
        $this->assertSame([['あなた' => 1], ['さとうさん' => 3], ['いとうさん' => 4], ['ディーラー' => 6]], $handEvaluator->convertToValues());
    }
}
