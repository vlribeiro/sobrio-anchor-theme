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

if (!function_exists('nl2p')) {
	/**
	 * Returns string with newline formatting converted into HTML paragraphs.
	 *
	 * @author Michael Tomasello <miketomasello@gmail.com>
	 * @copyright Copyright (c) 2007, Michael Tomasello
	 * @license http://www.opensource.org/licenses/bsd-license.html BSD License
	 * 
	 * @param string $string String to be formatted.
	 * @param boolean $line_breaks When true, single-line line-breaks will be converted to HTML break tags.
	 * @param boolean $xml When true, an XML self-closing tag will be applied to break tags (<br />).
	 * @return string
	 */
	function nl2p($string, $line_breaks = true, $xml = true)
	{
	    // Remove existing HTML formatting to avoid double-wrapping things
	    $string = str_replace(array('<p>', '</p>', '<br>', '<br />'), '', $string);
	 
	    // It is conceivable that people might still want single line-breaks
	    // without breaking into a new paragraph.
	    if ($line_breaks == true)
	        return '<p>'.preg_replace(array("/([\n]{2,})/i", "/([^>])\n([^<])/i"), array("</p>\n<p>", '<br'.($xml == true ? ' /' : '').'>'), trim($string)).'</p>';
	    else 
	        return '<p>'.preg_replace("/([\n]{1,})/i", "</p>\n<p>", trim($string)).'</p>';
	}
}

if (!function_exists('strip_empty_paragraphs')) {
	function strip_empty_paragraphs($string)
	{
		return preg_replace("/<p[^>]*>\s*<\\/p[^>]*>/", '', $string); 
	}
}