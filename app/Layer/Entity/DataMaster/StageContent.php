<?php

namespace App\Layer\Entity\DataMaster;

class StageContent{
  private int $id;
  private string $stage;

  /**
   * Get the value of stage
   */ 
  public function getStage()
  {
    return $this->stage;
  }

  /**
   * Set the value of stage
   *
   * @return  self
   */ 
  public function setStage($stage)
  {
    $this->stage = $stage;

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

