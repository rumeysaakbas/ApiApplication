<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personnels = Personnel::all();
        return $personnels;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'salary' => 'required|integer',
        ]);

        Personnel::create([
            'name' => $request->name,
            'salary' => $request->salary,
        ]);
        return response()->json(['message' => 'kaydedildi']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $personnel = Personnel::findOrFail($id);
        return $personnel;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'salary' => 'required|integer',
        ]);

        $personnel = Personnel::findOrFail($id);

        $personnel->update([
            'name' => $request->name,
            'salary' => $request->salary,
        ]);
        return $personnel;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personnel = Personnel::findOrFail($id);
        $personnel->delete();
        return response()->json(['message' => 'silindi']);
    }
}
