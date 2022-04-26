<?php

namespace blackJack;

class HandEvaluator
{
    /**
     * @param int $playerPoint, $dealerPoint
     * @return string
     */
    public static function getWinner(int $playerPoint, int $dealerPoint)
    {
        $values = [];
        foreach ([$playerPoint, $dealerPoint] as $point) {
            $values[] = abs($point - 21);
        }

        $winner = '引き分けです。';

        if ($values[0] < $values[1]) {
            $winner = 'あなたの勝ちです!';
        } elseif ($values[0] > $values[1]) {
            $winner =  'ディーラーの勝ちです。';
        }
        return $winner;
    }
}
