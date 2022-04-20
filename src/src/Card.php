<?php

// namespace blackJack;

// class Card
// {
//     private const SUITS = ['ハート', 'スペード', 'ダイヤ', 'クラブ'];
//     private const CARD_NUMBERS = ['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'];
// 	private const TWO_CARDS = 2;

//     public function __construct(private int $players)
//     {
//     }

//     public function trumpCards(): array
//     {
//         $cards = [];
//         foreach (self::SUITS as $suit) {
//             $perCard = [];
//             foreach (self::CARD_NUMBERS as $number) {
//                 $perCard = [$suit, $number];
//                 $cards[] = $perCard;
//             }
//         }
//         return $cards;
//     }

//     public function getCards(): array
//     {
//         $allCards = $this->trumpCards();
//         $numberOfCards = $this->players * self::TWO_CARDS;
//         $randomCards = array_rand($allCards, $numberOfCards);
//         $getCards = [];
//         foreach ($randomCards as $card){
//             $getCards[] = $allCards[$card];
//         }
//         return $getCards;
//     }

// 	public function getRank(){
// 		$cards = $this->getCards();
// 		$numbers = [];
// 		foreach($cards as $card){
// 			if($card[1] === 'A') {
// 				$card[1] = 1;
// 			} elseif ($card[1] !== 'A' && is_string($card[1])){
// 				$card[1] = 10;
// 			}
// 			$numbers[] = $card[1];
// 		}
// 		return $numbers;
// 	}
// }
