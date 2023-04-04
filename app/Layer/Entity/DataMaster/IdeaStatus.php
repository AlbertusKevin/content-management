<?php

namespace App\Layer\Entity\DataMaster;

class IdeaStatus{
  public int $id;
  public string $status;

  public function __construct(int $id, string $status)
  {
    $this->id = $id;
    $this->status = $status;
  }
}

