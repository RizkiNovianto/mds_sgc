<?php

/**
 * Subclass for representing a row from the 'lomba' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Lomba extends BaseLomba
{
	public function __toString()
    {
		$passText = $this->getNama().' - Tingkat '.$this->getTingkat().' - Kategori '.$this->getKategori();
        return $passText;
    }
}
