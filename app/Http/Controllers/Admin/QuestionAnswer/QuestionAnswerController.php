<?php

namespace App\Http\Controllers\Admin\QuestionAnswer;

use App\Http\Controllers\Controller;
use App\Imports\Certificate;
use App\Imports\QnaImport;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class QuestionAnswerController extends Controller
{
    public function list()
    {
        $data = Question::with('answers')->get();
        return view('admin.question_answer.list', compact('data'));
    }

    public function addQnA(Request $request)
    {
        // dd($request->all());

        try {
            $question = new Question();
            $question->question = $request->question;
            $question->save();


            foreach ($request->answers as $answerData) {
                $is_correct = 0;

                if ($request->is_correct == $answerData) {
                    $is_correct = 1;
                }

                $answer = new Answer();
                $answer->question_id = $question->id;
                $answer->answer = $answerData;
                $answer->is_correct = $is_correct;
                $answer->save();
            }


            return response()->json(['success' => true, 'msg' => 'Question & Answer Add Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function QnADetails(Request $request)
    {
        $data = Question::where('id', $request->qid)->with('answers')->get();
        return response()->json(['data' => $data]);
    }

    public function ansDelete(Request $request)
    {
        // dd($request->all());

        Answer::where('id', $request->id)->delete();
        return response()->json(['success' => true, 'msg' => 'Answer Deleted Successfully']);
    }

    public function updateQna(Request $request)
    {

        try {

            $question = Question::findOrFail($request->edit_question_id);
            $question->question = $request->edit_question;
            $question->save();

            if (isset($request->answers)) {

                foreach ($request->answers as $key => $value) {
                    $is_correct = 0;

                    if ($request->edit_is_correct == $value) {
                        $is_correct = 1;
                    }

                    $old_answer = Answer::find($key);
                    $old_answer->question_id = $request->edit_question_id;
                    $old_answer->answer = $value;
                    $old_answer->is_correct = $is_correct;
                    $old_answer->save();
                }
            }


            if (isset($request->new_answers)) {

                foreach ($request->new_answers as $key => $value) {
                    $is_correct = 0;

                    if ($request->edit_is_correct == $value) {
                        $is_correct = 1;
                    }

                    $new_answer = new Answer();
                    $new_answer->question_id = $request->edit_question_id;
                    $new_answer->answer = $value;
                    $new_answer->is_correct = $is_correct;
                    $new_answer->save();
                }
            }

            return response()->json(['success' => true, 'msg' => 'Question & Answer Update Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function deleteQna(Request $request){
    
        Question::find($request->delete_id)->delete();
        Answer::where('question_id', $request->delete_id)->delete();
        return response()->json(['success' => true, 'msg' => 'Q&A Deleted Successfully']);
    }

    public function importQna(Request $request){

        // dd($request->all());
        try {
            Excel::import(new Certificate, $request->file('file'));
            // Excel::import(new QnaImport, $request->file('file'));
            return response()->json(['success' => true, 'msg' => 'Import QnA Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
