<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;

class RaffleControllersTest extends TestCase {
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
    public function it_show_all_raffles()
    {
        $raffles = createRaffle([], 5);
        $this->visit(route('raffle.index'));
        foreach($raffles as $raffle){
            $this->see($raffle->name);
            $this->see($raffle->img);
            $this->see($raffle->rules);
        }
    }

    /**
    * @test
    */
    public function create_raffle()
    {
        $raffle = makeRaffle();

        $this->visit(route('raffle.create'));
        $this->type($raffle->title, 'title');
        $this->type($raffle->mechanics, 'mechanics');
        $this->type($raffle->rules, 'rules');
        $this->type($raffle->prize, 'prize');
        $this->attach('files/a.jpg', 'image');
        $this->type($raffle->deadline, 'deadline');
        $this->press('Next Step');
        $this->seeInDatabase('raffles', array_merge($raffle->toArray(), ['img' => 'a.jpg']));

        $this->assertTrue(file_exists(public_path('uploads/images/a.jpg')));
    }
}
