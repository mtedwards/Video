  <div class="entry">
  	  <div class="video-object">
  	    <iframe width="652" height="366" src="" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
  	  </div>
  	  <div class="row">
  	  	<?php $videos = get_field('videos');
    		if($videos){ ?>
    			<?php include ('VideoData.php');  ?>
    			<ul class="three-up block-grid videos">
    				<?php foreach($videos as $video_detail){
  						$url = $video_detail['url'];
  						$pos = strpos($url, 'you');
  						if ($pos === false) {
  						    //Vimeo
  						    $sec_check = strpos($url, 'https');
  						    if ($sec_check === false) {
  						    	$imgid =  str_replace("http://vimeo.com/","",$url);
  						    } else {
  							    $imgid =  str_replace("https://vimeo.com/","",$url);
  						    }
  							
  							$video = new VideoData($imgid);
  							$image = $video->getVideoProperty('thumbnail_medium');
  							$video_url = 'http://player.vimeo.com/video/' .  $imgid;
  						} else {
  							//YouTube
  							$url =  str_replace("http://youtu.be/","",$url);
  							$image = 'http://img.youtube.com/vi/' . $url . '/0.jpg';
  							$video_url = 'http://www.youtube.com/embed/' . $url;
  						}
  					?>
  			      <li>
  			      	<a href="#" data-vid="<?php echo $video_url; ?>">
  			      		<img src="<?php echo $image; ?>"></img>
  				  		<p>
  				  			<?php echo $video_detail['title']; ?>
  				  		</p>
  				  	</a>
  			      </li>
  			     <?php } // end foreach ?>
  			</ul>							
  			<?php } else { ?>
  				<h3>Oops. Doesn't look like we have any videos</h3>
  			<?php } //end if ?>
  			<?php the_content(); ?>
  	  </div><?php //end row ?>
  </div><?php //end entry ?>

