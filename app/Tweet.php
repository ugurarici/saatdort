<?php

namespace App;

use Twitter;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
	protected $fillable = ['status', 'publish_at', 'previous_tweet_id'];

	protected $dates = ['created_at', 'updated_at', 'publish_at'];

	public function parent()
	{
		return $this->belongsTo('App\Tweet', 'previous_tweet_id');
	}

	public static function sendScheduledTweets()
	{
		try{
			$tweets = Tweet::where('is_published', 0)->where('publish_at', '<=', date('Y-m-d H:i:s'))->get();
			foreach ($tweets as $tweet) {
				//	ilgili için içerikleri hazırlayalım
				//	şimdilik konum bilgisi de burada girilsin (veritabanına almak lazım)
				$data = ['lat' => "40.625081", 'long' => "33.645769", 'place_id' => "558c610c5dd5ec4a", 'display_coordinates' => 'true'];
				//	tiviti içine koyalım
				$data['status'] = $tweet->status;
				//	önceki tivit varsa id'sini ekleyelim
				if(!is_null($tweet->parent)) {
					if(!is_null($tweet->parent->published_tweet_id)) $data['in_reply_to_status_id'] = $tweet->parent->published_tweet_id;
				}
				//	tiviti gönderelim
				$publish = Twitter::postTweet($data);
				//	başarılıysa güncelleyelim
				if(isset($publish->id)){
					$tweet->is_published = true;
					$tweet->published_tweet_id = $publish->id;
					$tweet->save();
				}
			}
			return true;
		} catch(Exception $e) {
			return $e->getMessage();
		}
	}
}
