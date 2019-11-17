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

<!-- ==========================
    	BLOG - START
    =========================== -->   
    <section id="blog" class="content-first">
    	<div class="container">
        	<h2 class="scrollpoint sp-effect3">Latest Instagram Posts</h2>
        	<p class="scrollpoint sp-effect3">Check out my latest work posted to Instagram regularly.</p> 
        </div>
            
        <div class="line hidden-xs">
        	<div class="container">
                <div class="row">
                    <div class="col-sm-4"><i class="fa fa-instagram"></i></div>
                    <div class="col-sm-4"><i class="fa fa-instagram"></i></div>
                    <div class="col-sm-4"><i class="fa fa-instagram"></i></div>
                </div>
            </div>
        </div>
		
        <div class="container">
            <div class="row"><!-- MAIN ROW - Start -->
            	<!-- BLOG POST - Start -->
                <div class="col-sm-4 scrollpoint sp-effect1">
                	<div class="blog-post">
                    	<div class="blog-body crop-height bg-image-wedding bg-center-center" id="insta-1">
                    		<!--  <h3>Lorem Ipsum</h3>
                        	<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
                        	<a href="blog.html" class="btn btn-primary">Read More</a>-->
                        </div>
                        <div class="blog-info">
                        	<a><i class="fa fa-heart"></i> <span id="insta-1-likes"></span></a>
                            <a><i class="fa fa-calendar"></i> <span id="insta-1-date"></span></a>
                            <a href="https://www.instagram.com/2createhappiness/"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <!-- BLOG POST - End -->
                
                <!-- BLOG POST - Start -->
                <div class="col-sm-4 scrollpoint sp-effect3">
                	<div class="blog-post">
                    	<div class="blog-body crop-height bg-image-wedding bg-center-center" id="insta-2">
                    		<!-- <h3>Lorem Ipsum</h3>
                        	<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
                        	<a href="blog.html" class="btn btn-primary">Read More</a> -->
                        </div>
                        <div class="blog-info">
                        	<a><i class="fa fa-heart"></i> <span id="insta-2-likes"></span></a>
                            <a><i class="fa fa-calendar"></i> <span id="insta-2-date"></span></a>
                            <a href="https://www.instagram.com/2createhappiness/"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <!-- BLOG POST - End -->
                
                <!-- BLOG POST - Start -->
                <div class="col-sm-4 scrollpoint sp-effect2">
                	<div class="blog-post">
                    	<div class="blog-body crop-height bg-image-wedding bg-center-center" id="insta-3">
                    		<!-- <h3>Lorem Ipsum</h3>
                        	<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
                        	<a href="blog.html" class="btn btn-primary">Read More</a> -->
                        </div>
                        <div class="blog-info">
                        	<a><i class="fa fa-heart"></i> <span id="insta-3-likes"></span></a>
                            <a><i class="fa fa-calendar"></i> <span id="insta-3-date"></span></a>
                            <a href="https://www.instagram.com/2createhappiness/"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <!-- BLOG POST - End -->
                
            </div><!-- MAIN ROW - end -->
            
            <div id="instafeed"></div>
            
        </div><!-- CONTAINER - end -->
    </section>
    <!-- ==========================
    	BLOG - END 
    =========================== --> 