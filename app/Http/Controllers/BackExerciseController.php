<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;


class BackExerciseController extends Controller
{
    public function index(Request $request)
    {
        $page = (int) $request->query('page', 1);
        $pageSize = (int) $request->query('page_size', 6);

        $query = DB::table('exercises')
            ->where('type', 1);

        $total = $query->count();

        $exercises = $query
            ->offset(($page - 1) * $pageSize)
            ->limit($pageSize)
            ->get();

        return response()->json([
            'total' => $total,
            'page' => $page,
            'page_size' => $pageSize,
            'results' => $exercises,
        ]);
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

    public function update_exercise(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|integer|exists:exercises,id',
        'name' => 'sometimes|string|max:255'
    ]);

    $dataToUpdate = [];

    if ($request->has('name')) {
        $dataToUpdate['name'] = $validated['name'];
    }

    if (!empty($dataToUpdate)) {
        DB::table('exercises')->where('id', $validated['id'])->update($dataToUpdate);
    }

    return response()->json(['message' => 'Exercise updated successfully']);
}

    public function delete($id)
    {
        DB::table('exercises')->where('id', $id)->delete();
        return response()->json(['message' => 'Exercise deleted successfully']);
    }

}