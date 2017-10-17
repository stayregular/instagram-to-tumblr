<?php

include 'classes/class.Photo.php';
include 'classes/class.Blog.php';
include 'classes/class.Instagram.php';

include 'config.php';
?>

  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="assets/css/skeleton.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
    	<nav class="black" role="navigation">
		    <div class="nav-wrapper container">
		    	<a id="logo-container" href="#" class="brand-logo mt-10">
		    		<?php include('logo.php'); ?>
		    	</a>
		      <ul class="right hide-on-med-and-down">
		        <li><a href="#">Instagram to Tumblr</a></li>
		      </ul>

		      <ul id="nav-mobile" class="side-nav" style="transform: translateX(-100%);">
		        <li><a href="#">Instagram to Tumblr</a></li>
		      </ul>
		      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
		    </div>
		  </nav>

		  <section class="section no-pad-bot" id="index-banner">
		    <div class="container">
		      <h1 class="header center green-text">Instagram Importer</h1>
				<?php
					if (isset($_POST['submit'])) {

						echo '<h5 class="header col s12 light center">Successfully imported the following pictures</h5>';
						echo '<div class="row">';

						$blog = new Blog("weedporndaily");

						$user_array = [
								        'weedprndaily420',
								        'stayregularmedia'
								    ];

						foreach ($user_array as $user) {


							$instagram = new Instagram($user);
							$photos = $instagram->getPhotos();

							foreach ($photos->items as $data) {

								$photo = new Photo($data);

								 $blog->post([
								    'type' => 'photo',
								    'state' => 'draft',
								    'source' => $photo->getURL(),
								    'caption' => $photo->getCaption(),
								    'tags' => 'weed,cannabis,marijuana,stoner,420,instagram'
								]);
								echo '<div class="col s12 m4"><img src="'.$photo->getURL().'" class="responsive-img z-depth-1" /><p>'.$photo->getPhotographer().'</p></div>';
							}

						}
						echo '</div>';
					} else {
						// if submit wasn't clicked
						?>

		      <div class="row center">
		        <h5 class="header col s12 light">Click the button below to import the following Instagram users latest 10 photos to the WPD Tumblr drafts:</h5>
		        <ul class="collection">
		        	<li class="collection-item">weedprndaily420</li>
			        <li class="collection-item">stayregularmedia</li>
		        </ul>
		      </div>
		      <div class="row center">
		      	<form action="#" method="post">
		        	<button type="submit" name="submit" class="btn-large waves-effect waves-light green">Get Started</button>
		        </form>
		      </div>
		      <?php	} // end submit check ?>
		    </div>
		  </section>


      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="assets/js/materialize.min.js"></script>
    </body>
  </html>



