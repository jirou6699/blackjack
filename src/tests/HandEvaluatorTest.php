<?php

declare(strict_types=1);

namespace blackJack\Test;

use PHPUnit\Framework\TestCase;
use blackJack\HandEvaluator;

require_once(__DIR__ . '/../src/HandEvaluator.php');


final class HandEvaluatorTest extends TestCase
{
    public function testTrumpCards(): void
    {
        $handEvaluator = new HandEvaluator();
        $this->assertSame('あなたの勝ちです!' . PHP_EOL . 'ブラックジャックを終了します。', $handEvaluator->getWinner(22, 24));
        $this->assertSame('あなたの勝ちです!' . PHP_EOL . 'ブラックジャックを終了します。', $handEvaluator->getWinner(21, 23));
        $this->assertSame('あなたの勝ちです!' . PHP_EOL . 'ブラックジャックを終了します。', $handEvaluator->getWinner(20, 25));
        $this->assertSame('あなたの勝ちです!' . PHP_EOL . 'ブラックジャックを終了します。', $handEvaluator->getWinner(19, 25));
        $this->assertSame('ディーラーの勝ちです。' . PHP_EOL . 'ブラックジャックを終了します。', $handEvaluator->getWinner(14, 21));
        $this->assertSame('ディーラーの勝ちです。' . PHP_EOL . 'ブラックジャックを終了します。', $handEvaluator->getWinner(16, 23));
        $this->assertSame('ディーラーの勝ちです。' . PHP_EOL . 'ブラックジャックを終了します。', $handEvaluator->getWinner(17, 24));
        $this->assertSame('引き分けです。' . PHP_EOL . 'ブラックジャックを終了します。', $handEvaluator->getWinner(10, 32));
        $this->assertSame('引き分けです。' . PHP_EOL . 'ブラックジャックを終了します。', $handEvaluator->getWinner(11, 31));
        $this->assertSame('引き分けです。' . PHP_EOL . 'ブラックジャックを終了します。', $handEvaluator->getWinner(19, 23));
    }
}
