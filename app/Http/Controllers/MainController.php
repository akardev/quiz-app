<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Result;


class MainController extends Controller
{
    public function dashboard(){
         $quizzes = Quiz::where('status','publish')->where(function($query){
             $query->whereNull('finished_at')->orWhere('finished_at','>',now());
         })->withCount('getQuestions')->paginate(5);
         $myresults = auth()->user()->myresults;
        return view('dashboard',compact('quizzes','myresults'));
    }

    public function quiz($slug){
         $quiz = Quiz::whereSlug($slug)->with('my_result')->first() ?? abort(404,'Quiz bulunamadı');
         
         if($quiz->my_result){
             return view('quiz_result',compact('quiz'));
         }


         return view('quiz',compact('quiz'));
    }

    public function result(Request $request, $slug){
         $quiz = Quiz::with('getQuestions')->whereSlug($slug)->first() ?? abort(404,'Quiz bulunamadı');
         $correct = 0;


        if($quiz->my_result){
           abort(404,"Bu Quiz'e daha önce katıldınız...");
        }


         foreach($quiz->getQuestions as $question){
             Answer::create([
                 'user_id' => auth()->user()->id,
                 'question_id' => $question->id,
                 'answer' => $request->post($question->id)
             ]);

            if($question->correct_answer===$request->post($question->id)){
                $correct+=1;
            }
         }

          $point = round((100 / count($quiz->getQuestions)) * $correct);
          $wrong = count($quiz->getQuestions) - $correct;

         Result::create([
            'user_id' => auth()->user()->id,
            'quiz_id' => $quiz->id,
            'point' => $point,
            'correct' => $correct,
            'wrong' => $wrong
         ]);

         return redirect()->route('quiz.detail',$quiz->slug)->withSuccess("Quiz'i başarıyla bitirdin! Puanın : ".$point);

    }

    public function quiz_detail($slug){
    $quiz = Quiz::whereSlug($slug)->with('my_result','topTen.user')->withCount('getQuestions')->first() ?? abort(404,'Quiz bulunamadı');
    return view('quiz_detail',compact('quiz'));
    }
}
