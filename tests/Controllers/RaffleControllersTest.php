<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;

class RaffleControllersTest extends TestCase {

    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $user = factory(User::class)->create();

        login($user);
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
        $this->press('Publish Raffle Event');
        $this->seeInDatabase('raffles', $raffle->toArray());

        $this->assertTrue(file_exists(public_path('uploads/images/a.jpg')));
    }

}
