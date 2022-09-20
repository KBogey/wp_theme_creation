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
                            <?php _e('the', 'choucroute') ?> <span class="badge rounded-pill text-bg-warning"><?php the_date() ?></span>.
                            <?php _e('Category : ', 'choucroute') ?> <span class="badge rounded-pill text-bg-warning"><?php the_category('|'); ?></span>
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
                                <div class="alert alert-success" role="alert">
                                    <p> Les commentaires sont ouverts</p>
                                </div>
                            <?php else : ?>
                                <div class="alert alert-error" role="alert">
                                    <p> Les commentaires sont ouverts</p>
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