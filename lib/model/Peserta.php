<?php

/**
 * Subclass for representing a row from the 'peserta' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Peserta extends BasePeserta
{
	public function __toString()
    {
		$passText = $this->getWilayah().'</br> RT '.$this->getRT().'/RW '.$this->getRW();
        return $passText;
    }
}
