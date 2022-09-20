<?php get_header(); ?>

    <div class="container my-4">

        <!-- ROW BOOTSTRAP  -->
        <div class="row">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-md-12 mb-3">
                        <h1 class="text-uppercase text-center mb-4"><?php the_title() ?></h1>
                        <?php the_post_thumbnail('large'); ?>
                        <p><?php the_content() ?></p>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <!-- /ROW BOOTSTRAP  -->

    </div>

<?php get_footer(); ?>