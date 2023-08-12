<?php

namespace App\Imports;

use App\Models\Answer;
use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;

class QnaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // \Log::info($row);

        if ($row[0] != 'question') {

            $question = new Question();
            $question->question = $row[0];
            $question->save();

            for ($i = 1; $i < count($row) - 1; $i++) {
                if ($row[$i] != null) {
                    $is_correct = 0;
                    if ($row[7] == $row[$i]) {
                        $is_correct = 1;
                    }
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer = $row[$i];
                    $answer->is_correct = $is_correct;
                    $answer->save();
                }
            }
        }
        // return new Question([

        // ]);
    }
}
