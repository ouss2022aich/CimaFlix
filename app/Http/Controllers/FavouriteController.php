<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create(Request $request)
    {

        $storylineId = $request->storylineId;
        if ($storylineId) {
            try {

                $storylineExist = Auth::user()->favourites()->where("storyline_id" , $storylineId)->first();
                if ( $storylineExist){
                    return response()->json(['status' => -2, 'message' => "Storyline Already Exists In You Favourites"]);
                }else{
                    Auth::user()->favourites()->attach($storylineId);
                }
                return response()->json(["status" => 1, "message" => "successfully added a storyline to this user"]);
            } catch (QueryException $e) {
                return response()->json(['status' => $e->getCode(), 'message' => $e->getMessage()]);
            }
        } else {
            return response()->json(['status' => -1, 'message' => "storylineId Param is missing"]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showFavouriteMovies()
    {

        $favourites = Auth::user()->favourites()->where('type', 0)->get();
        return response()->json($favourites);
    }


    public function showFavouriteSeries()
    {

        $favourites = Auth::user()->favourites()->where('type', 1)->get();
        return response()->json($favourites);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favourite $favourite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favourite $favourite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
             
        $storylineId = $request->storylineId;
        if ($storylineId) {  
       

                $storylineExist = Auth::user()->favourites()->where("storyline_id" , $storylineId)->first();
                if ( $storylineExist){
                    Auth::user()->favourites()->detach($storylineId);
                    return response()->json(['status'=> 1, 'message'=> 'Storyline Removed From Favourites']);
                }else{
                    return response()->json(['status' => -2, 'message' => "Storyline Not Found In You Favourites"]);
                }

        }else{
          return response()->json(['status' => -1, 'message' => "storylineId Param is missing"]);
        }
         
    }
}
