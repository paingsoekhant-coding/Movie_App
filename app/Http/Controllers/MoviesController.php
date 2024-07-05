<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    public function home()
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))

                            ->get("https://api.themoviedb.org/3/movie/popular")

                            ->json()['results'];

                            // dd($popularMovies);

        $genresList = Http::withToken(config('services.tmdb.token'))

                            ->get("https://api.themoviedb.org/3/genre/movie/list")

                            ->json()['genres'];

        $nowPlaying = Http::withToken(config('services.tmdb.token'))

                            ->get("https://api.themoviedb.org/3/movie/now_playing")

                            ->json()['results'];

        $genres = collect($genresList)->mapWithKeys(function($genre){
            return [$genre['id'] => $genre['name']];

        });

        // dump($nowPlaying);


        return view('index', [
            'popularMovies' => $popularMovies,
            'genres' => $genres,
            'nowPlaying' => $nowPlaying,

        ]);
    }


    public function detail($id)
    {
            $details =  Http::withToken(config('services.tmdb.token'))

                                ->get("https://api.themoviedb.org/3/movie/".$id.'?append_to_response=credits,videos,images')

                                ->json();

                                // dump($details);

            return view('detail',[
                'details'=>$details,
            ]);
    }
}
