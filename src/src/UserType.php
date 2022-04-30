<?php

namespace blackJack;

interface UserType
{
	/**
	 * @return string
	 */
	public function getName();

    /**
     * @return array<int,array<int,int|string>>
     */
    public function drawCards();

    /**
     * @return array<int,int|string>
     */
    public function hitStay();

	// public function appCard();



}
