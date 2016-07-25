<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;


class ParticipeControllerTest extends \TestCase {
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->user = createUser();

        login($this->user);
    }

    /**
    * @test
    */
    public function it_participe_in_a_raffle()
    {
        $raffle = createRaffle();
        $questions = createQuestion([], 3);

        $this->visit(route('participe.index', ['raffle_id' => $raffle->id]));
        $this->seePageIs(route('participe.index', ['raffle_id' => $raffle->id]));
        $this->see(route('participe.show', ['raffle_id' => $raffle->id]));
    }

    /**
    * @test
    */
    public function it_ask_the_first_question()
    {
        $raffle = createRaffle();
        $questions = createQuestion(['type' => 'multiple'], 3);
        $firstQuestion = $questions[0];
        $multiChoices = createMultiChoice(['question_id' => $firstQuestion->id], 4);

        $this->visit(route('participe.show', ['raffle_id' => $raffle->id, 'questiion_id' => $firstQuestion->id]));
        $this->select($multiChoices[0]->answer, 'answer');
        $this->see($firstQuestion->description);
        $this->press('Next Question');

        $this->seeInDatabase('user_answers', [
            'user_id' => $this->user->id,
            'question_id' => $firstQuestion->id,
            'raffle_id' => $raffle->id,
            'answer' => $multiChoices[0]->answer,
        ]);
    }
}
