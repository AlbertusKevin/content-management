<?php

namespace App\Layer\Flow\DataMaster;

use App\Layer\Entity\DataMaster\IdeaStatus;
use App\Layer\Repository\DataMaster\IdeaStatusRepository;

class IdeaStatusFlow
{
    private $idea_status_repo;

    public function __construct()
    {
        $this->idea_status_repo = new IdeaStatusRepository();
    }

    public function insert(IdeaStatus $ideaStatus) : bool
    {
        $isSuccess = $this->idea_status_repo->insert($ideaStatus);
        return $isSuccess;
    }
}
