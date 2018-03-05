<?php

/**
 * Subclass for representing a row from the 'peserta_lomba' table.
 *
 * 
 *
 * @package lib.model
 */ 
class PesertaLomba extends BasePesertaLomba
{
    public function  __toString() {
    return $this->getNamaTim();
  }
}
