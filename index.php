<?php get_header();?>
<?php if (!is_buddypress() && !is_account_page() && !is_bbpress() && !is_singular( 'wykres' )) : ?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
<?php 
$counter = 0;
$loop = new WP_Query( 
                        array( 
                        'post_type' => 'sw_slider',
                         'posts_per_page' => -1 ) 
                         ); ?>
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <div class="item <?php if($counter == 0) { echo 'active';}?>">
                        <?php
                        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                          the_post_thumbnail(); 
                        }
                        ?>
                    </div>
                    <?php $counter++; ?>
                  <?php endwhile; wp_reset_query(); ?>
                </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php endif;?>
<div id="home">
	<div class="container">
		<div class="row">
			<div class="col-md-12 naglowek">
				
			</div>
		</div>	
		<div class="bg">
		
			<div id="opis-portalu-home">
				<div class="row">
				<div id="tiles">
					<div class="col-md-3">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/sztanga.png">
						<h2>Ćwiczenia</h2>
						<p><?php echo get_option('fitster_cwiczenia');?></p>
					</div>	
					<div class="col-md-3">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/biceps.png">
						<h2>Treningi</h2>
						<p><?php echo get_option('fitster_treningi');?></p>
					</div>
						<div class="col-md-3">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/broccoli.png">
						<h2>odżywianie</h2>
						<p><?php echo get_option('fitster_odzywianie');?></p>
					</div>	
					<div class="col-md-3">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/proteins.png">
						<h2>suplementacja</h2>
						<p><?php echo get_option('fitster_suplementacja');?></p>
					</div>		
				</div>
					</div>		
			</div>
			<!-- <div class="col-md-4">
				<div class="header">
					<h1>Społeczność</h1>
				</div>
				<div class="aktywnosc">
					<div class="row activity">
						<img src="img/user-1.jpg"> <p><a href="#"><strong>Użytkownik</strong></a> jest teraz znajomym z użytkownikiem <a href="#"><strong>Użytkownik</strong></a></p>
					</div>
					<div class="row activity">
						<img src="img/user-1.jpg"> <p><a href="#"><strong>Użytkownik</strong></a> jest teraz znajomym z użytkownikiem <a href="#"><strong>Użytkownik</strong></a></p>
					</div>
					<div class="row activity">
						<img src="img/user-1.jpg"> <p><a href="#"><strong>Użytkownik</strong></a> jest teraz znajomym z użytkownikiem <a href="#"><strong>Użytkownik</strong></a></p>
					</div>
					<div class="row activity">
						<img src="img/user-1.jpg"> <p><a href="#"><strong>Użytkownik</strong></a> jest teraz znajomym z użytkownikiem <a href="#"><strong>Użytkownik</strong></a></p>
					</div>
				</div>
				<?php if ( !is_user_logged_in() ) : ?>
				<div class="rejestracja-home">
					<h3><strong>Stwórz konto</strong></h3>
					<hr>
					<span>Z nami osiągniesz swoje cele!</span>
					<a href="<?php echo get_permalink( get_page_by_path( 'register' ) );?>">Zarejestruj się</a>
				</div>
			<?php endif;?>
			</div> -->
		</div>
	</div>
</div>


<?php 
get_template_part('wybor-planu');
?>
<div class="home-artykuly">
	<div class="container">
		<div class="col-md-12">
			<div class="header">
				<h1>Plany Ćwiczeń</h1>
			</div>
			<div class="row">
<?php
$args = array(  
    'post_type' => 'plan',  
    'meta_key' => 'featured',  
    'meta_value' => 'tak',  
    'posts_per_page' => 4,
    'orderby' => 'rand'  
);
$term_query = new WP_Query( $args ); ?>
<?php    while ($term_query->have_posts()) :  
$term_query->the_post();  ?>
				<div class="col-md-3">
					<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('article_thumb');
						} 
					?>	
					<h2><?php the_title();?></h2>
					<span><?php echo get_the_date();?></span>
					<?php the_excerpt();?>
				</div>
<?php endwhile;?>
			</div>
		</div>
	</div>
</div>
<?php 
$terms = get_terms( 'article_categories' );
foreach ($terms as $term):
?>
<div class="home-artykuly">
	<div class="container">
		<div class="col-md-12">
			<div class="header">
				<h1><?php echo $term->name;?></h1>
			</div>
			<div class="row">
<?php
				$args = array(
	'post_type' => 'article',
	'tax_query' => array(
		array(
			'taxonomy' => 'article_categories',
			'field'    => 'slug',
			'terms'    => $term->slug,
		),
	'posts_per_page' => 3,
	),
);
$term_query = new WP_Query( $args ); ?>
<?php    while ($term_query->have_posts()) :  
$term_query->the_post();  ?>
				<div class="col-md-3">
					<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('article_thumb');
						} 
					?>	
					<h2><?php the_title();?></h2>
					<span><?php echo get_the_date();?></span>
					<?php the_excerpt();?>
				</div>
<?php endwhile;?>
			</div>
		</div>
	</div>
</div>
<?php endforeach;?>
<?php if ( !is_user_logged_in() ) : ?>
<div id="home-rejestracja">
	<div class="container">
		<div class="col-md-12 naglowek">
			<div class="header">
				<h1>Społeczność	</h1>
			</div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<h2>Dołącz do nas - załóż konto!</h2>
				<hr>
				<span>Jakie możliwości otwiera przed Tobą założenie konta?</span>
			</div>
			<div class="row mozliwosci">
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ziemia.png">
					<h3>Lorem ipsum dolor sit amet.</h3>
					<p><?php echo get_option('fitster_mozliwosc1');?></p>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ziemia.png">
					<h3>Lorem ipsum dolor sit amet.</h3>
					<p><?php echo get_option('fitster_mozliwosc2');?></p>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ziemia.png">
					<h3>Lorem ipsum dolor sit amet.</h3>
					<p><?php echo get_option('fitster_mozliwosc3');?></p>
				</div>
			</div>
			<a class="zarejestruj" href="<?php echo get_permalink( get_page_by_path( 'register' ) );?>">zarejestruj się</a>
		</div>

		<!-- <div class="col-md-4 users">
				<h3>nasi</h3>	
				<h3><strong>użytkownicy</strong></h3>

				<a class="all" href="#">Zobacz wszystkich</a>
				<div class="controls">
		    		<a class="jcarousel-prev" href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/previous.png"></a>
		    		<a class="jcarousel-next" href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/next.png"></a>
		    	</div>
		</div>	
		<div class="col-md-8">
			<div class="jcarousel">
				<ul>
					<li><img src="img/user.jpg"><br>
						<a href="#"><strong>Użytkownik</strong></a>
						<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</span>
					</li>
					<li><img src="img/user.jpg"><br>
						<a href="#"><strong>Użytkownik</strong></a>
						<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</span>
					</li>
					<li><img src="img/user.jpg"><br>
						<a href="#"><strong>Użytkownik</strong></a>
						<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</span>
					</li>
					<li><img src="img/user.jpg"><br>
						<a href="#"><strong>Użytkownik</strong></a>
						<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</span>
					</li>
					<li><img src="img/user.jpg"><br>
						<a href="#"><strong>Użytkownik</strong></a>
						<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</span>
					</li>
					<li><img src="img/user.jpg"><br>
						<a href="#"><strong>Użytkownik</strong></a>
						<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</span>
					</li>
					<li><img src="img/user.jpg"><br>
						<a href="#"><strong>Użytkownik</strong></a>
						<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</span>
					</li>
					
				</ul>
			</div>
		</div> -->
	</div>
</div>
<?php endif;?>
<?php get_footer();?>



<script type="text/javascript">
(function($) {
	$( ".krok" ).click(function(event) {
        event.preventDefault();
      var aktualny_krok = $(".krok.active").data("krok");
      var numer_kroku = $(this).data("krok");
      if(numer_kroku-aktualny_krok > 1) {
      	return false;
      }
      $( ".krok" ).removeClass( "active" );
      $(this).addClass("active");
      $(".step").hide();
      $("#krok-"+numer_kroku).show();
    });
var url = <?php echo "'".get_permalink( get_page_by_path( 'znajdz-plan' ) )."'";?>;
var plec;
    $( ".plec" ).click(function(event) {
        event.preventDefault();

	      $(".step").hide();
	      $("#krok-2").show();
	      $('.krok').removeClass("active");
	      $('.krok[data-krok=2]').addClass("active");

      	plec = $(this).data("plec");
	    	if (plec=='1'){
	    		$(".obrazek.women").hide();
	    		$(".obrazek.men").show();
	    		url = url+'?gender=man';
	    	} else {
	    		$(".obrazek.men").hide();
	    		$(".obrazek.women").show();
	    		url = url+'?gender=woman';
	    	}
    });
    $(".cel").click(function(event) {
    	event.preventDefault();
    	var cel = $(this).data('cel');
    	$(".step").hide();
    	$("#krok-3").show();
    	$(".krok").removeClass("active");
    	$('.krok[data-krok=3]').addClass("active");
	    	if (plec=='1'){
	    		$(".obrazek.women").hide();
	    		$(".obrazek.men").show();
	    	} else {
	    		$(".obrazek.men").hide();
	    		$(".obrazek.women").show();
	    	}
	    url = url+'&target='+cel;

    });
       $(".difficulty").click(function(event) {
    	event.preventDefault();
    	var difficulty = $(this).data('difficulty');
	    url = url+'&difficulty='+difficulty;
	    window.location.href = url;
    });
            })( jQuery );

</script>