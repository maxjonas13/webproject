<div id='footer'>
	<div class="container">	
		<footer>
			<div class="row"> 
				<div class="column col-md-2 col-sm-6">  
					<a id="homelink" href="/"><h1>BeeHive</h1></a>
				</div>
				<div class="column col-md-10 col-sm-6 copyright">  
					<small>
						&copy; Copyright BeeHive -
						Jonas Van der Sande &amp; Joren Van Hocht<br>
						Beehive is not liable for any unforseen damage that could be done by one of our members.
					</small>
				</div>
			</div>
		</footer>
	</div>
</div>
<!-- $script for search -->
{{ HTML::script('script/search.js'); }}
<div id="fb-root"></div>

<!-- script for facebook -->
<script>
	(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&appId=729080947173081&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>

<!-- script for twitter -->
<script type="text/javascript">
window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));
</script>