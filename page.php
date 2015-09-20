<?php get_header(); ?>
<div class="page-margin"></div>
                <?php while (have_posts()) : the_post(); ?>

                        <?php the_content(); ?>

                    <?php endwhile; ?>
<?php get_footer(); ?>
