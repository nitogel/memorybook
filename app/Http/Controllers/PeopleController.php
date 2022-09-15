<?php

namespace App\Http\Controllers;

use App\Filters\SearchByDates;
use App\Filters\SearchByName;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Person::select([
            'id',
            'first_name',
            'last_name',
            'birth_date',
            'death_date'
        ])
            ->where(function ($query) {
                app(Pipeline::class)
                    ->send($query)
                    ->through([
                        SearchByName::class,
                        SearchByDates::class,
                    ])
                    ->thenReturn();
            })
            ->paginate();
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Person $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        return $person;
    }
}
