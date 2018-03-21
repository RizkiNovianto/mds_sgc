<?php

/**
 * Subclass for representing a row from the 'wilayah' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Wilayah extends BaseWilayah
{
	public function __toString()
    {
		$passText = $this->getWilayah().'</br> - Kecamatan '.$this->getKecamatan().'</br> - Kelurahan '.$this->getKelurahan();
        return $passText;
    }	
}
