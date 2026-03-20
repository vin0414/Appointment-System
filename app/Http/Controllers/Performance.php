<?php
namespace App\Http\Controllers;

use App\Services\EvaluatorService;
use App\Services\LogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Performance extends Controller
{
    private $evaluatorService;
    private $logService;
    public function __construct(EvaluatorService $evaluatorService, LogService $logService)
    {
        $this->evaluatorService = $evaluatorService;
        $this->logService = $logService;
    }

    public function saveRank(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'position'=>'required|string|max:255',
            'career_stage'=>'required|string|max:255',
            'coi'=>'required|numeric|min:1',
            'coi_competency'=>'required|string|max:255',
            'ncoi'=>'required|numeric|min:1',
            'ncoi_competency'=>'required|string|max:255'
        ],[
            'position.required'=>'Position is required.',
            'career_stage.required'=>'PPST Career stage is required.',
            'coi.required'=>'COI is required.',
            'coi.numeric'=>'COI must be a number.',
            'coi.min'=>'COI must be at least 1.',
            'coi_competency.required'=>'COI Level is required.',
            'ncoi.required'=>'NCOI is required.',
            'ncoi.numeric'=>'NCOI must be a number.',
            'ncoi.min'=>'NCOI must be at least 1.',
            'ncoi_competency.required'=>'NCOI level is required.',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>403,
                'errors'=>$validator->errors()
            ]);
        }
        else
        {
            //call service to save data
            $result = $this->evaluatorService->saveRanks($validator->validated());
            if($result)
            {
                //log the activity
                $this->logService->saveLogs('User saved teaching rank',$request->ip(),$request->header('User-Agent'));
                return response()->json([
                    'status'=>200,
                    'message'=>'Teaching rank successfully saved'
                ]);
            }
            return response()->json([
                'status'=>403,
                'message'=>'Failed to saved the teaching rank',
                'error'   => $result['error'] ?? 'Unknown error'
            ]);
        }
    }

    public function updateRank(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'rank_id'=>'required|numeric',
            'position'=>'required|string|max:255',
            'career_stage'=>'required|string|max:255',
            'coi'=>'required|numeric|min:1',
            'coi_competency'=>'required|string|max:255',
            'ncoi'=>'required|numeric|min:1',
            'ncoi_competency'=>'required|string|max:255',
            'status'=>'required|numeric|in:0,1'
        ],[
            'position.required'=>'Position is required.',
            'career_stage.required'=>'PPST Career stage is required.',
            'coi.required'=>'COI is required.',
            'coi.numeric'=>'COI must be a number.',
            'coi.min'=>'COI must be at least 1.',
            'coi_competency.required'=>'COI Level is required.',
            'ncoi.required'=>'NCOI is required.',
            'ncoi.numeric'=>'NCOI must be a number.',
            'ncoi.min'=>'NCOI must be at least 1.',
            'ncoi_competency.required'=>'NCOI level is required.',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>403,
                'errors'=>$validator->errors()
            ]);
        }
        else
        {
            //call service to save data
            $result = $this->evaluatorService->editRanks($validator->validated());
            if($result)
            {
                //log the activity
                $this->logService->saveLogs('User update teaching rank',$request->ip(),$request->header('User-Agent'));
                return response()->json([
                    'status'=>200,
                    'message'=>'Successfully applied changes with the position of '.$validator->validated()['position']
                ]);
            }
            return response()->json([
                'status'=>403,
                'message'=>'Failed to saved the teaching rank',
                'error'   => $result['error'] ?? 'Unknown error'
            ]);
        }
    }

    //upload pdf file
    public function uploadFile(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'file' => 'required|mimes:pdf|max:20480',//20MB
            'employee'=>'required|string|max:255',
            'from_position'=>'required|string|max:255',
            'to_position'=>'required|string|max:255',
            'office'=>'required|string|max:255',
            'school_year'=>'required|string|max:255',
            'rater'=>'required|string|max:255',
            'review_date'=>'required|date',
        ]);

        if($validator->fails())
        {

        }
        else
        {

        }
    }
}