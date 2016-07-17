<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMultipleQuestionRequest;

class QuestionController extends Controller
{

    public function __construct()
    {
    }

    /**
     * create a new question and attach it with a raffle
     *
     * @return Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * store a Multiple
     *
     * @return Response
     */
    public function storeMultiple(CreateMultipleQuestionRequest $request)
    {
        $this->questionRepo->createMultipleQuestion($request->except('_token'));
        return  back();
    }

}
