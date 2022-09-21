<?php
/*
*
* Template Name: Article sans sidebar
* Template Post Type: post, page
*/
?>

<?php get_header(); ?>



<!-- ROW BOOTSTRAP  -->

<?php if (have_posts()) : ?>
    <div class="col-12 container-img-txt">
        <!-- THUMBNAIL -->
        <?php if (has_post_thumbnail()) the_post_thumbnail('full'); ?>
        <!-- TITLE -->
        <h1 class="text-uppercase text-into-img"><?php the_title() ?></h1>
    </div>

    <?php while (have_posts()) : the_post(); ?>
        <div class="container my-3">
            <div class="row">
                <!-- COL BOOTSTRAP 9/12 : POST CONTENT-->
                <article class="col-md-12 mb-3 me-auto ms-auto p-0">
                    <!-- METADATA -->
                    <!-- <div class="mb-3"> -->
                    <?php /* _e('By', 'choucroute') ?> <span class="badge rounded-pill text-bg-warning"><?php the_author() ?></span>,
                        <?php
                        $the_date = '<span class="badge rounded-pill text-bg-warning">' .  date_i18n(__('l j F Y', 'choucroute')) . '</span>';
                        printf(__('the %s', 'choucroute'), $the_date);
                        ?> .
                        <?php _e('Category : ', 'choucroute') ?> <span class="badge rounded-pill text-bg-warning"><?php the_category(' | '); ?></span>
                    </div>

                    <hr> */ ?>

                    <!-- CONTENT -->
                    <p><?php the_content() ?></p>

                    <!-- COMMENTS -->
                    <div>
                        <?php if (comments_open()) : ?>
                            <?php comments_template(); ?>
                        <?php else : ?>
                            <div class="alert alert-error" role="alert">
                                <p> <?php _e('Comments are close', 'choucroute') ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </article>
            </div>
        </div>
    <?php endwhile; ?>

<?php else : ?>
    <!-- COL BOOTSTRAP  9/12 : NO POST FOUND-->
    <div class="col-md-9 mb-3">
        <h1 class="text-uppercase"><?php _e('No post found', 'choucroute') ?></h1>
    </div>
<?php endif; ?>


<!-- /ROW BOOTSTRAP  -->



<?php get_footer(); ?>