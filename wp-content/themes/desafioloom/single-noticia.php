<?php /* Template Name: Modelo de single notícia */ ?>
<?php get_header(); ?>
<?php the_post(); ?>

<main class="fdez-news">
    <div class="container">
        <div class="row">

            <div class="col-md-12 mb-4">
                <div class="one-section">
                    <figure>
                        <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium_large', [
                                'class' => 'img-fluid',
                                'alt' => get_the_title()
                            ]); ?>
                        <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/midia/default-news.jpg"
                            alt="<?php the_title_attribute(); ?>" loading="lazy">
                        <?php endif; ?>
                        <figcaption>
                            <h1><?php the_title(); ?></h1>
                            <p><?php the_field('noticias_subtitulo'); ?></p>
                        </figcaption>
                    </figure>
                </div>
            </div>

            <div class="col-md-12 mb-4">
                <div class="two-section">
                    <div class="one-box">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/midia/logo-antes-da-ti.svg"
                            alt="Logo antes da ti">
                        <div>
                            <h3><strong>Inscrições:</strong> de 17 de outubro a 20 de dezembro</h3>
                            <h3><strong>Premiação:</strong> N/A</h3>
                        </div>
                    </div>
                    <button class="btn-base-2">Inscreva-se</button>
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 mb-4">
                <article class="three-section">
                    <div class="fdez-tempo-leitura">Tempo estimado de leitura:
                        <?php the_field('noticia_tempo_estimado_de_leitura'); ?></div>
                    <?php the_field('noticia_corpo_da_noticia'); ?>
                </article>

                <div class="only-btn">
                    <?php 
                        $link = get_field('noticia_btn_1');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn-base-2" href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>


                <div class="card shadow-sm p-4 mb-4 four-section">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Precisa de mais informações?</h5>
                        <p class="card-text">Entre em contato para melhor entender as suas necessidades</p>
                        <div class="info">
                            <div class="d-flex align-items-center gap-4">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/midia/icon-user-sharing.svg"
                                    alt="Ícone de usuário">
                                <p>Georges Nabahan</p>
                            </div>

                            <?php 
                                $link = get_field('noticia_btn_2');
                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="btn-base-2" href="<?php echo esc_url( $link_url ); ?>"
                                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Conteúdo lateral -->
            <?php include 'aside.php'; ?>

            <div class="five-section">
                <div class="one-box">
                    <h2>Todos os materiais</h2>

                    <div class="d-flex gap-4 mb-4">
                        <!-- Select Ano -->
                        <div class="input-group">
                            <select class="form-select filter-dropdown year-filter" id="selectAno">
                                <option value="">Selecione o ano</option>
                                <?php
                                    global $wpdb;
                                    $anos = $wpdb->get_col("
                                        SELECT DISTINCT YEAR(post_date) 
                                        FROM {$wpdb->prefix}posts 
                                        WHERE post_type = 'noticia' 
                                        AND post_status = 'publish' 
                                        ORDER BY post_date DESC
                                    ");
                                    foreach ($anos as $ano) {
                                        echo "<option value='{$ano}'>{$ano}</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <!-- Select Categoria -->
                        <div class="input-group">
                            <select class="form-select filter-dropdown year-filter" id="selectCategoria">
                                <option value="">Selecionar categoria</option>
                                <?php
                                $categorias = get_terms([
                                    'taxonomy' => 'categoria_de_noticias',
                                    'hide_empty' => true
                                ]);
                                foreach ($categorias as $categoria) {
                                    echo "<option value='{$categoria->slug}'>{$categoria->name}</option>";
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="more-material">
                    <div class="row">
                        <?php $query = new WP_Query(array('post_type' => 'noticia','posts_per_page'=> -1)); ?>
                        <?php if ($query->have_posts()) : while( $query->have_posts()) : $query->the_post(); ?>
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/midia/img-materia.jpg"
                                        class="card-img-top" alt="Imagem da matéria">
                                    <div class="card-body">
                                        <?php if ($terms && !is_wp_error($terms)) : ?>
                                        <?php foreach($terms as $term) : ?>
                                        <span class="category"><?php echo esc_html($term->name); ?></span>
                                        <?php endforeach; ?>
                                        <?php else : ?>
                                        <span class="category">Notícia</span>
                                        <?php endif; ?>
                                        <h4 class="card-title"><?php the_title(); ?></h4>
                                        <p class="card-text"><?php the_field('noticias_subtitulo'); ?></p>
                                        <small>
                                            Publicado:
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
                                    ?></small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </div>
                </div>

                <button id="btnVerMais" class="btn-base-invert">
                    Ver mais
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>