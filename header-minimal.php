<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header style="background: #6b4fc4; color: white; padding: 20px;">
    <h1><a href="<?php echo home_url(); ?>" style="color: white; text-decoration: none;"><?php bloginfo('name'); ?></a></h1>
</header>
