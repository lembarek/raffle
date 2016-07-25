<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Raffle extends Model
{
    protected $fillable = ['title', 'mechanics', 'rules', 'prize', 'deadline', 'img'];

    /**
     * return the current unanswered question
     *
     * @return Question
     */
    public function nextQuestion()
    {
        $questions = Question::where('raffle_id', $this->id)->get();
        foreach ($questions as $question) {
            if(! UserAnswer
                ::where('user_id', auth()->user()->id)
                ->where('question_id', $question->id)
                ->where('raffle_id', $this->id)
                ->exists())
            return $question;
        }
        return null;
    }

    /**
     * check if raffle has question left to answer
     *
     * @return boolean
     */
    public function hasNextQuestion()
    {
        $questions = Question::where('raffle_id', $this->id)->get();
        foreach ($questions as $question) {
            if(! UserAnswer
                ::where('user_id', auth()->user()->id)
                ->where('question_id', $question->id)
                ->where('raffle_id', $this->id)
                ->exists())
            return true;
        }
        return false;
    }

    /**
     * return the score of the raffle
     *
     * @return integer
     */
    public function score()
    {
        $s=0;
        $user_answers = UserAnswer
            ::where('raffle_id', $this->id)
            ->where('user_id', auth()->user()->id)
            ->get();
        foreach($user_answers as $user_answer){
            $correct_answer = Question::find($user_answer->question_id)->correctAnswer->answer;
            if($correct_answer ==  $user_answer->answer)
                $s+=1;
        }
        return ($s*100)/count($user_answers);
    }
}
