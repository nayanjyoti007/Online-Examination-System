<?php

namespace App\Imports;

use App\Models\Answer;
use App\Models\SummerVacationCertificate;
use Maatwebsite\Excel\Concerns\ToModel;

class Certificate implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        \Log::info($row);

        if ($row[0] != 'Name') {

            $question = new SummerVacationCertificate();
            $question->name = $row[0];
            $question->father_name = $row[1];
            $question->mother_name = $row[2];
            $question->mobile = $row[3];
            // $question->email = $row[4];
            $question->file = $row[4];
            $question->save();
        }
        // return new Question([

        // ]);
    }
}
