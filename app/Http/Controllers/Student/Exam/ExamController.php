<?php

namespace App\Http\Controllers\Student\Exam;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function examDashboard($id){
       $data = Exam::where('enterance_id', $id)->with('getQnaExam')->get();
        if(count($data) >0){

            

        }else{
            dd('Not Found');
        }

    }
}
