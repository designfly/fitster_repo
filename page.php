<?php get_header(); ?>
               <style> 
    .first-level{
    display:none;
    }
    .secont-level{
    display:none;
    }

</style>
                <?php while (have_posts()) : the_post(); ?>

                        <?php the_content(); ?>

                    <?php endwhile; ?>

<?php get_footer(); ?>
