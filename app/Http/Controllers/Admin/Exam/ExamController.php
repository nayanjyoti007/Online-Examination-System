<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\QnA_Exam;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function list()
    {
        $subjects = Subject::latest()->get();
        $data = Exam::latest()->get();
        return view('admin.exam.list', compact('subjects', 'data'));
    }


    public function addExam(Request $request)
    {
        try {
            $enterance_id = uniqid('ExamId-');
            $data = new Exam();
            $data->exam_name = $request->exam_name;
            $data->subject_id = $request->subject_id;
            $data->date = $request->exam_date;
            $data->time = $request->exam_time;
            $data->attempt = $request->exam_attempt;
            $data->enterance_id = $enterance_id;
            $data->save();

            return response()->json(['success' => true, 'msg' => 'Exam Add Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function examDetails($id)
    {
        // dd($id);
        try {
            $examdata = Exam::findOrFail($id);
            return response()->json(['success' => true, 'msg' => $examdata]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function examUpdate(Request $request){
        // dd($request->all());
        try {
            $data = Exam::findOrFail($request->exam_id);
            $data->exam_name = $request->exam_name;
            $data->subject_id = $request->subject_id;
            $data->date = $request->exam_date;
            $data->time = $request->exam_time;
            $data->attempt = $request->exam_attempt;
            $data->save();

            return response()->json(['success' => true, 'msg' => 'Exam Update Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function deleteExam(Request $request){
        // dd($request);
        try{
            $data = Exam::findOrFail($request->delete_id);
            $data->delete();

            return response()->json(['success' => true, 'msg' => 'Exam Delete Successfully']);
        }catch(\Exception $e){
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function getQuestion(Request $request){
        // dd($request->all());
        try{
            $questons = Question::latest()->get();
            $data = [];
            $count = 0;
            
            if(count($questons)>0){
                foreach($questons as $queston){
                    $check = QnA_Exam::where('exam_id', $request->exam_id)->where('question_id', $queston->id)->get();
                    if(count($check) == 0){
                        $data[$count]['id'] = $queston->id;
                        $data[$count]['question'] = $queston->question;
                        $count++;
                    }
                }
            }else{
                return response()->json(['success' => false, 'msg' => 'Question Not Found']);
            }

            return response()->json(['success' => true, 'data' => $data]);
        }catch(\Exception $e){
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }


    public function addQuestion(Request $request){
        // dd($request->all());

        try{
            if(isset($request->questions_ids)){
                foreach($request->questions_ids as $questions_id){
                    $insert = new QnA_Exam();
                    $insert->exam_id = $request->exam_id;
                    $insert->question_id = $questions_id;
                    $insert->save();
                }
            }

            return response()->json(['success' => true, 'msg' => 'Question add sccessfully']);
        }catch(\Exception $e){
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function getExamQuestion(Request $request){
        try{
            $data = QnA_Exam::where('exam_id', $request->id)->with('question')->get();
            return response()->json(['success' => true, 'msg' => 'Question Details sccessfully', 'data' => $data]);
        }catch(\Exception $e){
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function deleteExamQuestion(Request $request){
        // dd($request->all());
        try{
            QnA_Exam::where('id', $request->id)->delete();
            return response()->json(['success' => true, 'msg' => 'Question Delete sccessfully']);
        }catch(\Exception $e){
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
