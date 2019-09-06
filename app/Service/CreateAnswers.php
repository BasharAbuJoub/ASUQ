<?php

namespace App\Service;

use App\Answer;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;

class CreateAnswers{


    public function handle($question_id, $answers, $correctness,array $images){
        $uploader = new ImageUploader();
        for($i = 0; $i < count($answers); $i++){

            $image = null;

            if(Arr::has($images, $i))
                $image = $uploader->upload($images[$i])->getPathname();

            $answer = Answer::create([
                'question_id' => $question_id,
                'body' => $answers[$i],
                'is_correct' => in_array($i, $correctness),
                'image' => $image
            ]);

        }

    }



}
