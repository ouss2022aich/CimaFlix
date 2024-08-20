<?php



use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\StorylineController;
use App\Models\Favourite;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [ RegisteredUserController::class , 'store' ]);
Route::post('/login', [ AuthenticatedSessionController::class, 'store' ]  );


Route::middleware('auth:sanctum')->group(function() {
  
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
    // storylines 
    
    Route::group(['prefix'=> '/series'], function() {
        Route::get('/', [StorylineController::class, 'showSeries']);
        Route::get('/top', [StorylineController::class, 'showTopSeries']);
        Route::get('/detail/{serie_id}', [StorylineController::class, 'showSerieDetail']);
    });

    Route::group(['prefix'=> '/movies'], function() {
        Route::get('/', [StorylineController::class, 'showMovies']);
        Route::get('/detail/{movie_id}', [StorylineController::class, 'showMovieDetail']);
        Route::get('/top', [StorylineController::class, 'showTopMovies']);
    });

    Route::group(['prefix' => '/favourites'] , function(){   


        Route::get('/movies' , [ FavouriteController::class, 'showFavouriteMovies' ]);
        Route::get('/series' , [ FavouriteController::class, 'showFavouriteSeries' ]);
        Route::post( '/add', [FavouriteController::class , 'create']);   
        Route::delete( '/remove', [FavouriteController::class , 'destroy']);   
    });

});


