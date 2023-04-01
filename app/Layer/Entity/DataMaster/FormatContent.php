<?php

namespace App\Layer\Entity\DataMaster;

class ContentFormat{
  private int $id;
  private string $format;

  /**
   * Get the value of format
   */ 
  public function getFormat()
  {
    return $this->format;
  }

  /**
   * Set the value of format
   *
   * @return  self
   */ 
  public function setFormat($format)
  {
    $this->format = $format;

    return $this;
  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }
}

