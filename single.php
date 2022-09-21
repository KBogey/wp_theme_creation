<?php get_header(); ?>

<div class="container my-4">

    <!-- ROW BOOTSTRAP  -->
    <div class="row">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <!-- COL BOOTSTRAP 9/12 : POST CONTENT-->
                <article class="col-md-9 mb-3">
                    <h1 class="text-uppercase"><?php the_title() ?></h1>

                    <!-- METADATA -->
                    <div class="mb-3">
                        <?php _e('By', 'choucroute') ?> <span class="badge rounded-pill text-bg-warning"><?php the_author() ?></span>,
                        <?php
                        $the_date = '<span class="badge rounded-pill text-bg-warning">' .  date_i18n(__('l j F Y', 'choucroute')) . '</span>';
                        printf(__('the %s', 'choucroute'), $the_date);
                        ?> .
                        <?php _e('Category : ', 'choucroute') ?> <span class="badge rounded-pill text-bg-warning"><?php the_category(' | '); ?></span>
                    </div>

                    <hr>
                    <!-- THUMBNAIL -->
                    <?php if (has_post_thumbnail()) the_post_thumbnail('large', array('class' => 'img-fluid mb-3')); ?>

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
            <?php endwhile; ?>

        <?php else : ?>
            <!-- COL BOOTSTRAP  9/12 : NO POST FOUND-->
            <div class="col-md-9 mb-3">
                <h1 class="text-uppercase"><?php _e('No post found', 'choucroute') ?></h1>
            </div>
        <?php endif; ?>


        <!-- COL BOOTSTRAP  3/12 : SIDEBAR -->
        <aside class="col-md-3">
            <!-- TODO : appeler une sidebar-->
            <div class="text-decoration-none list-unstyled">
                <?php
                dynamic_sidebar('ch_article_widget_zone');
                ?>
            </div>
        </aside>

    </div>
    <!-- /ROW BOOTSTRAP  -->

</div>

<?php get_footer(); ?>