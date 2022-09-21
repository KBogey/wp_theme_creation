</main>

<footer class="container-fluid bg-secondary text-light">
    <!-- La zone de widget -->
    <div>
        <?php
        dynamic_sidebar('greg_footer_widget_zone');
        ?>
    </div>
    <div class="row  py-3">
        <div class="col-md-12">
            <p class="text-center small mb-0 text-light">
                <a class="text-light text-decoration-none" href="mailto:<?php echo bloginfo('admin_email'); ?>"><?php bloginfo('name'); ?></a>
                &copy;<?php echo date('Y'); ?>
                <?= __("All rights reserved.", 'choucroute'); ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>