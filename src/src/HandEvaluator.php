<?php

namespace blackJack;

class HandEvaluator
{
    public function __construct(private array $allPlayersPoint)
    {
    }

    public function getWinner()
    {
        $values = $this->convertToValues();
        $dealerValue = end($values);
        $playersValue = array_slice($values, 0, count($values) - 1);

        foreach ($playersValue as $playerPoint) {
            foreach ($playerPoint as $name => $point) {
                $judgement = $name . 'は引き分けました。' . PHP_EOL;
                if ($point < $dealerValue['ディーラー']) {
                    $judgement = $name . 'が勝ちました!' . PHP_EOL;
                } elseif ($point > $dealerValue['ディーラー']) {
                    $judgement =  $name . 'は負けました。' . PHP_EOL;
                }
                echo $judgement;
            }
        }
        echo 'ブラックジャックを終了します。';
    }

    public function convertToValues()
    {
        foreach ($this->allPlayersPoint as $index => $playerPoint) {
            foreach ($playerPoint as $name => $point) {
                $value = abs($point - 21);
                $playerPoint[$name] = $value;
            }
            $this->allPlayersPoint[$index] = $playerPoint;
        }
        return $this->allPlayersPoint;
    }
}
