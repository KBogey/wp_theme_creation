<nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
    <div class="container-fluid">
        <?php if (has_custom_logo()) : ?>
            <div class="ch-logo rounded-search">
                <?php the_custom_logo() ?>
            </div>
        <?php else : ?>
            <h1 class="site-title">
                <a class="navbar-brand" href="<?php bloginfo('wpurl') ?>"><?php bloginfo('name') ?></a>
            </h1>
            <h2 class="site-description"><?php bloginfo('description') ?></h2>
        <?php endif; ?>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'container'       => 'div',
            'container_class' => 'collapse navbar-collapse',
            'container_id'    => 'main-navbar',
            'menu_class'      => 'navbar-nav ms-auto',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
        )) ?>

    </div>
    </div>
</nav>