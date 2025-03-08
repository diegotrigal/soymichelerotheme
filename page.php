<?php /* Template Name: Pagina generica */ ?>

<?php get_header(); ?>

<div id="faq" class="container-fluid section-three">
    <div class="background-overlay"></div>
    <div class="page-content container col-lg-5 col-sm-12 mt-5">
        <?php
        // This function will display the content you add in the WordPress page editor
        while (have_posts()):
            the_post();
            the_content();
        endwhile;
        ?>
    </div>

</div>

<?php get_footer(); ?>