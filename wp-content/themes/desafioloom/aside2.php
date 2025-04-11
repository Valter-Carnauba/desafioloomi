<aside class="col-xl-3 col-lg-4 offset-xl-1 offset-lg-0 aside">

    <!-- Mais lidas -->
    <section class="mais-lidas mb-4">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/midia/icon-arrow-up.svg" class="icon-arrow-up"
            alt="Ícone de seta">
        <h4>Mais lidas</h4>
        <ul>
            <?php
            $query = new WP_Query(array(
                'post_type' => 'noticia',
                'posts_per_page'=> 5
            ));

            $contador = 1;  
        ?>

            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); 
            $terms = get_the_terms(get_the_ID(), 'categoria_de_noticias');
        ?>
            <li>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <?php if ($terms && !is_wp_error($terms)) : ?>
                        <?php foreach($terms as $term) : ?>
                        <span class="one-category"><?php echo esc_html($term->name); ?></span>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <span class="one-category">Notícia</span>
                        <?php endif; ?>
                        <span class="one-number"><?php echo $contador; ?></span>
                    </div>

                    <h5><?php the_title(); ?></h5>
                    <div>
                        <small>
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
            </li>
            <?php $contador++; endwhile; endif; wp_reset_postdata(); ?>
        </ul>
    </section>

    <!-- Newsletter -->
    <section class="newsletter-container mb-4">
        <header class="newsletter-header">
            <div class="header-content">
                <div class="logo-container">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/midia/newsletter.svg" class="icon-arrow-up"
                        alt="Ícone de seta">
                </div>
                <button class="view-all-btn btn-base-invert">Ver todas</button>
            </div>
        </header>

        <hr class="divider" />

        <div class="content-section">
            <h4 class="main-title">As melhores de tecnologia B2B em primeira mão</h4>
            <p class="description">
                Selecione os assuntos abaixo e participe de nossa Newsletter
            </p>
        </div>

        <div class="categories-section">
            <button class="category-badge category-btn">Notícias</button>
            <button class="category-btn">Notícias</button>
            <button class="category-btn">Revistas</button>
            <button class="category-btn">Materiais</button>
            <button class="category-btn">Eventos</button>
            <button class="category-btn">Marketing</button>
            <button class="category-btn">Sustentabilidade</button>
        </div>

        <form class="newsletter-form">
            <div class="input-wrapper">
                <input type="email" placeholder="Inserir e-mail" class="email-input" aria-label="Email address" />
            </div>
            <button type="submit" class="btn-base-2 w-100">Cadastrar</button>
        </form>
    </section>

    <section class="social mb-4">
        <div class="d-flex justify-content-center gap-4">
            <a href="#" class="text-dark" target="_blank" title="">
                <span class="fa-stack fa-1x">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                </span>
            </a>
            <a href="#" class="text-dark" target="_blank" title="">
                <span class="fa-stack fa-1x">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-linkedin fa-stack-1x fa-inverse"></i>
                </span>
            </a>
            <a href="#" class="text-dark" target="_blank" title="">
                <span class="fa-stack fa-1x">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
                </span>
            </a>
            <a href="#" class="text-dark" target="_blank" title="">
                <span class="fa-stack fa-1x">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-tiktok fa-stack-1x fa-inverse"></i>
                </span>
            </a>
            <a href="#" class="text-dark" target="_blank" title="">
                <span class="fa-stack fa-1x">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-youtube fa-stack-1x fa-inverse"></i>
                </span>
            </a>
        </div>
    </section>

    <!-- Banner final -->
    <section class="mb-4">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/midia/evento.jpg" class="img-fluid"
            alt="Banner Inferior">
    </section>

    <section>
        <!-- Tags -->
        <div class="tags mb-4">
            <h4>Tags:</h4>
            <br />
            <div class="tags_content">
                <?php
            
            $tags = get_tags(array(
                'orderby' => 'count',
                'order' => 'DESC',
                'number' => 10 
            ));
            
            if ($tags) {
                foreach ($tags as $tag) {
                    echo '<a href="' . get_tag_link($tag->term_id) . '" title="' . esc_attr($tag->name) . '">';
                    echo '<div class="btn-base">' . esc_html($tag->name) . '</div>';
                    echo '</a>';
                }
            } else {
                echo '<p>Nenhuma tag disponível.</p>';
            }
            ?>
            </div>
        </div>

        <!-- Categorias -->
        <div class="tags">
            <h4>Categoria:</h4>
            <br />
            <div class="tags_content">
                <?php
                
                    $categories = get_categories(array(
                        'orderby' => 'count',
                        'order' => 'DESC',
                        'number' => 5 
                    ));
                    
                    if ($categories) {
                        foreach ($categories as $category) {
                            echo '<a href="' . get_category_link($category->term_id) . '" title="' . esc_attr($category->name) . '">';
                            echo '<div class="btn-base">' . esc_html($category->name) . '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo '<p>Nenhuma categoria disponível.</p>';
                    }
                ?>
            </div>
        </div>
    </section>

</aside>