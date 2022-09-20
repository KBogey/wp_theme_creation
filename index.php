<?php get_header(); ?>



    <div class="container my-4">
        <h2 class="text-center text-uppercase mb-3">
            <?php  _e( 'Articles list', 'choucroute' ) ; ?>
        </h2>

        <hr>

        <!-- ROW BOOTSTRAP  -->
        <?php get_template_part('template-parts/main/cards'); ?>


    </div>

<?php get_footer(); ?>