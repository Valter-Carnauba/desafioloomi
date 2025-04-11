<?php get_header(); ?>

<main class="fdez-home-news">
    <div class="container">
        <div class="row">
            <!-- Seção de hero -->
            <section class="fdez-hero">
                <div class="container">
                    <div class="swiper-container swiper-main">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <figure>
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/midia/banner.jpg"
                                        alt="Banner destaque">
                                </figure>
                            </div>
                            <div class="swiper-slide">
                                <figure>
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/midia/banner.jpg"
                                        alt="Banner destaque">
                                </figure>
                            </div>
                        </div>
                        <!-- Adicionar pagination -->
                        <!-- <div class="swiper-pagination"></div> -->
                        <!-- Adicionar arrows -->
                        <!-- <i class="fas fa-chevron-left"></i>
                    <i class="fas fa-chevron-right"></i> -->
                    </div>
                </div>
            </section>

            <!-- Seção de notícias -->
            <section class="col-xl-8 col-lg-8">
                <h1>Todas as notícias</h1>

                <?php $query = new WP_Query(array('post_type' => 'noticia','posts_per_page'=> -1)); ?>
                <?php if ($query->have_posts()) : while( $query->have_posts()) : $query->the_post(); 
                $terms = get_the_terms(get_the_ID(), 'categoria_de_noticias');
                ?>

                <article class="d-flex gap-5 mb-5">
                    <div>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large', [
                                'class' => 'img-fluid',
                                'alt' => get_the_title()
                            ]); ?>
                            <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/midia/default-news.jpg"
                                class="img-fluid" alt="<?php the_title_attribute(); ?>" loading="lazy">
                            <?php endif; ?>
                        </a>
                    </div>
                    <div>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php if ($terms && !is_wp_error($terms)) : ?>
                            <?php foreach($terms as $term) : ?>
                            <span class="one-category"><?php echo esc_html($term->name); ?></span>
                            <?php endforeach; ?>
                            <?php else : ?>
                            <span class="one-category">Notícia</span>
                            <?php endif; ?>

                            <h3><?php the_title(); ?></h3>
                            <p><?php the_field('noticias_subtitulo'); ?></p>
                            <div class="d-flex align-items-center justify-content-between">
                                <small class="one-info">
                                    <?php echo get_the_author(); ?>
                                </small>

                                <small class="two-info">
                                    <?php
                                        $post_date = get_the_date('Y-m-d H:i:s');
                                        $post_datetime = new DateTime($post_date);
                                        $now = new DateTime();
                                        $interval = $now->diff($post_datetime);
                                        $horas = ($interval->days * 24) + $interval->h;

                                        if ($horas < 24) {
                                            echo $horas . ' horas atrás';
                                        } else {
                                            echo $post_datetime->format('d/m/Y \à\s H:i');
                                        }
                                    ?>

                                </small>
                            </div>
                        </a>
                    </div>
                </article>
                <?php endwhile; endif; wp_reset_postdata(); ?>

                <!-- Pagination -->
                <nav class="pagination" aria-label="Page navigation">
                    <button class="pagination-button pagination-nav" aria-label="First page">
                        <i class="fas fa-angle-double-left"></i>
                    </button>

                    <button class="pagination-button pagination-nav" aria-label="Previous page">
                        <i class="fas fa-angle-left"></i>
                    </button>

                    <button class="pagination-button pagination-page active" aria-current="page">1</button>
                    <button class="pagination-button pagination-page">2</button>
                    <button class="pagination-button pagination-page">3</button>

                    <span class="pagination-ellipsis">...</span>

                    <button class="pagination-button pagination-page">10</button>

                    <button class="pagination-button pagination-nav" aria-label="Next page">
                        <i class="fas fa-angle-right"></i>
                    </button>

                    <button class="pagination-button pagination-nav" aria-label="Last page">
                        <i class="fas fa-angle-double-right"></i>
                    </button>
                </nav>
            </section>

            <!-- Conteúdo lateral -->
            <?php include 'aside.php'; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>