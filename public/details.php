<!--php page displays details about a sneaker-->

<?php

    require_once('../private/initialize.php');
    require_once('../private/twitter-app.php');
    no_SSL();

    $sneaker_id = $_GET['id'] ?? '';
    $sneaker_name = $_GET['name'] ?? '';
    @$msg = trim($_GET['message']);

    //retrieve sneaker information from database
    $search = get_sneaker($sneaker_id, $sneaker_name);
    $sneaker = mysqli_fetch_assoc($search);
    mysqli_free_result($search);

    //retrieve ranking for sneaker from database
    $ranking = get_ranking($sneaker_id);
    $shoe_rank = mysqli_fetch_assoc($ranking);
    mysqli_free_result($ranking);

    include(SHARED_PATH . '/public_header.php');
    include(SHARED_PATH . '/public_navigation.php');
?>


<?php
  //update ranking  once per day
  $timeDiff = time() - $shoe_rank['time'];
  //86400 = 1 day
  if($timeDiff >= 86400){
    $retweet_total = get_num_of_retweets($sneaker['sneaker_name']);
    $reddit_data = get_reddit_mentions(urlencode($sneaker['sneaker_name']));

    //serialize key:value pair array so we can store it in database
    $serialized_data = serialize($reddit_data);

    update_ranking($sneaker_id, $retweet_total, $serialized_data);
  }
?>

<div class="container">
    <div class="row my-5 justify-content-start">
        <div class="col-4">
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $sneaker['image'] ).'" class="img-thumbnail border border-dark"/>'; ?>
        </div>
        <div class="col-4">
            <h2 class="text-muted"><?php echo h($sneaker['brand_name']); ?></h2>
            <h1><?php echo h($sneaker['sneaker_name']); ?></h1>
            <p class="mt-3 text-muted">MSRP $<?php echo h($sneaker['price']); ?></p>
        </div>
    </div>
    <div class="row mt-5 ml-2">
        <h3>Hype Trend</h3>
    </div>

    <div>
      <?php

        //show add to watchlist button if user is logged in
        if(is_logged_in() && !is_in_watchlist($sneaker_id)){
          echo "<form action=\"addtowatchlist.php\" method=\"post\">\n";
        	echo "<input type=\"hidden\" name=\"sneaker_id\" value=$sneaker_id>\n";
          echo "<input type=\"hidden\" name=\"sneaker_name\" value=\"" .htmlspecialchars($sneaker_name) ."\">\n";
        	echo "<input type=\"submit\" value=\"Add To Watchlist\">\n";
        	echo "</form>\n";
        } else if (!empty($msg) ) {
        	echo "<p>$msg</p>\n";
        } else if (is_logged_in()) {
        	echo "This sneaker is already in your <a href=\"showwatchlist.php\">watchlist</a>.";
        }
      ?>
    </div>

    <div class="row mt-2 ml-3">
        <h6>Twitter</h6>
    </div>

    <div class="row ml-5">
        <p>Number of retweets in last 7 days: <?php echo $shoe_rank['twitter_retweets'] ?></p>
    </div>

    <div class="row mt-2 ml-3">
        <h6>Reddit</h6>
    </div>

    <div class="row ml-5 mb-5">
        <svg></svg>
        <script src="https://d3js.org/d3.v5.min.js"></script>
        <script>

            var arr = [];

            <?php
                //unserialize array in database
                $data = unserialize($shoe_rank['reddit_mentions']);

                foreach ($data as $day => $score) {
                    echo "parse_data(" .$day. ", " .$score. ");";
                }
            ?>
            draw_chart(arr);

            function parse_data(day, score) {
                arr.push({
                    date: day,
                    value: score
                })
            }

            function draw_chart(data) {
                var svgWidth = 600, svgHeight = 400;
                var margin = { top: 20, right: 20, bottom: 30, left: 50 };
                var width = svgWidth - margin.left - margin.right;
                var height = svgHeight - margin.top - margin.bottom;
                var svg = d3.select('svg')
                    .attr("width", svgWidth)
                    .attr("height", svgHeight);

                var g = svg.append("g")
                    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

                var x = d3.scaleLinear().rangeRound([0, width]);
                var y = d3.scaleLinear().rangeRound([height, 0]);

                var line = d3.line()
                    .x(function(d) { return x(d.date)})
                    .y(function(d) { return y(d.value)});
                x.domain(d3.extent(data, function(d) { return d.date }));
                y.domain(d3.extent(data, function(d) { return d.value }));

                g.append("g")
                    .attr("transform", "translate(0," + height + ")")
                    .call(d3.axisBottom(x))
                    .append("text")
                    .attr("fill", "#000")
                    .attr("x", width/2)
                    .attr("y", 21)
                    .attr("dy", "0.71em")
                    .attr("text-anchor", "center")
                    .text("Last 30 Days")
                    .select(".domain");

                g.append("g")
                    .call(d3.axisLeft(y))
                    .append("text")
                    .attr("fill", "#000")
                    .attr("transform", "rotate(-90)")
                    .attr("y", 6)
                    .attr("dy", "0.71em")
                    .attr("text-anchor", "end")
                    .text("Number of mentions");

                g.append("path")
                    .datum(data)
                    .attr("fill", "none")
                    .attr("stroke", "steelblue")
                    .attr("stroke-linejoin", "round")
                    .attr("stroke-linecap", "round")
                    .attr("stroke-width", 1.5)
                    .attr("d", line);
            }
        </script>
    </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
