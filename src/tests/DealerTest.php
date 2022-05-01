<?php

// declare(strict_types=1);

// namespace blackJack\Test;

// use PHPUnit\Framework\TestCase;
// use blackJack\Dealer;
// use blackJack\Deck;

// require_once(__DIR__ . '/../src/Dealer.php');

// final class DealerTest extends TestCase
// {
//     public function testDrawCard(): void
//     {
//         $deck = new Deck();
//         $player = new Dealer($deck);
//         $this->assertCount(2, $player->drawCards());
//     }

//     public function testAddCard(): void
//     {
//         $deck = new Deck();
//         $player = new Dealer($deck);
//         $this->assertCount(2, $player->addCard());
//     }

//     public function testGetHand(): void
//     {
//         $deck = new Deck();
//         $player = new Dealer($deck);
//         $this->assertSame([['ハート', '3'], ['クラブ', '10'], ['スペード', 'J']], $player->getHand([['ハート', '3'], ['クラブ', '10']], ['スペード', 'J']));
//         $this->assertSame([['クラブ', 'A'], ['クラブ', '10'], ['スペード', 'Q']], $player->getHand([['クラブ', 'A'], ['クラブ', '10']], ['スペード', 'Q']));
//     }

//     public function testGetName(): void
//     {
//         $deck = new Deck();
//         $player = new Dealer($deck);
//         $this->assertSame('ディーラー', $player->getName());
//     }
// }
