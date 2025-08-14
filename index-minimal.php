<?php get_header(); ?>

<div style="padding: 20px; font-family: Arial, sans-serif;">
    <h1>Tema Aromas - Working!</h1>
    <p>This is a test to verify the theme is loading correctly.</p>
    
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article>
                <h2><?php the_title(); ?></h2>
                <div><?php the_content(); ?></div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p>No posts found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
