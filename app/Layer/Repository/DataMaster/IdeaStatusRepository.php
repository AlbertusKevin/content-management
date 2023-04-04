<?php

namespace App\Layer\Repository\DataMaster;

use Illuminate\Support\Facades\DB;
use App\Layer\Entity\DataMaster\IdeaStatus;

define("IDEA_STATUS_TABLE", "idea_status");

class IdeaStatusRepository
{
    public function get()
    {
        $raw_list_of_idea_status = DB::table(IDEA_STATUS_TABLE)
        ->select()
        ->get();
        
        return $raw_list_of_idea_status;
    }

    public function find(int $idea_status_ID)
    {
        $raw_idea_status = DB::table(IDEA_STATUS_TABLE)
            ->where('id', $idea_status_ID)
            ->first();
        
        return $raw_idea_status;
    }

    public function insert(IdeaStatus $idea_status) : bool
    {
        $isSuccess = DB::table(IDEA_STATUS_TABLE)->insert([
            'status' => $idea_status->status
        ]);

        return $isSuccess;
    }

    public function update(IdeaStatus $idea_status) : bool
    {
        $isSuccess = DB::table(IDEA_STATUS_TABLE)
            ->where('id', $idea_status->id)
            ->update([
                'status' => $idea_status->status
            ]);

        return $isSuccess;
    }

    public function delete(int $idea_status_ID) : bool
    {
        $isSuccess = DB::table(IDEA_STATUS_TABLE)
            ->where('id', $idea_status_ID)
            ->delete();

        return $isSuccess;
    }
}
