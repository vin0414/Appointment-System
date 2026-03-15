<?php
namespace App\Http\Controllers;

use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Scanner extends Controller
{

    private $fileService;
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
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