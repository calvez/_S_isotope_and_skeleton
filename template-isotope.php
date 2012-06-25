<?php
/*
Template Name: Isotope
*/
?>

<?php get_header(); ?>
	 <div id="content" class="page row">
	<?php
				 $terms = get_terms("category");
				 $count = count($terms);
				 echo '<ul id="portfolio-filter">';
					echo '<li><a href="#" data-filter="*">all</a></li>';
				 if ( $count > 0 ){
					
						foreach ( $terms as $term ) {
							
							echo '<li><a href="#" data-filter=".'.$term->name.'" class="current">'.$term->name.'</a></li>';
						}
				 }
				 echo "</ul>";
			?>

			<div id="isocontent">
		<?php 
		// $query = new WP_Query( array ( 'orderby' => 'rand', 'posts_per_page' => '15' ) );
		$query = new WP_Query( 'posts_per_page=-1' );
		// $query = new WP_Query( 'posts_per_page=-1' );
		// $query = new WP_Query( 'nopaging=true' );
			while ($query->have_posts()) : $query->the_post(); ?>
			<div class="box <?php $category = get_the_category(); echo $category[0]->cat_name; ?>">
			<a href="<?php the_permalink(); ?>">
			<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();
			} else { ?>
			<img src="http://lorempixel.com/265/210/" alt="<?php the_title(); ?>" />
			<?php } ?></a>
			</div><!-- .box -->
			<?php endwhile; ?>
			</div><!-- #isocontent -->
		</div><!-- #primary -->



  <script type="text/javascript">
   jQuery(document).ready(function(){
     var mycontainer = jQuery('#isocontent');
     mycontainer.isotope({
     itemSelector: '.box'
     });
   
   // filter items when filter link is clicked
jQuery('#portfolio-filter a').click(function(){
  var selector = jQuery(this).attr('data-filter');
  mycontainer.isotope({ filter: selector });
  return false;  
  });
  
});
 </script>

<?php get_footer(); ?>