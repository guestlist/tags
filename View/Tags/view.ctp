<?php
	echo $this->Html->script('http://0.static.newspaper.guestlistmedia.net/js/lib/jquery-1.10.1.min.js', array('inline' => false));
	echo $this->Html->script('newhome/menu_effect', array('inline' => false));
	echo $this->Html->script('newhome/slide-effect', array('inline' => false));
	echo $this->Html->script('newhome/twitter', array('inline' => false));

	echo $this->Html->css('owl_carousel/owl.carousel', array('inline' => false));
	echo $this->Html->css('owl_carousel/owl.theme', array('inline' => false));
	echo $this->Html->css('owl_carousel/owl.transitions', array('inline' => false));
?>
<script type="text/javascript">
	$( document ).ready(function() {
		 $('html, body').animate({
			scrollTop: $(".musicMenu").offset().top + 100
		}, 500);
	});
</script>
<div id="player">
</div>
	<!-- EVENTS
	<div class="account-container">
		<?php //echo $this->element('new_design/event_app',array('events' => $events )); ?>
	</div>
	-->
	<!--
	<div class="event-container">
		<div class="event-header">
			<h2><a href="/events">UPCOMING EVENTS</a></a></h2>
			<h2><a href="/events">SEE ALL EVENTS</a></h2>
		</div>
		<?php $x=0; ?>
		<?php
		if($x!=0){
		}
		else{
		}
		?>
		<?php foreach($events as $event):?>
		<a href="/london/clubs/<?php echo $event['Venue']['slug']?>/event/<?php echo $event['Event']['id']?>/<?php echo $event['Event']['slug']?>">
				<?php
		if($x!=3){?>
			<div class="event-thumb event-thumb-margin">
		<?php }
		else{ ?>
			<div class="event-thumb">
		<?php } ?>
				<div class="img-background">
					<img src="<?php echo $this->Pic->getEventImagePath($event['Event']['id'], $event['Event']['created'], 'medium'); ?>" alt="read news" width="367" />
					<div class="event-hover">
						<h3>MORE</h3>
					</div>
				</div>
				<div class="event-text">
					<h3><?php echo $event['Event']['name']?></h3>
					<p><?php echo $event['Venue']['name']?></p>
				</div>
			</div>
		</a>
		<?php $x++;
		endforeach; ?>
	</div>
	-->
	<!-- EVENTS END -->
	<!-- GENRES -->
	<div class="container article-container">
		<div id="owl-demo" class="owl-carousel owl-theme">
		  <div class="item"><a href="/house/"><span>house</span></a></div>
		  <div class="item"><a href="/rnb-hiphop/"><span>hip-hop &amp; rnb</span></a></div>
		  <div class="item"><a href="/drum-bass/"><span>drum &amp; bass</span></a></div>
		  <div class="item"><a href="/indie/"><span>indie</span></a></div>
		  <div class="item"><a href="/reggae/"><span>reggae</span></a></div>
		  <div class="item"><a href="/other/"><span>the other side</span></a></div>
		</div>
		
		
		<div class="row content"><!-- hidden-xs commented out, why was it in there?? -->

			<div class="musicMenu musicHome">
			  <nav>
				<ul class="musicHomeBlocks">
				  <li><a href="/house/"><span data-hover="house">house</span></a></li>
				  <li><a href="/rnb-hiphop/"><span data-hover="hiphop &amp; rnb">hip-hop &amp; rnb</span></a></li>
				  <li><a href="/drum-bass/"><span data-hover="drum &amp; bass">drum &amp; bass</span></a></li>
				  <li><a href="/indie/"><span data-hover="indie">indie</span></a></li>
				  <li><a href="/reggae/"><span data-hover="reggae">reggae</span></a></li>
				 <li><a href="/other/"><span data-hover="the other side">the<br>other<br>side</span></a></li>
				</ul>
			  </nav>
			</div>
			<!-- GENRES END-->
		</div>
	</div> <!-- END OF CONTAINER -->
	
	<div class="container">
	
            
		<!-- NEWS -->
		<h1 style="color: #FFF; margin-bottom: 15px;"><?php echo $tag['Tag']['name']; ?></h1>
		<div class="row content news-container">
			<!-- NEWS LEFTSIDE -->
			<div class="col-md-8 col-sm-12 news-leftside">
				<div class="row">
					<div class="news-menu col-md-12">
					</div>
					<div class="loading-section">
						<div class="loading"></div>
					</div>
					<?php if(!empty($articles)){ ?>
					<div id="articles" class="news-mainsection genresection">
						<!-- MAINSECTION 1 -->
						<?php echo $this->element('new_design/articles/indexBox',array('articles'=>$articles)); ?>
						
					</div>
					<?php } ?>
					<?php if(!empty($videos)){ ?>
					<div class="genre-videos col-md-12">
						<?php echo $this->element('eventsTagBox'); ?>
					</div>
					<?php } ?>
				</div> <!-- end row -->
			</div>
			<!-- NEWS LEFTSIDE END -->
			<!-- NEWS RIGHTSIDE -->
			<div class="col-md-4 col-sm-12 news-menu-right genre-menu-right">
			<?php
			if(!empty($tvs)) {
				//echo $this->element('new_design/videos/tag_view');
				echo $this->element('tvs/tvBox');
			}
			?>
			<?php if(!empty($competitions)){
				echo $this->element('competitionsTagBox');
			} ?>
			</div>
		</div>
	</div>
<?php echo $this->Html->script('owl_carousel/owl.carousel.min', array('block' => 'scriptBottom')); ?>
<script type="text/javascript">
/* HOVER EFFECT VIDEOS GENRE PAGE */
	$('.playButton').css('display', 'none');
	
	$('.genrevids li:nth-child(1)').mouseenter(function() {
		$('.genrevids li:nth-child(1) .playButton').css('display', 'block');
	});
	$('.genrevids li:nth-child(1)').mouseleave(function() {
		$('.genrevids li:nth-child(1) .playButton').css('display', 'none');
	});
	
	$('.genrevids li:nth-child(2)').mouseenter(function() {
		$('.genrevids li:nth-child(2) .playButton').css('display', 'block');
	});
	$('.genrevids li:nth-child(2)').mouseleave(function() {
		$('.genrevids li:nth-child(2) .playButton').css('display', 'none');
	});
</script>
	<script type="text/javascript">
	$('.popular-title').click(function() {
		$(this).addClass('active-news-title');
		$('.new-title').removeClass('active-news-title');
		$('.featured-title').removeClass('active-news-title');
	});
	$('.new-title').click(function() {
		$(this).addClass('active-news-title');
		$('.popular-title').removeClass('active-news-title');
		$('.featured-title').removeClass('active-news-title');
	});
	$('.featured-title').click(function() {
		$(this).addClass('active-news-title');
		$('.new-title').removeClass('active-news-title');
		$('.popular-title').removeClass('active-news-title');
	});
	</script>
<script type="text/javascript">
	//SHOWS PLAY_BUTTON BY HOVERING VIDEO THUMBNAILS
	$('.video_thumb').hover(function(){
	  $(this).find('.video_img').fadeTo('fast',0.5);
	  $(this).find('.play_button').css({'display' : 'block', 'opacity' : '0.8'})
	  $(this).find('h3').css({'color' : '#000000'})
	  $(this).find('p').css({'color' : '#000000'})
	}, function(){
	  $(this).find('.play_button').css({'display' : 'none'})
	  $(this).find('.video_img').fadeTo('fast',1);
	  $(this).find('h3').css({'color' : '#989898'})
	  $(this).find('p').css({'color' : '#989898'})
	});
	$('.featured_video').hover(function(){
	  $(this).find('.video_img').fadeTo('fast',0.5);
	  $(this).find('.play_button').css({'display' : 'block', 'opacity' : '0.8'})
	}, function(){
	  $(this).find('.play_button').css({'display' : 'none'})
	  $(this).find('.video_img').fadeTo('fast',1);
	});
</script>
<script type="text/javascript">
	$('.popular-title').click(function() {
		$(this).addClass('active-news-title');
		$('.new-title').removeClass('active-news-title');
	});
	$('.new-title').click(function() {
		$(this).addClass('active-news-title');
		$('.popular-title').removeClass('active-news-title');
	});
</script>
<script type="text/javascript">

$(window).scroll(function () {

if( $(window).scrollTop() > $('#menuContainerFix').offset().top && !($('#menuContainerFix').hasClass('menu_stick'))){

	$('#menuContainerFix').addClass('menu_stick');

} else if ($(window).scrollTop() < 100){

	$('#menuContainerFix').removeClass('menu_stick');

}
});

//MIN ACCOUNT APP
$('.account-arrowdown').click(function(){
$('.account-wrapper').slideToggle('slow');
$('.account-hide').toggle('slow');
})

//EFFECT EVENT 
$('.event-thumb').mouseenter(function() {
$(this).find('img').css('opacity', '0.5');
});
$('.event-thumb').mouseleave(function() {
$(this).find('img').css('opacity', '1');
});

//NEWS MENU ELEMENT
$('.news-menu ul li').click(function(){
$('.news-menu ul li').removeClass('active');
$(this).addClass('active');
})

//<![CDATA[
$(document).ready(function () {
<?php if(!empty($genreSlug)){?>
$(".news-menu ul li:nth-child(1)").bind("click", function (event) {
	$.ajax({
		beforeSend:function (XMLHttpRequest) {
			$(".news-mainsection").fadeOut("slow");
		},
		complete:function (XMLHttpRequest, textStatus) {
			$(".news-mainsection").fadeIn("slow");
		},
		dataType:"html", success:function (data,textStatus) {
			$(".news-mainsection").html(data);
		},
		url:"\/<?php echo $genreSlug; ?>\/news"
	});
	history.pushState('', 'New URL: \/<?php echo $genreSlug; ?>\/news', '\/<?php echo $genreSlug; ?>\/news');
	event.preventDefault();
	return false;
});
$(".news-menu ul li:nth-child(2)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/<?php echo $genreSlug; ?>\/interviews"});
	history.pushState('', 'New URL: \/<?php echo $genreSlug; ?>\/interviews', '\/<?php echo $genreSlug; ?>\/interviews');
	event.preventDefault();
return false;});
$(".news-menu ul li:nth-child(3)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/<?php echo $genreSlug; ?>\/music-reviews"});
	history.pushState('', 'New URL: \/<?php echo $genreSlug; ?>\/music-reviews', '\/<?php echo $genreSlug; ?>\/music-reviews');
	event.preventDefault();
return false;});
$(".news-menu ul li:nth-child(4)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/<?php echo $genreSlug; ?>\/event-reviews"});
	history.pushState('', 'New URL: \/<?php echo $genreSlug; ?>\/event-reviews', '\/<?php echo $genreSlug; ?>\/event-reviews');
	event.preventDefault();
return false;});
$(".featured-title").bind("click", function (event) {
	$.ajax({beforeSend:function (XMLHttpRequest) {
		$(".news-menu-right-options").hide();
	}, complete:function (XMLHttpRequest, textStatus) {
		$(".news-menu-right-options").show();
	}, dataType:"html", success:function (data,textStatus) {
		$(".news-menu-right-options").html(data);
	}, url:"\/articles\/ajaxlist_box?type=featured&limit=5&genreSlug=<?php echo $genreSlug; ?>&channelSlug=<?php echo $channelSlug ?>"
});
return false;});
$(".popular-title").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-menu-right-options").hide();}, complete:function (XMLHttpRequest, textStatus) {$(".news-menu-right-options").show();}, dataType:"html", success:function (data,textStatus) {$(".news-menu-right-options").html(data);}, url:"\/articles\/ajaxlist_box?type=trending&limit=5&genreSlug=<?php echo $genreSlug; ?>&channelSlug=<?php echo $channelSlug ?>"});
return false;});
$(".new-title").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-menu-right-options").hide();}, complete:function (XMLHttpRequest, textStatus) {$(".news-menu-right-options").show();}, dataType:"html", success:function (data,textStatus) {$(".news-menu-right-options").html(data);}, url:"\/articles\/ajaxlist_box?type=recent&limit=5&genreSlug=<?php echo $genreSlug; ?>&channelSlug=<?php echo $channelSlug ?>"});
return false;});
<?php } else {
	if((!empty($channelSlug))&&($channelSlug=='london-news')){
?>
$(".news-menu ul li:nth-child(1)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/london-news"});
	history.pushState('', 'New URL: \/london-news', '\/london-news');
	event.preventDefault();
return false;});
$(".news-menu ul li:nth-child(2)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/specials"});
	history.pushState('', 'New URL: \/specials', '\/specials');
	event.preventDefault();
return false;});
$(".news-menu ul li:nth-child(3)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/good-news"});
	history.pushState('', 'New URL: \/good-news', '\/good-news');
	event.preventDefault();
return false;});
$(".news-menu ul li:nth-child(4)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/other-side"});
	history.pushState('', 'New URL: \/other-side', '\/other-side');
	event.preventDefault();
return false;});
<?php
	} elseif((!empty($channelSlug))&&(($channelSlug=='travel')||($channelSlug=='travel-reviews'))) {
?>
$(".news-menu ul li:nth-child(1)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/travel"});
	history.pushState('', 'New URL: \/travel', '\/travel');
	event.preventDefault();
return false;});
$(".news-menu ul li:nth-child(2)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/travel-reviews"});
	history.pushState('', 'New URL: \/travel-reviews', '\/travel-reviews');
	event.preventDefault();
return false;});
<?php
	} elseif((!empty($channelSlug))&&(($channelSlug=='festivals')||($channelSlug=='festival-reviews'))) {
?>
$(".news-menu ul li:nth-child(1)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/festivals"});
	history.pushState('', 'New URL: \/festivals', '\/festivals');
	event.preventDefault();
return false;});
$(".news-menu ul li:nth-child(2)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/festival-reviews"});
	history.pushState('', 'New URL: \/festival-reviews', '\/festival-reviews');
	event.preventDefault();
return false;});
<?php
	} elseif((!empty($channelSlug))&&(($channelSlug=='film')||($channelSlug=='film-reviews'))) {
?>
$(".news-menu ul li:nth-child(1)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/film"});
	history.pushState('', 'New URL: \/film', '\/film');
	event.preventDefault();
return false;});
$(".news-menu ul li:nth-child(2)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/film-reviews"});
	history.pushState('', 'New URL: \/film-reviews', '\/film-reviews');
	event.preventDefault();
return false;});
<?php
	} elseif((!empty($channelSlug))&&(($channelSlug=='technology')||($channelSlug=='technology-reviews'))) {
?>
$(".news-menu ul li:nth-child(1)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/technology"});
	history.pushState('', 'New URL: \/<technology', '\/technology');
	event.preventDefault();
return false;});
$(".news-menu ul li:nth-child(2)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/technology-reviews"});
	history.pushState('', 'New URL: \/technology-reviews', '\/technology-reviews');
	event.preventDefault();
return false;});
<?php
	} elseif((!empty($channelSlug))&&($channelSlug=='fashion')) {
?>
$(".news-menu ul li:nth-child(1)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/fashion"});
	history.pushState('', 'New URL: \/fashion', '\/fashion');
	event.preventDefault();
return false;});
<?php
	} else {
?>
$(".news-menu ul li:nth-child(1)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/news"});
	history.pushState('', 'New URL: \/news', '\/news');
	event.preventDefault();
return false;});
$(".news-menu ul li:nth-child(2)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/interviews"});
	history.pushState('', 'New URL: \/interviews', '\/interviews');
	event.preventDefault();
return false;});
$(".news-menu ul li:nth-child(3)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/music-reviews"});
	history.pushState('', 'New URL: \/music-reviews', '\/music-reviews');
	event.preventDefault();
return false;});
$(".news-menu ul li:nth-child(4)").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-mainsection").fadeOut("slow");}, complete:function (XMLHttpRequest, textStatus) {$(".news-mainsection").fadeIn("slow");}, dataType:"html", success:function (data,textStatus) {$(".news-mainsection").html(data);}, url:"\/event-reviews"});
	history.pushState('', 'New URL: \/event-reviews', '\/event-reviews');
	event.preventDefault();
return false;});
<?php
	}
}
?>
$(".featured-title").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-menu-right-options").hide();}, complete:function (XMLHttpRequest, textStatus) {$(".news-menu-right-options").show();}, dataType:"html", success:function (data,textStatus) {$(".news-menu-right-options").html(data);}, url:"\/articles\/ajaxlist_box?type=featured&limit=5&genreSlug=<?php echo $genreSlug; ?>&channelSlug=<?php echo $channelSlug; ?>"});
return false;});
$(".popular-title").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-menu-right-options").hide();}, complete:function (XMLHttpRequest, textStatus) {$(".news-menu-right-options").show();}, dataType:"html", success:function (data,textStatus) {$(".news-menu-right-options").html(data);}, url:"\/articles\/ajaxlist_box?type=trending&limit=5&genreSlug=<?php echo $genreSlug; ?>&channelSlug=<?php echo $channelSlug; ?>"});
return false;});
$(".new-title").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$(".news-menu-right-options").hide();}, complete:function (XMLHttpRequest, textStatus) {$(".news-menu-right-options").show();}, dataType:"html", success:function (data,textStatus) {$(".news-menu-right-options").html(data);}, url:"\/articles\/ajaxlist_box?type=recent&limit=5&genreSlug=<?php echo $genreSlug; ?>&channelSlug=<?php echo $channelSlug; ?>"});
return false;});
});
//]]>
//PUT IT IN HERE FOR NOW BECAUSE EXTERNAL JS DOESN'T WORK
	jQuery.ajax = (function(_ajax){
		
		var protocol = location.protocol,
			hostname = location.hostname,
			exRegex = RegExp(protocol + '//' + hostname),
			YQL = 'http' + (/^https/.test(protocol)?'s':'') + '://query.yahooapis.com/v1/public/yql?callback=?',
			query = 'select * from html where url="{URL}" and xpath="*"';
		
		function isExternal(url) {
			return !exRegex.test(url) && /:\/\//.test(url);
		}
		
		return function(o) {
			
			var url = o.url;
			
			if ( /get/i.test(o.type) && !/json/i.test(o.dataType) && isExternal(url) ) {
				
				// Manipulate options so that JSONP-x request is made to YQL
				
				o.url = YQL;
				o.dataType = 'json';
				
				o.data = {
					q: query.replace(
						'{URL}',
						url + (o.data ?
							(/\?/.test(url) ? '&' : '?') + jQuery.param(o.data)
						: '')
					),
					format: 'xml'
				};
				
				// Since it's a JSONP request
				// complete === success
				if (!o.success && o.complete) {
					o.success = o.complete;
					delete o.complete;
				}
				
				o.success = (function(_success){
					return function(data) {
						
						if (_success) {
							// Fake XHR callback.
							_success.call(this, {
								responseText: (data.results[0] || '')
									// YQL screws with <script>s
									// Get rid of them
									.replace(/<script[^>]+?\/>|<script(.|\s)*?\/script>/gi, '')
							}, 'success');
						}
						
					};
				})(o.success);
				
			}
			
			return _ajax.apply(this, arguments);
			
		};
		
	})(jQuery.ajax);
//END OF "EXTERNAL" TWITTER
// Settings
username = 'guestlistdotnet'; // Twitter username
target = '.tweets'; // Targeted element3
wrapper = 'li'; // Tags to wrap tweets with
count = '1'; // Number of tweets to pull in, max. 20

$.ajax({
url: 'https://twitter.com/'+username,
type: 'GET',
success: function(res) {                
    $('.js-tweet-text', res.responseText).slice(0, count).each(function(e) {

        $('a', $(this)).not('[href^="http"],[href^="https"],[href^="mailto:"],[href^="#"]').each(function() {
            $(this).attr('href', function(index, value) {
                if (value.substr(0,1) !== "/") {
                    value = window.location.pathname + value;
                }
                return "http://twitter.com" + value;
            });
        });

       $(target).append('<'+wrapper+'>'+$(this).html()+'</'+wrapper+'>');
    });  
}
});

//LOGIN BAR
$(document).ready(function() {
$('#newLogin').bind('click', function() {
	if($('#topbar').css('margin-top') ==  '-53px')
	{
		$('#topbar').css('margin-top', '0px');
		$('.arrowWhite').css('transform', 'rotate(180deg)');
	}
	else {
		$('#topbar').css('margin-top', '-53px');
		$('.arrowWhite').css('transform', 'rotate(0deg)');
		}
});
});
</script>
<script type="text/javascript">
	//ACCOUNT MENU HEADER
	$('.account-header ul li:nth-child(1)').click(function() {
		$('.account-header ul li:nth-child(2)').removeClass('active-option');
		$(this).addClass('active-option');
		$('.upcoming-events').addClass('upcoming-events-arrow');
		$('.past-events').removeClass('past-events-arrow');
	});
	$('.account-header ul li:nth-child(2)').click(function() {
		$('.account-header ul li:nth-child(1)').removeClass('active-option');
		$(this).addClass('active-option');
		$('.past-events').addClass('past-events-arrow');
		$('.upcoming-events').removeClass('upcoming-events-arrow');
	});
	//ACCOUNT MENU LEFT
	$('.account-menu ul li:nth-child(1)').click(function() {
		$(this).addClass('active-option');
		$('.account-menu ul li:nth-child(3)').removeClass('active-option');
		$('.account-menu ul li:nth-child(2)').removeClass('active-option');
		$('.my-guestlist').addClass('arrow');
		$('.friends-guestlist').removeClass('arrow');
		$('.favourites').removeClass('arrow');
	});
	$('.account-menu ul li:nth-child(2)').click(function() {
		$(this).addClass('active-option');
		$('.account-menu ul li:nth-child(1)').removeClass('active-option');
		$('.account-menu ul li:nth-child(3)').removeClass('active-option');
		$('.friends-guestlist').addClass('arrow');
		$('.my-guestlist').removeClass('arrow');
		$('.favourites').removeClass('arrow');
	});
	$('.account-menu ul li:nth-child(3)').click(function() {
		$(this).addClass('active-option');
		$('.account-menu ul li:nth-child(1)').removeClass('active-option');
		$('.account-menu ul li:nth-child(2)').removeClass('active-option');
		$('.favourites').addClass('arrow');
		$('.my-guestlist').removeClass('arrow');
		$('.friends-guestlist').removeClass('arrow');
	});
</script>
<script>
	$(document).ready(function() {
 
  var owl = $("#owl-demo");
 
  owl.owlCarousel({
      items : 6, //10 items above 1000px browser width
      itemsDesktop : [1000,6], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
  });
 
  // Custom Navigation Events
  $(".next").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev").click(function(){
    owl.trigger('owl.prev');
  })
  $(".play").click(function(){
    owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
  })
  $(".stop").click(function(){
    owl.trigger('owl.stop');
  })
  
  $('#paging').hide();
 
});
</script>