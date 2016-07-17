<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class QuestionControllersTest extends TestCase {
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $user = createUser();
        login($user);
    }

    /**
    * @test
    */
    public function it_create_a_new_multiple_qestion()
    {
        $this->visit(route('question.create'));
        $this->seePageIs(route('question.create'));
        $this->type('question description', 'description');
        $this->type('answer 1', 'answers[1]');
        $this->type('answer 2', 'answers[2]');
        $this->type('answer 3', 'answers[3]');
        $this->type('answer 4', 'answers[4]');
        $this->select('3', 'correct_answer');
        $this->press('next Question');
    }

}
