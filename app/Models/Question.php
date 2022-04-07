<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;



class Question extends Model
{
    
    protected $fillable = [
        'questions',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'correct_answer',
        'image',
        'slug',
    ];

    
    use HasFactory;

    protected $appends = ['true_percent'];

    public function getTruePercentAttribute(){
        $answer_count = $this->answers()->count();
        $true_answer = $this->answers()->where('answer',$this->correct_answer)->count();

        return round((100/$answer_count) * $true_answer);
    }

    public function answers(){
        return $this->hasMany('App\Models\Answer');
    }
    
    public function my_answer(){
        return $this->hasOne('App\Models\Answer')->where('user_id',auth()->user()->id);
    }
}
