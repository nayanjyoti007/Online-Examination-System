<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QnA_Exam extends Model
{
    use HasFactory;

    public function question(){
        return $this->hasMany(Question::class,'id','question_id');
    }
}
