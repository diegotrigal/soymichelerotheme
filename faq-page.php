<?php /* Template Name: FAQ-Page */ ?>

<?php get_header(); ?>

<div id="faq" class="container-fluid section-three">
    <div class="background-overlay"></div>
    <div class="page-content container col-lg-5 col-sm-12 mt-5">

        <?php
        // Obtener todas las etiquetas de las FAQs
        $faq_tags = get_terms(array(
            'taxonomy' => 'faq_tag',
            'hide_empty' => false,
        ));

        if ($faq_tags):
            foreach ($faq_tags as $tag): ?>
                <h3 class="faq-title"><?php echo esc_html($tag->name); ?></h3>

                <?php
                // Obtener las preguntas asociadas a cada etiqueta
                $faq_query = new WP_Query(array(
                    'post_type' => 'faq',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'faq_tag',
                            'field' => 'slug',
                            'terms' => $tag->slug,
                        ),
                    ),
                    'posts_per_page' => -1,
                ));

                if ($faq_query->have_posts()):
                    while ($faq_query->have_posts()):
                        $faq_query->the_post(); ?>

                        <div class="card mt-2">
                            <div class="card-header">
                                <?php the_title(); // Título de la pregunta ?>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo apply_filters('the_content', get_the_content()); // Contenido o respuesta ?></p>
                            </div>
                        </div>

                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php else: ?>
                    <p><?php _e('No hay preguntas frecuentes disponibles en esta categoría.', 'soymichelero'); ?></p>
                <?php endif; ?>
            <?php endforeach;
        else: ?>
            <p><?php _e('No hay preguntas frecuentes disponibles.', 'soymichelero'); ?></p>
        <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>