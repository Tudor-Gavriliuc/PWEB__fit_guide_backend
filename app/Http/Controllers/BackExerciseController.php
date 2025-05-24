<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class BackExerciseController extends Controller
{
    public function index()
    {
        $exercises = DB::table('exercises')
            ->where('type', 1)
            ->get();
        return response()->json($exercises);
    }

    public function add_back_exercise(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'videoUrl' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'muscleGroup' => 'required|integer',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('back_exercises', 'public');
        }

        DB::table('exercises')->insert([
            'name' => $request->name,
            'videoURL' => $request->videoUrl,
            'image' => $imagePath,
            'type' => $request->muscleGroup,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Exercise added successfully']);
    }

    public function delete($id)
    {
        DB::table('exercises')->where('id', $id)->delete();
        return response()->json(['message' => 'Exercise deleted successfully']);
    }

}