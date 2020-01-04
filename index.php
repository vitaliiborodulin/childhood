<?php get_header(); ?>

        <div class="mainslider glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">

                    <?php 

                    $posts = get_posts( array(
                        'numberposts' => -1,//убрать ограничения вывода
                        'category_name'    => 'slider',
                        'orderby'     => 'date',
                        'order'       => 'ASC',
                        'post_type'   => 'post',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) );

                    foreach( $posts as $post ){
                        setup_postdata($post); ?>

                        <li style="background-image: url('<?php the_field('slider_img'); ?>')" class="glide__slide">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-7 offset-1">
                                        <h2 
                                        style = "
                                            <?php $slider_color = get_field('slider_color') ?>
                                            <?php if ($slider_color === 'light'): ?>
                                                color: #ffffff;
                                            <?php else: ?>
                                                color: #484848;
                                            <?php endif; ?>"
                                        class="slider__title"><?php the_title(); ?></h2>
                                        <?php $slider_btn = get_field('slider_btn') ?>
                                        <?php if ($slider_btn === 'on'): ?>
                                            <a href="<?php the_field('slider_link'); ?>" class="button">Узнать больше</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                                    <svg width="15" height="25" viewBox="0 0 15 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.982942 13.3923L12.2253 24.631C12.7186 25.123 13.5179 25.123 14.0124 24.631C14.5057 24.1389 14.5057 23.3397 14.0124 22.8476L3.66178 12.5007L14.0112 2.15378C14.5045 1.66172 14.5045 0.862477 14.0112 0.369169C13.5179 -0.122894 12.7174 -0.122894 12.2241 0.369169L0.981696 11.6077C0.495966 12.0947 0.495966 12.9065 0.982942 13.3923Z" fill="white"/>
                                    </svg>
                                </button>
                                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                                    <svg width="15" height="25" viewBox="0 0 15 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.0171 11.6077L2.77467 0.369029C2.28137 -0.123032 1.48213 -0.123032 0.987571 0.369029C0.494263 0.861093 0.494264 1.66033 0.987572 2.15239L11.3382 12.4993L0.98882 22.8462C0.495512 23.3383 0.495512 24.1375 0.98882 24.6308C1.48213 25.1229 2.28261 25.1229 2.77592 24.6308L14.0183 13.3923C14.504 12.9053 14.504 12.0935 14.0171 11.6077Z" fill="white"/>
                                    </svg>
                                </button>
                            </div>
                        </li>

                        <?php }
                    wp_reset_postdata(); ?>
                </ul>
            </div>
        </div>

        <div class="about" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1 col-lg-5 offset-lg-1">
                        <div class="about__img">
                            <!-- <img src="<?php the_field('about_img'); ?> " alt="про компанию"> -->
                            <?php $about_img = get_field('about_img'); ?>
                            <?php if (!empty($about_img)): ?>
                                <img src="<?= $about_img['url'] ?>" alt="<?= $about_img['alt'] ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-6 col-xl-5 offset-xl-1">
                        <h1 class="title underlined"><?php the_field('about_title'); ?></h1>
                        <div class="about__text">
                            <?php the_field('about_text'); ?>
                        </div>
                        <a href="#" class="button">Узнать больше</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="specialists" id="specialists">
            <div class="container">
                <div class="title">Наша команда</div>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <img class="specialists__img" src="<?php bloginfo('template_url'); ?>/assets/img/team.jpg" alt="наша команда">
                    </div>
                </div>
            </div>
        </div>

        <div class="toys" id="toys">
            <div class="container">
                <h2 class="subtitle">Мягкие игрушки</h2>
                <div class="toys__wrapper">

                    <?php 
                    $posts = get_posts( array(
                        'numberposts' => -1,//убрать ограничения вывода
                        'category_name'    => 'soft_toys',
                        'orderby'     => 'date',
                        'order'       => 'ASC',
                        'post_type'   => 'post',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) );

                    foreach( $posts as $post ){
                        setup_postdata($post); ?>

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
                                <div class="minibutton toys__trigger">Подробнее</div>
                            </div>
                        </div>

                    <?php }
                        wp_reset_postdata(); ?>
                    
                </div>


                <h2 class="subtitle">Развивающие игрушки</h2>
                <div class="toys__wrapper">

                <?php 
                    $posts = get_posts( array(
                        'numberposts' => -1,//убрать ограничения вывода
                        'category_name'    => 'edu_toys',
                        'orderby'     => 'date',
                        'order'       => 'ASC',
                        'post_type'   => 'post',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) );

                    foreach( $posts as $post ){
                        setup_postdata($post); ?>

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
                            <div class="minibutton toys__trigger">Подробнее</div>
                        </div>
                    </div>

                    <?php }
                        wp_reset_postdata(); ?>

                </div>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="toys__alert">
                            <span>Не нашли то, что искали?</span> Свяжитесь с нами - и мы с радостью создадим любую игрушку по вашему желанию. Вы можете выбрать все: размер, материал, формы...!
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="aboutus" id="aboutus">
            <div class="container">
                <h1 class="title">Наша история</h1>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subtitle">
                            Все начиналось с желания
                        </div>
                        <div class="aboutus__text">
                            Желания сделать как можно больше детей счастливыми. Именно с этой идеи все и зарождалось.
                            <br><br>
                            Первые игрушки, сделанные вручную были классическими плюшевыми медведями, которые разошлись настолько быстро, что нас завалили заказами на несколько месяцев вперед. Именно в то время мы поняли, что идем правильным путем, вкладывая все силы и эмоции в наши игрушки.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="aboutus__img" src="<?php bloginfo('template_url'); ?>/assets/img/about_1.jpg" alt="мир детства">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <img class="aboutus__img" src="<?php bloginfo('template_url'); ?>/assets/img/about_2.jpg" alt="мир детства">
                    </div>
                    <div class="col-lg-6">
                        <div class="subtitle">
                            Главное - качество
                        </div>
                        <div class="aboutus__text">
                            Мы делали их вручную, из лучших материалов и не жалея времени. Но мы росли и наш ассортимент расширился и фабричными изделиями.
                            <br><br>
                            Выбирая нас, вы можете быть уверены, что мы всегда следим за качеством закупок и никогда не предоставим вам опасный или некачественный товар.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="subtitle">
                            Современные технологии
                        </div>
                        <div class="aboutus__text">
                            И даже спустя столько лет мы продолжаем создавать игрушки вручную. Как самые простые, так и те, что идут в ногу со временем. Добавляя электроники и оживляя лучших друзей ребятишек, мы всегда следим за качеством и безопасностью. Каждая отдельная игрушка проходит индивидуальный контроль по всем необходимым стандартам.
                            <br><br>
                            Ведь счастливое лицо ребенка - это лучшая награда для нас!
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="aboutus__img" src="<?php bloginfo('template_url'); ?>/assets/img/about_3.jpg" alt="мир детства">
                    </div>
                </div>
            </div>
        </div>

<?php get_footer(); ?>

<?php 

    /*add_action( 'my_super_hook', 'print_hello', 10, 2);
        
    function print_hello($name, $age) {
        print "Hello $name . $age";
    }
    do_action( 'my_super_hook', 'admin', 32); */

    /*function my_filter_function($str) {
        return 'Hello ' . $str;
    }

    add_filter( 'my_filter', 'my_filter_function', 15 );

    echo apply_filters( 'my_filter', 'Vitalii' );

    remove_filter( 'my_filter', 'my_filter_function', 15 );
    //remove_action( $tag:string, $function_to_remove:callable, $priority:integer )

    echo apply_filters( 'my_filter', 'Vitalii' );*/
    ?>

