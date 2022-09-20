<?php get_header(); ?>

    <div class="container my-4">
        <h2 class="text-center text-uppercase mb-3">
            <?php  _e( 'Articles list', 'choucroute' ) ; ?>
        </h2>

        <hr>

        <!-- ROW BOOTSTRAP  -->
        <div class="row">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <!-- CARD BOOTSTRAP-->
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-lg bg-secondary">

                            <a href="<?php the_permalink() ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('bootstrap-card', array('class' => 'card-img-top')); ?>
                                <?php else : ?>
                                    <img src="https://loremflickr.com/300/200" class="card-img-top" width="300" height="200" />
                                <?php endif; ?>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">
                                    <a href="<?php the_permalink() ?>" class="text-light ">
                                        <?php the_title() ?>
                                    </a>
                                </h5>
                                <p>
                                    <?php _e('By', 'choucroute') ?> <span class="badge rounded-pill text-bg-warning"><?php the_author() ?></span>,
                                    <?php _e('the', 'choucroute') ?> <span class="badge rounded-pill text-bg-warning"><?php the_date() ?></span>
                                </p>
                                <p class="card-text"><?php the_excerpt() ?></p>

                                <a href="<?php the_permalink() ?>" class="btn btn-success ">
                                    <i class="me-1 bi bi-arrow-right-circle-fill text-light"></i>
                                    <?php _e('Read more', 'choucroute') ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /CARD BOOTSTRAP-->
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <!-- /ROW BOOTSTRAP  -->

    </div>

<?php get_footer(); ?>