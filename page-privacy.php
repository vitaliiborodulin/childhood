<?php
/* 
Template Name: Политика конфиденциальности
*/
?>

<?php 
    get_header();
?>

<div class="specialists">
    <div class="container">


        <?php $page = get_post('3');
            $title = $page->post_title;
            $content = $page->post_content; ?>

        <div class="title"><?= $title ?></div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <?= $content ?>
            </div>
        </div>
    </div>
</div>

<?php 
    get_footer();
?>