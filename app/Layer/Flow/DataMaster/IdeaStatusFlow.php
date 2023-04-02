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

    public function get(): array
    {
        $raw_list_of_idea_status = $this->idea_status_repo->get();

        $list_of_idea_status = [];

        foreach($raw_list_of_idea_status as $status){
            $idea_status = new IdeaStatus($status->status);
            $idea_status->setId($status->id);

            array_push($list_of_idea_status, $idea_status);
        }

        return $list_of_idea_status;
    }

    public function insert(IdeaStatus $ideaStatus) : bool
    {
        $isSuccess = $this->idea_status_repo->insert($ideaStatus);
        return $isSuccess;
    }
}
