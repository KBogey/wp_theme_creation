<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('title') ?></title>
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <?php get_template_part('template-parts/header/navbar'); ?>
    </header>

    <main>