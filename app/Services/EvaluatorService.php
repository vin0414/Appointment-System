<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Ranks;

class EvaluatorService
{
    public function saveRanks($data)
    {
        return Ranks::create([
            'position'=>$data['position'],
            'career_stage'=>$data['career_stage'],
            'coi'=>$data['coi'],
            'coi_competency'=>$data['coi_competency'],
            'ncoi'=>$data['ncoi'],
            'ncoi_competency'=>$data['ncoi_competency'],
            'status'=>1,
            'user_id'=>Auth::id(),
        ]) ? 1 : 0;
    }

    public function editRanks($data)
    {
        $update =  DB::table('ranks')
        ->where('rank_id',$data['rank_id'])
        ->update([
            'position'=>$data['position'],
            'career_stage'=>$data['career_stage'],
            'coi'=>$data['coi'],
            'coi_competency'=>$data['coi_competency'],
            'ncoi'=>$data['ncoi'],
            'ncoi_competency'=>$data['ncoi_competency'],
            'status'=>$data['status'],
        ]);
        if ($update > 0) {
            return 1; // success
        }

        // error handling
        return 'Update failed: either no record found or no changes applied';

    }
}
