<?php
namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    /**
     * Display a listing of persons.
     */
    public function index()
    {
        $persons = Person::all();
        return response()->json($persons);
    }

    /**
     * Store a new person.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'infix' => 'nullable|string',
            'is_active' => 'required|boolean',
            'comment' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $person = Person::create($request->all());
        return response()->json($person, 201);
    }

    /**
     * Display the specified person.
     */
    public function show(Person $person)
    {
        return response()->json($person);
    }

    /**
     * Update the specified person.
     */
    public function update(Request $request, Person $person)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'infix' => 'nullable|string',
            'is_active' => 'required|boolean',
            'comment' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $person->update($request->all());
        return response()->json($person);
    }

    /**
     * Remove the specified person.
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return response()->json(null, 204);
    }
}