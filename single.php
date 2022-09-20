<?php get_header(); ?>

    <div class="container my-4">

        <!-- ROW BOOTSTRAP  -->
        <div class="row">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-md-9 mb-3">
                        <h1 class="text-uppercase"><?php the_title() ?></h1>
                        <div class="mb-3">
                            <?php _e('By', 'choucroute') ?> <span class="badge rounded-pill text-bg-warning"><?php the_author() ?></span>,
                            <?php
                                $the_date = '<span class="badge rounded-pill text-bg-warning">' .  date_i18n( __( 'l j F Y', 'choucroute' ) ) . '</span>';
                                printf(__('the %s', 'choucroute'), $the_date);
                            ?> .
                            <?php _e('Category : ', 'choucroute') ?> <span class="badge rounded-pill text-bg-warning"><?php the_category(' | '); ?></span>
                        </div>

                        <hr>

                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('large', array('class' => 'img-fluid mb-3'));
                        }
                        ?>
                        <p><?php the_content() ?></p>
                        <div>
                            <?php if (comments_open()) : ?>
                                <?php comments_template(); ?>
                            <?php else : ?>
                                <div class="alert alert-error" role="alert">
                                    <p> <?php _e('Comments are close', 'choucroute') ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="col-md-9 mb-3">
                    <h1 class="text-uppercase"><?php _e('No post found', 'choucroute') ?></h1>
                </div>
            <?php endif; ?>
            <div class="col-md-3">
                <!-- TODO : appeler une sidebar-->
                Future sidebar
            </div>
        </div>
        <!-- /ROW BOOTSTRAP  -->

    </div>

<?php get_footer(); ?>