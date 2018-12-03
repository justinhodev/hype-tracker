<?php

// get number of related comments with the specified sneaker
// @param string sneaker
// @return assoc array [index] [number of mentions]
function get_reddit_mentions($sneaker) {
    $reddit_url = "https://api.pushshift.io/reddit/search/comment/?q=" .$sneaker. "&size=0&aggs=created_utc&after=30d";
    $json = file_get_contents($reddit_url);
    $obj = json_decode($json, true);
    $num_of_mentions = array();
    for ($i = 0; $i < sizeof($obj['aggs']['created_utc']); $i++) {
        array_push($num_of_mentions, $obj['aggs']['created_utc'][$i]['doc_count']);
    }

    return $num_of_mentions;
}

// store results in db later
// function store_reddit_mentions($num_of_mentions) {

// }

// debugging
// print_r(get_reddit_mentions("ultraboost"));
// print_r(get_reddit_mentions("jordans"));

?>