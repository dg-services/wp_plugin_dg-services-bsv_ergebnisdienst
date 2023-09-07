
<style>
	.portfoliocard {
		box-shadow: 3px 3px 18px 0 <?= get_option('portfolioPluginShadowColor') ?>;
	}
	.portfoliocard:hover .portfoliotechnologyitem{
		background-color: <?= get_option('portfolioPluginAttributeBGColorHover') ?>;
		color: <?= get_option('portfolioPluginAttributeTextColorHover') ?>;
	}
	.portfoliocard:hover {
		box-shadow: -4px -4px 18px 0 <?= get_option('portfolioPluginShadowColorHover') ?>;
	}

	a, a:hover, a:visited {
		color: <?= get_option('portfolioPluginTextColorHover') ?>;
	}

</style>

<div class="container mx-auto">
	<div class="portfoliocards flex flex-wrap gap-1">

	<?php 
		$args = array(
			'post_type'      => 'portfolio'
		);
		$loop = new WP_Query($args);

		// Start the Loop.
		while ( $loop->have_posts() ) :
			$loop->the_post();
		?>

		<div class="portfoliocard flex-none my-auto p-5 w-128 h-196">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="mx-auto">
				<div class="portfolioheader h-32">
					<div class="portfoliotechnology flex flex-wrap mx-auto gap-y-10  justify-center">
						<?php if(has_tag()) {
							$posttags = get_the_tags();
							foreach($posttags as $tag) {
								echo '<div class="portfoliotechnologyitem whitespace-no-wrap px-3 py-0 m-1">' .$tag->name. '</div>'; 
							}
						} else {
							?> <span>&nbsp; <br> &nbsp;</span> <?php
						}?>
					</div>
				</div>
				<div class="portfolioimage align-middle h-72 m-auto">
					<?php if ( has_post_thumbnail() ) :	set_post_thumbnail_size( 240, 240 ); ?>
					<?php the_post_thumbnail(array(200, 200), array('class' => 'aligncenter'));  ?>
					<?php 	endif;	?>
				</div>
				<div class="portfoliocontainer p-5"><br>
					<div class="portfoliotitle"><b><?php the_title();?></b>&nbsp;<br><br></div>
					<div class="portfoliodetails"> <?php the_excerpt();?> </portfoliodetails></div>
				</div>
			</a>	
		</div>
		

		<?php
		endwhile; // End the loop.
		?>
	</div>

</div>


