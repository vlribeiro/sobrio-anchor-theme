<?php

require("vendor/Inflector.php");

if(!function_exists('relative_time')){
	function pluralise($amount, $str) {
		return intval($amount) === 1 ? $str : Inflector::pluralize($str);
	}
}

if(!function_exists('relative_time')){
	function relative_time($date) {
		if(is_numeric($date)) $date = '@' . $date;

		$user_timezone = new DateTimeZone(Config::app('timezone'));
		$date = new DateTime($date, $user_timezone);

		// get current date in user timezone
		$now = new DateTime('now', $user_timezone);

		$elapsed = $now->format('U') - $date->format('U');

		if($elapsed <= 1) {
			return 'Agora há pouco';
		}

		$times = array(
			31104000 => 'ano',
			2592000 => 'mês',
			604800 => 'semana',
			86400 => 'dia',
			3600 => 'hora',
			60 => 'minuto',
			1 => 'segundo'
		);

		foreach($times as $seconds => $title) {
			$rounded = $elapsed / $seconds;

			if($rounded > 1) {
				$rounded = round($rounded);
				return $rounded . ' ' . pluralise($rounded, $title);
			}
		}
	}
}

if(!function_exists('word_count')){
	function word_count($content) {
		return str_word_count(strip_tags($content));
	}
}

if(!function_exists('estimated_reading_time')){
	function estimated_reading_time($content) {
		$word_count = word_count($content);
		$avg_wpm = 175;

		$m = floor($word_count / $avg_wpm);
		$s = floor($word_count % $avg_wpm / ($avg_wpm / 60));
		
		if ($m >= 1) {
			return $m . ' ' . pluralise($m, 'minuto');
		}
		elseif ($s <= 59) {
			return $s . ' ' . pluralise($s, 'segundo');
		}
	}
}

if(!function_exists('twitter_account')){
	function twitter_account() {
		return site_meta('twitter', 'vlribeiro');
	}
}

if(!function_exists('twitter_url')){
	function twitter_url() {
		return 'https://twitter.com/' . twitter_account();
	}
}
