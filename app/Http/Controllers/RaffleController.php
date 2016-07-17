<?php

namespace App\Http\Controllers;

use App\Http\Requests\RaffleCreateRequest;
use App\Repositories\RaffleRepository;
use App\Services\UploadsManager;

class RaffleController extends Controller
{


    protected $raffleRepo;

    protected $manager;

    public function __construct(RaffleRepository $raffleRepo, UploadsManager $manager)
    {
        $this->raffleRepo = $raffleRepo;
        $this->manager = $manager;
    }

    /**
     * show the form for the raffle
     *
     * @return Response
     */
    public function create()
    {
        return view('raffle.create');
    }

    /**
     * store a new raffle
     *
     * @return Response
     */
    public function store(RaffleCreateRequest $request)
    {
        $raffle = $this->raffleRepo->create($request->except('_token'));

        $this->manager->uploadImage($request->file('image'));

        return redirect(route('question.create'));
    }

}
