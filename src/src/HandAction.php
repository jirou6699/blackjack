<?php

namespace blackJack;

class HandAction
{
    public function __construct(private Action $action)
    {
    }

    public function hitStay($hand, $name)
    {
        return $this->action->hitStay($hand, $name);
    }
}
