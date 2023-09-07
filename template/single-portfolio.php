<?php

get_header(); ?>

<div id="main-content" class="main-content">

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
            <?php while ( have_posts() ) : the_post(); ?>

                <div class="main-post-div">
                    <div class="single-page-post-heading">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <div class="content-here">
                        <?php  the_content();  ?>

                        <?php if(has_tag()) { ?>
                            <div class="portfolioheader">
                            <div class="flex flex-wrap m-auto">
                                <span>Technologie Stack:&nbsp;</span>
                                <?php                            
                                    $posttags = get_the_tags();
                                    foreach($posttags as $tag) { ?>
                                        <div class="portfoliotechnologyitem whitespace-no-wrap px-3 py-0 m-1"><?= $tag->name ?> </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php }?>
                        
                    </div>
                </div>                    </div>


            <?php endwhile; ?>
        </div><!-- #content -->
    </div><!-- #primary -->
</div><!-- #main-content -->

<?php
//get_sidebar();
get_footer();