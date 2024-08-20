<?php

namespace App\Http\Controllers;

use App\Models\Storyline;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StorylineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showSeries(Request $request ) : JsonResponse{

        $title = $request->query('title');
        $series = Storyline::where('type', 1);
        if ($title){
            $series = $series->where('title','like','%'.$title.'%');;
        }
        $series = $series->paginate(10);
        return response()->json($series);
    }
    public function showTopSeries(Request $request ) : JsonResponse{
        $series = Storyline::where('type', 1)->orderBy('rating', 'desc')->take(5)->get();
        return response()->json($series);
    }

    public function showMovies(Request $request ) : JsonResponse{
  
        $title = $request->query('title');
        $movies = Storyline::where('type',0);
 
        if ( $title ){
            $movies = $movies->where('title','like','%'.$title.'%');
        }
        
        $movies = $movies->paginate(10);
        return response()->json($movies);
    }

    public function showTopMovies(Request $request ) : JsonResponse{
        $movies = Storyline::where('type', 0)->orderBy('rating', 'desc')->take(5)->get();
        return response()->json($movies);
    }

    public function showMovieDetail($movie_id) {

   
        $movie = Storyline::where('type', 0)->where('id', $movie_id)->first();
   
        if ( $movie ) {
             return response()->json( ["status" => 1 , "data" =>  $movie]);
        }else{

            return response()->json( ["status" => -1 , "message" =>  "Unable to find that movie"]);
        }
    }

    public function showSerieDetail($serie_id) {
        
         
        $serie = Storyline::where(['type' => 1, 'id' => $serie_id])->with('seasons.episodes')->first();
        
        if ( $serie ) {
             return response()->json( ["status" => 1 , "data" =>  $serie]);
        }else{

            return response()->json( ["status" => -1 , "message" =>  "Unable to find that movie"]);
        }
    }




  
}
