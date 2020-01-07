<?php get_header(); ?>

<div class="toys">
    <div class="container">

        <h2 class="subtitle"><?php single_cat_title('Вы просматриваете: '); ?></h2>

        <div class="toys__wrapper">
            
            <?php
            while ( have_posts() ) :
                the_post(); ?>

            <div class="toys__item" style="background-image: url(<?php 
                                if(has_post_thumbnail()) {
                                    the_post_thumbnail_url();
                                } else {
                                    echo get_template_directory_uri() . '/assets/img/not-found.jpg';
                                }
                                ?>
                            )">
                <div class="toys__item-info">
                    <div class="toys__item-title"><?php the_title(); ?></div>
                    <div class="toys__item-descr">
                        <?php the_field('toys_descr'); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="minibutton toys__trigger">Подробнее</a>
                </div>
            </div>



            <?php
            endwhile; // End of the loop.
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>