<?php

namespace blackJack;

interface Action
{
	/**
	 * @param array<int,array<int,int|string>> $hand
	 * @param string $name

	 */
    public function hitStay($hand, $name);
}
