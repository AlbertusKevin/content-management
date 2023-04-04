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
            $idea_status = new IdeaStatus($status->id, $status->status);
            array_push($list_of_idea_status, $idea_status);
        }

        return $list_of_idea_status;
    }

    public function find(int $idea_status_ID)
    {
        $raw_idea_status = $this->idea_status_repo->find($idea_status_ID);

        if (!is_null($raw_idea_status)){
            $idea_status = new IdeaStatus($raw_idea_status->id, $raw_idea_status->status);
        }else {
            $idea_status = null;
            echo "nil";
        }

        return $idea_status;
    }

    public function insert(IdeaStatus $idea_status) : bool
    {
        $isSuccess = $this->idea_status_repo->insert($idea_status);
        return $isSuccess;
    }

    public function update(IdeaStatus $idea_status) : bool
    {
        $isSuccess = $this->idea_status_repo->update($idea_status);
        return $isSuccess;
    }

    public function delete(int $idea_status_ID) : bool
    {
        $isSuccess = $this->idea_status_repo->delete($idea_status_ID);
        return $isSuccess;
    }
}
