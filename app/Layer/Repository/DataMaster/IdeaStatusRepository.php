<?php

namespace App\Layer\Repository\DataMaster;

use Illuminate\Support\Facades\DB;
use App\Layer\Entity\DataMaster\IdeaStatus;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\ErrorHandler\Collecting;

define("IDEA_STATUS_TABLE", "idea_status");

class IdeaStatusRepository
{
    public function get()
    {
        $raw_list_of_idea_status = DB::table("idea_status")
        ->select()
        ->get();
        
        return $raw_list_of_idea_status;
    }

    public function insert(IdeaStatus $ideaStatus) : bool
    {
        $isSuccess = DB::table(IDEA_STATUS_TABLE)->insert([
            'status' => $ideaStatus->getStatus()
        ]);

        return $isSuccess;
    }
}
