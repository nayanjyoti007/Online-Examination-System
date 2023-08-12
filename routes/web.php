<?php

use App\Http\Controllers\Admin\Exam\ExamController;
use App\Http\Controllers\Admin\Question\QuestionController;
use App\Http\Controllers\Admin\QuestionAnswer\QuestionAnswerController;
use App\Http\Controllers\Admin\Student\StudentController;
use App\Http\Controllers\Admin\Subject\SubjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Student\Exam\ExamController as ExamExamController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register-submit', [AuthController::class, 'registerSubmit'])->name('register.submit');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-submit', [AuthController::class, 'loginSubmit'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['checkAdmin']], function () {
    Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::get('/admin/subject', [SubjectController::class, 'list'])->name('admin.subject');
    Route::post('/admin/add-subject',[SubjectController::class,'addSubject'])->name('admin.addSubject');
    Route::post('/admin/edit-subject',[SubjectController::class,'editSubject'])->name('admin.editSubject');
    Route::post('/admin/delete-subject',[SubjectController::class,'deleteSubject'])->name('admin.deleteSubject');

    Route::get('/admin/exam', [ExamController::class, 'list'])->name('admin.exam');
    Route::post('/admin/add-exam',[ExamController::class,'addExam'])->name('admin.addExam');
    Route::get('/admin/get-exam-details/{id}',[ExamController::class,'examDetails'])->name('admin.getDetails');
    Route::post('/admin/update-exam',[ExamController::class,'examUpdate'])->name('admin.updateexam');
    Route::post('/admin/delete-exam',[ExamController::class,'deleteExam'])->name('admin.deleteExam');


    Route::get('/admin/question-answer', [QuestionAnswerController::class, 'list'])->name('admin.questionanswer');
    Route::post('/admin/question-answer-submit', [QuestionAnswerController::class, 'addQnA'])->name('admin.addQnA');
    Route::get('/admin/question-answer-details', [QuestionAnswerController::class, 'QnADetails'])->name('admin.QnADetails');
    Route::get('/admin/answer-delete', [QuestionAnswerController::class, 'ansDelete'])->name('admin.ansDelete');
    Route::post('/admin/update-qna', [QuestionAnswerController::class, 'updateQna'])->name('admin.updateQna');
    Route::post('/admin/delete-qna', [QuestionAnswerController::class, 'deleteQna'])->name('admin.deleteQna');
    Route::post('/admin/import-qna', [QuestionAnswerController::class, 'importQna'])->name('admin.importQna');


    Route::get('/admin/student',[StudentController::class,'index'])->name('admin.student');
    Route::post('/admin/add-student',[StudentController::class,'addStudent'])->name('admin.addStudent');
    Route::post('/admin/edit-student',[StudentController::class,'editStudent'])->name('admin.editStudent');
    Route::post('/admin/delete-student',[StudentController::class,'deletestudent'])->name('admin.deleteStudent');


    //Get Question
    Route::get('/admin/get-question',[ExamController::class,'getQuestion'])->name('admin.getQuestion');
    Route::post('/admin/add-question',[ExamController::class,'addQuestion'])->name('admin.addQuestion');
    Route::get('/admin/get-exam-questionn',[ExamController::class,'getExamQuestion'])->name('admin.getExamQuestion');
    Route::get('/admin/delete-exam-questionn',[ExamController::class,'deleteExamQuestion'])->name('admin.deleteExamQuestion');

});


Route::group(['middleware' => ['checkStudent']], function () {
    Route::get('/dashboard', [AuthController::class, 'studentDashboard'])->name('student.dashboard');
    Route::get('/exam/{id}', [ExamExamController::class, 'examDashboard'])->name('student.examDashboard');
});
