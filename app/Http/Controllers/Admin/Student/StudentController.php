<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Str;

class StudentController extends Controller
{
    public function index()
    {
        $data = User::where('is_admin', 0)->latest()->get();
        return view('admin.student.list', compact('data'));
    }

    public function addStudent(Request $request)
    {
        try {
            $password = Str::random(8);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($password);
            $user->save();

            $url = URL::to('/');
            $data['url'] = $url;
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = $password;
            $data['title'] = 'Student Registration';

            Mail::send('student_registration_mail',['data' => $data], function($message) use ($data){
                $message->to($data['email'])->subject($data['title']);
            });

            return response()->json(['success' => true, 'msg' => 'Question & Answer Add Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function editStudent(Request $request){
        // dd($request->all());
        try {
            
            $user = User::findOrFail($request->id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            $url = URL::to('/');
            $data['url'] = $url;
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['title'] = 'Update Student Registration';

            Mail::send('update_student_register_mail',['data' => $data], function($message) use ($data){
                $message->to($data['email'])->subject($data['title']);
            });

            return response()->json(['success' => true, 'msg' => 'Student Updated Add Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function deleteStudent(Request $request){
        // dd($request);
        try{
            $data = User::findOrFail($request->id);
            $data->delete();

            return response()->json(['success' => true, 'msg' => 'Student Delete Successfully']);
        }catch(\Exception $e){
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
