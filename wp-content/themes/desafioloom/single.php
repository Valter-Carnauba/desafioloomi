<?php /* Template Name: Modelo de single notícia atualizado */ ?>
<?php get_header(); ?>
<?php the_post(); ?>

<main class="fdez-news single-new">
    <div class="container">
        <div class="row">

            <?php get_template_part('template-parts/breadcrumb'); ?>

            <div class="col-md-12 mb-4">
                <div class="one-section">
                    <figure>
                        <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium_large', [
                                'class' => 'img-fluid mb-5',
                                'alt' => get_the_title()
                            ]); ?>
                        <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/midia/default-news.jpg"
                            alt="<?php the_title_attribute(); ?>" loading="lazy">
                        <?php endif; ?>
                        <figcaption>
                            <h1><?php the_title(); ?></h1>
                            <!-- <p><?php the_field('noticias_subtitulo'); ?></p> -->
                            <p>Pesquisadores da Check Point Research (CPR) apontam que 22% de todos os anexos de e-mails
                                maliciosos agora estão sendo enviados no formato PDF
                            </p>
                        </figcaption>
                    </figure>
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 mb-4">
                <article class="three-section">
                    <div class="fdez-tempo-leitura">Tempo estimado de leitura: <?php the_field('noticia_tempo_estimado_de_leitura'); ?></div>
                    <?php the_content(); ?>
 
                    <?php
                        $autor_id = get_the_author_meta('ID');
                        $autor_nome = get_the_author();
                        $autor_descricao = get_the_author_meta('description');
                        $autor_link = get_author_posts_url($autor_id);
                        $autor_avatar = get_avatar_url($autor_id, ['size' => 120]);
                    ?>

                    <div class="author-container gap-5">
                        <img src="<?php echo esc_url($autor_avatar); ?>" class="one-autor"
                            alt="Foto de <?php echo esc_attr($autor_nome); ?>">

                        <div class="author-info">
                            <div class="author-name"><?php echo esc_html($autor_nome); ?></div>

                            <div class="author-description">
                                <p><?php echo esc_html($autor_descricao); ?></p>
                            </div>

                            <div class="author-social">
                                <div>
                                    <a href="<?php echo esc_url($autor_link); ?>" class="btn-base">Ver Perfil</a>
                                </div>

                                <div class="social-links">
                                    <?php
                    
                                        $facebook = get_the_author_meta('facebook', $autor_id);
                                        $twitter = get_the_author_meta('twitter', $autor_id);
                                        $linkedin = get_the_author_meta('linkedin', $autor_id);

                                        if ($facebook) :
                                    ?>
                                    <a class="social-link" href="<?php echo esc_url($facebook); ?>" target="_blank">
                                        <img class="social-icon" src="URL_DO_ICONE_FACEBOOK.svg" alt="Facebook">
                                    </a>
                                    <?php endif; ?>

                                    <?php if ($twitter) : ?>
                                    <a class="social-link" href="<?php echo esc_url($twitter); ?>" target="_blank">
                                        <img class="social-icon" src="URL_DO_ICONE_TWITTER.svg" alt="Twitter">
                                    </a>
                                    <?php endif; ?>

                                    <?php if ($linkedin) : ?>
                                    <a class="social-link" href="<?php echo esc_url($linkedin); ?>" target="_blank">
                                        <img class="social-icon" src="URL_DO_ICONE_LINKEDIN.svg" alt="LinkedIn">
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </article>
            </div>

            <!-- Conteúdo lateral -->
            <?php include 'aside2.php'; ?>

            <div class="five-section">
                <div class="one-box">
                    <h2>Todos os materiais</h2>

                    <div class="d-flex gap-4 mb-4">
                        <!-- Select Ano -->
                        <div class="input-group">
                            <select class="form-select filter-dropdown year-filter" id="selectAno">
                                <option selected>Selecione o ano</option>
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>

                        <!-- Select Categoria -->
                        <div class="input-group">
                            <select class="form-select filter-dropdown year-filter" id="selectCategoria">
                                <option selected>Selecionar categoria</option>
                                <option value="negocios">Negócios</option>
                                <option value="lideranca">Liderança</option>
                                <option value="carreira">Carreira</option>
                                <option value="inteligencia">Inteligência Artificial</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="more-material">
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <a href="" title="">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/midia/img-materia.jpg"
                                        class="card-img-top" alt="Imagem da matéria">
                                    <div class="card-body">
                                        <div class="category">Diversidade na ti</div>
                                        <h4 class="card-title">Título do estudo</h4>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipiscing elit
                                            nulla adipiscing.Lorem ipsum...</p>
                                        <small>Publicado: 20/06/2024 às 18:30</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <a href="" title="">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/midia/img-materia.jpg"
                                        class="card-img-top" alt="Imagem da matéria">
                                    <div class="card-body">
                                        <div class="category">Diversidade na ti</div>
                                        <h4 class="card-title">Título do estudo</h4>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipiscing elit
                                            nulla adipiscing.Lorem ipsum...</p>
                                        <small>Publicado: 20/06/2024 às 18:30</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <a href="" title="">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/midia/img-materia.jpg"
                                        class="card-img-top" alt="Imagem da matéria">
                                    <div class="card-body">
                                        <div class="category">Diversidade na ti</div>
                                        <h4 class="card-title">Título do estudo</h4>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipiscing elit
                                            nulla adipiscing.Lorem ipsum...</p>
                                        <small>Publicado: 20/06/2024 às 18:30</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <a href="" title="">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/midia/img-materia.jpg"
                                        class="card-img-top" alt="Imagem da matéria">
                                    <div class="card-body">
                                        <div class="category">Diversidade na ti</div>
                                        <h4 class="card-title">Título do estudo</h4>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipiscing elit
                                            nulla adipiscing.Lorem ipsum...</p>
                                        <small>Publicado: 20/06/2024 às 18:30</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <a href="" title="">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/midia/img-materia.jpg"
                                        class="card-img-top" alt="Imagem da matéria">
                                    <div class="card-body">
                                        <div class="category">Diversidade na ti</div>
                                        <h4 class="card-title">Título do estudo</h4>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipiscing elit
                                            nulla adipiscing.Lorem ipsum...</p>
                                        <small>Publicado: 20/06/2024 às 18:30</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <a href="" title="">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/midia/img-materia.jpg"
                                        class="card-img-top" alt="Imagem da matéria">
                                    <div class="card-body">
                                        <div class="category">Diversidade na ti</div>
                                        <h4 class="card-title">Título do estudo</h4>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipiscing elit
                                            nulla adipiscing.Lorem ipsum...</p>
                                        <small>Publicado: 20/06/2024 às 18:30</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <a href="" title="">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/midia/img-materia.jpg"
                                        class="card-img-top" alt="Imagem da matéria">
                                    <div class="card-body">
                                        <h3 class="card-title">Card title</h3>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                        <small>Publicado: 20/06/2024 às 18:30</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <a href="" title="">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/midia/img-materia.jpg"
                                        class="card-img-top" alt="Imagem da matéria">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up
                                            the bulk of the card's content.</p>
                                        <small>Publicado: 20/06/2024 às 18:30</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn-base-invert">
                    Ver mais
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>

        </div>
    </div>
</main>

<?php get_footer(); ?>