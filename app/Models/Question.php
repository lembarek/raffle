<?php

namespace App\Models;

class Question extends Model
{
    protected $fillable = ['description', 'raffle_id', 'type'];

    /**
    * return the layout name for the question
    *
    * @return string
    */
    public function layout()
    {
        return $this->type;
    }
}
