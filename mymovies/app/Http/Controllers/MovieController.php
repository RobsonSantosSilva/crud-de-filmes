<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;



class MovieController extends Controller
{
    public function index(){
        $movies = Movie::all();
        return response()->json($movies);
    }

    public function show($id){
        $movie = Movie::find($id);
        return response()->json($movie);
    }

    public function store(Request $request){
        $movie = new Movie;
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->image = $request->image;
        $movie->save();

        return response()->json(['message' => 'Movie Created!']);
    }

    public function paginating(Request $request){
        return response()->json(Movie::paginate($request->input('per_page')));
    }

    public function update(Request $request, $id){
        $movie = Movie::find($id);
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->image = $request->image;
        $movie->save();

        return response()->json(['message' => 'Movie Updated!']);
    }

    public function destroy($id){
        $movie = Movie::find($id);
        $movie->delete();

        return response()->json(['message' => 'Movie Deleted!']);
    }
}
