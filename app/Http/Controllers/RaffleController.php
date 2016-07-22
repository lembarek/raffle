<?php

namespace App\Http\Controllers;

use Cache;
use App\Http\Requests\RaffleCreateRequest;
use App\Repositories\RaffleRepository;
use App\Services\UploadManager;

class RaffleController extends Controller
{


    protected $raffleRepo;

    protected $manager;

    public function __construct(RaffleRepository $raffleRepo, UploadManager $manager)
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

        Cache::put('raffle_id', $raffle->id, 60);

        return view('questions.create');
    }

}
