</main>

<footer class="container-fluid bg-dark text-light">
    <div class="row  py-3">
        <div class="col-md-12">
            <p class="text-center small mb-0 text-secondary">
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