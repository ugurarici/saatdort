<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$result = Twitter::getUserTimeline(['screen_name' => 'ugursus', 'count' => 20]);
	dd($result);
    // return view('welcome');
});

// Route::get('loc', function() {
// 	$locs = Twitter::getGeoReverse(['lat' => "40.625081", 'long' => "33.645769"]);
// 	dd($locs);
// 	//	kullanacağımız place_id = 558c610c5dd5ec4a
// });

// Route::get('post', function() {
// 	$post = Twitter::postTweet(['status' => 'Aldırmayın oynuyorum öyle. Hmm?\nnasıl satır atlayacak bu', 'lat' => "40.625081", 'long' => "33.645769", 'place_id' => "558c610c5dd5ec4a", 'display_coordinates' => 'true']);
// 	dd($post);
// });

Route::get('run', function() {
	dd(App\Tweet::sendScheduledTweets());
});

Auth::routes();

Route::get('/home', 'HomeController@index');
