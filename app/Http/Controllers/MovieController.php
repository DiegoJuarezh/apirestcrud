<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // GET
    {
        // echo "HOLA";
        $movies = Movie::get();
        return $movies;
        // dd( $movies );
        // echo \json_encode($movies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // POST
    {
        // echo "hello from store";
        // print_r( $request->all() );
        // dd( $request->all() );

        $movie = new Movie();
        $movie->name = $request->input('name');
        $movie->description = $request->input('description');
        $movie->year = $request->input('year');
        $movie->genre = $request->input('genre');
        $movie->duration = $request->input('duration');
        $movie->save();
        // echo \json_encode($movie);
        return $movie;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $movie_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $movie_id) // PUT
    {
        // echo "hello from update";
        $movie = Movie::find($movie_id);
        $movie->name = $request->input('name');
        $movie->description = $request->input('description');
        $movie->year = $request->input('year');
        $movie->genre = $request->input('genre');
        $movie->duration = $request->input('duration');
        $movie->save();
        // echo \json_encode($movie);
        return $movie;
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  $movie_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($movie_id)  // DELETE
    {
        // echo "hello from destroy";
        $movie = Movie::find($movie_id);
        $movie->delete();
        // echo \json_encode($movie);
        return $movie;
    }
}
