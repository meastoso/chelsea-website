<?php
//returns a big old hunk of JSON from a non-private IG account page.
function scrape_insta($username) {
	$insta_source = file_get_contents('http://instagram.com/'.$username);
	$shards = explode('window._sharedData = ', $insta_source);
	$insta_json = explode(';</script>', $shards[1]);
	$insta_array = json_decode($insta_json[0], TRUE);
	return $insta_array;
}
//Supply a username
$my_account = '2createhappiness';
$results_array = scrape_insta($my_account);

// Create a comma-separated list of the first 12 image source URLs.
$url_list = $results_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'][0]['display_src'];
$url_list .= ',' . $results_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'][0]['date'];
$url_list .= ',' . $results_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'][0]['likes']['count'];
for ($i=1; $i < 3; $i++) {
	$url_list .= ',' . $results_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'][$i]['display_src'];
	$url_list .= ',' . $results_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'][$i]['date'];
	$url_list .= ',' . $results_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'][$i]['likes']['count'];
}

// Print out the list. Use Ajax.get() or something to call this script, then parse it on client: list.split(',').
echo $url_list;
?>