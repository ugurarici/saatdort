<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    	$tweets = array(
    		array(
    			'status' => 'Saat dört 🕓, 
            yoksun.',
    			'publish_at' => '2017-03-04 16:00:00'
    			),
    		array(
    			'status' => 'Saat beş 🕔, 
            yok.',
    			'publish_at' => '2017-03-04 17:00:00'
    			),
    		array(
    			'status' => 'Altı 🕕',
    			'publish_at' => '2017-03-04 18:00:00'
    			),
    		array(
    			'status' => 'yedi 🕖',
    			'publish_at' => '2017-03-04 19:00:00'
    			),
    		array(
    			'status' => 'ertesi gün 🌄',
    			'publish_at' => '2017-03-05 10:00:00'
    			),
    		array(
    			'status' => 'daha ertesi ⛅️',
    			'publish_at' => '2017-03-06 13:07:00'
    			),
    		array(
    			'status' => 've belki 
             kim bilir...',
    			'publish_at' => '2017-03-06 18:52:00'
    			),
    		array(
    			'status' => 'Nâzım Hikmet’in kaleminden çıkan bu şiirin bir parçasını Zülfü Livaneli’den dinleyebilirsiniz. https://youtu.be/M3tIOTbGGYY 🎵',
    			'publish_at' => '2017-03-06 19:00:00'
    			),
    		array(
    			'status' => 'Belki tamamını okursunuz bile:

ÇANKIRI HAPİSANESİNDEN MEKTUPLAR 
http://siir.gen.tr/siir/n/nazim_hikmet/cankiri_hapisanesinden_mektuplar.htm ✉️',
    			'publish_at' => '2017-03-06 20:00:00'
    			),
    		);

    	$previous_tweet = null;
    	foreach ($tweets as $tweet) {
    		$newTweet = new App\Tweet;
    		$newTweet->status = $tweet['status'];
    		$newTweet->publish_at = $tweet['publish_at'];
    		$newTweet->previous_tweet_id = $previous_tweet;
    		$newTweet->save();
    		$previous_tweet = $newTweet->id;
    	}
    }
}
