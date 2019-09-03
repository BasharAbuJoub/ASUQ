<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function answers(){
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }

    public function getCorrectAnswerAttribute(){
        return $this->answers()->where('id', $this->correct_answer_id)->first();
    }

}
