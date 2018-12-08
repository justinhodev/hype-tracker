<?
  //uses twitterOauth helper page
  require "twitteroauth/autoload.php";

  use Abraham\TwitterOAuth\TwitterOAuth;


  function get_num_of_retweets($shoename){

    //taken from my twitter developer account
    $consumer_key = "7kYIVXiqQPWkodD3h0eAfR6N5";
    $consumer_secret = "Zy7DI7bxCI2F9MfALm25WJFBdnxVrBuu8ffQ8Q1vu8BSM30zkE";
    $access_token = "1066878560520986626-UpkhiR2fAKJ3Vizv3NSvfjDgHGkpT6";
    $access_token_secret = "jMebpbIs2hGWgyK9JpJJao0ZPMWD5TSbfslYsVrRgwz07";

    //create new connection to twitter developer account
    $connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
    $content = $connection->get("account/verify_credentials");

    //return the 10 most popular tweets
    $tweets = $connection->get("search/tweets", ["q" => $shoename, "result_type" => "popular", "lang" => "en", "count" => 10]);

    $num_of_retweets = 0;

    if(isset($tweets->statuses) && is_array($tweets->statuses)) {
      if(count($tweets->statuses)) {
          foreach($tweets->statuses as $tweet) {
              $num_of_retweets += $tweet->retweet_count;
              //echo $tweet->text ."<br>";
              //echo $tweet->retweet_count ."<br>";
          }
      }
    }
    return $num_of_retweets;
  }

?>
