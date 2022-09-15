<?php

namespace App\Http\Controllers\User;

use App\Enum\FamilyRelation;
use App\Filters\SearchByDates;
use App\Filters\SearchByName;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePersonRequest;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;

class PeopleController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Person::class, 'person');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Auth::user()->people()->select([
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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonRequest $request)
    {
        $person = Auth::user()
            ->people()
            ->save(new Person($request->validated()),
                [
                    'relation_type' => FamilyRelation::from($request->input('relation'))
                ]);

        if ($request->has('photo')) {
            $person->photo = $request->file('photo')->storePublicly('images', 'public');
            $person->save();
            $person->append('photo_url');
        }
        return $person->fresh();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Person $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        $person->append('photo_url');
        return $person;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Person $person
     * @return \Illuminate\Http\Response
     */
    public function update(StorePersonRequest $request, Person $person)
    {
        if ($request->has('photo')) {
            $person->photo = $request->file('photo')->storePublicly('images', 'public');
            $person->save();
            $person->append('photo_url');
        }

        $person->update($request->validated(), [
            'relation_type' => FamilyRelation::from($request->input('relation'))
        ]);

        return $person->fresh();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Person $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        return $person->delete();
    }
}
