<?php

namespace blackJack;

class HandAction
{
    public function __construct(private Action $action)
    {
    }

	/**
	 * @param array<int,array<int,int|string>> $hand
	 * @param string $name
	 * @return void
	 *
	 */
    public function hitStay($hand, $name)
    {
        return $this->action->hitStay($hand, $name);
    }
}
