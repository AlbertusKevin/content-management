<?php

namespace App\Layer\Repository\DataMaster;

use Illuminate\Support\Facades\DB;
use App\Layer\Entity\DataMaster\IdeaStatus;

class IdeaStatusRepository
{
    public function insert(IdeaStatus $ideaStatus) : bool
    {
        $isSuccess = DB::table(IDEA_STATUS_TABLE)->insert([
            'status' => $ideaStatus->getStatus()
        ]);

        return $isSuccess;
    }
}
