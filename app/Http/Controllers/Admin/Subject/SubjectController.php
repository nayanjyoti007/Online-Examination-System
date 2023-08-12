<?php

namespace App\Http\Controllers\Admin\Subject;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function list(){

        $data = Subject::latest()->get();
        return view('admin.subject.list', compact('data'));
    }

    public function addSubject(Request $request){
        try{
            $data = new Subject();
            $data->subject_name = $request->subject;
            $data->save();

            return response()->json(['success' => true, 'msg' => 'Subject Add Successfully']);
        }catch(\Exception $e){
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }


    public function editSubject(Request $request){
        try{
            $data = Subject::findOrFail($request->id);
            $data->subject_name = $request->subject;
            $data->save();

            return response()->json(['success' => true, 'msg' => 'Subject Update Successfully']);
        }catch(\Exception $e){
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function deleteSubject(Request $request){
        // dd($request);
        try{
            $data = Subject::findOrFail($request->id);
            $data->delete();

            return response()->json(['success' => true, 'msg' => 'Subject Delete Successfully']);
        }catch(\Exception $e){
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

}
