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
        $this->assertSame(12, $card->getTotalPoints([['スペード', '7'], ['クラブ', '5']]));
        $this->assertSame(4, $card->getTotalPoints([['ハート', '3'], ['クラブ', 'A']]));
    }
}
