<?php
// Cabeçalho para compartilhamento
function fb_opengraph() {
    global $post;

    if(is_single()) {
        if(has_post_thumbnail($post->ID)) {
            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', true );
            $img_src = $img_src[0];
        } else {
            $img_src = get_stylesheet_directory_uri() . '/assets/img/logotipo.svg';
        }
        if($excerpt = get_the_excerpt()) {
            $excerpt = strip_tags(get_the_excerpt());
            $excerpt = str_replace("", "'", $excerpt);
        } else {
            $excerpt = get_bloginfo('description');
        }
?>
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $img_src; ?>"/>
    <meta name="twitter:title" content="<?php echo the_title(); ?>">
    <meta name="twitter:description" content="<?php echo $excerpt; ?>">
    <meta name="twitter:image" content="<?php echo $img_src; ?>">
    <meta name="msapplication-TileImage" content="<?php echo $img_src; ?>">

<?php
    } else {
        return;
    }
}
add_action('wp_head', 'fb_opengraph', 5);

//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
        return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
    }
add_filter('language_attributes', 'add_opengraph_doctype');
 
/* LOGO DO LOGIN PERSONNALIZADO
----------------------------------------------- */
function page_login_logo(){
    echo "<style>body.login #login h1 {background: radial-gradient(#000000, transparent);}body.login #login h1 a { background: url('".get_stylesheet_directory_uri()."/assets/img/logotipo.svg') center center no-repeat; height:100px; width:320px;margin:0;}</style>\n";
}
add_action("login_head", "page_login_logo");

/* LINK DO LOGO DO LOGIN PARA PÁGINA INICIAL
----------------------------------------------- */
function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

/* TITULOS DO LOGO NO LINK
----------------------------------------------- */
function my_login_logo_url_title() {
    $nomeSite = get_bloginfo('name');
    return $nomeSite;
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );

/* REMOVE BARRA DO ADMIN
----------------------------------------------- */
add_filter( 'show_admin_bar', '__return_false' );

/* REMOVE ITENS DESNECESSARIOS
----------------------------------------------- */
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {
    global $wp_meta_boxes;
    //Recent Comments
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    //Incoming Links
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    //Plugins - Popular, New and Recently updated WordPress Plugins
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    //Wordpress Development Blog Feed
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    //Other WordPress News Feed
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    //Quick Press Form
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    //Recent Drafts List
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
}

/* REMOVE ITENS DO HEAD
----------------------------------------------- */
remove_action('wp_head', 'rel_canonical'); //remove links canonicos
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Removes the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Removes links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link'); // Removes the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link'); // Removes the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link'); // Removes the index link
remove_action( 'wp_head', 'parent_post_rel_link'); // Removes the prev link
remove_action( 'wp_head', 'start_post_rel_link'); // Removes the start link
remove_action( 'wp_head', 'adjacent_posts_rel_link'); // Removes the relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator'); // Removes the WordPress version i.e. 
remove_action('wp_head', 'print_emoji_detection_script', 7); // remove wp Eemoji
remove_action('wp_print_styles', 'print_emoji_styles'); // remove wp Eemoji
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); // remove wp Eemoji
remove_action( 'admin_print_styles', 'print_emoji_styles' ); // remove wp Eemoji

/* Ativar miniatura de posts
----------------------------------------------- */
add_theme_support('post-thumbnails');

/* Resumo para páginas
----------------------------------------------- */
add_action( 'init', 'bl_excerpts_pages' );
function bl_excerpts_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
/* REMOVE SCRIPTS E CSS CONTACT FORM NÃO UTILIZADOS
----------------------------------------------- */
add_filter( 'wpcf7_validate_configuration', '__return_false' );
add_action( 'wp_enqueue_scripts', 'ac_remove_cf7_scripts' );
function ac_remove_cf7_scripts() {
    wp_deregister_style( 'contact-form-7' );
    wp_deregister_script( 'contact-form-7' );
} 

/* LIMITAÇÃO DO RESUMO DOS POSTS
----------------------------------------------- */
function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    } 
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}
 
/* Retorna o nome ou slug da taxonomia dentro taxonomy.php */
// echo $taxname = taxname('categorias');
function taxname($taxonomia){
    $terms = get_the_terms( get_the_ID() , $taxonomia);
    if($terms) {
        foreach( $terms as $term ) {
            $resultado = $term->name;
        }
    }
    return $resultado;
} 

function taxslug($taxonomia){
    $terms = get_the_terms( get_the_ID() , $taxonomia);
    if($terms) {
        foreach( $terms as $term ) {
            $resultado = $term->slug;
        }
    }
    return $resultado;
}

/* Retorna o nome ou slug da taxonomia fora taxonomy.php */
// echo $taxname = taxname('categorias');
function taxlistname($taxonomia){
    $terms = get_terms(['taxonomy' => $taxonomia,]);

    if ( false !== $terms ) {
        foreach ( $terms as $term ) {
            $resultado = $term->name;     
        }
    }
    return $resultado;
}

function taxlistslug($taxonomia){
    $terms = get_terms(['taxonomy' => $taxonomia,]);

    if ( false !== $terms ) {
        foreach ( $terms as $term ) {
            $term_link = get_term_link( $term, 'categoria_de_produtos' );     
        }
    }
    return $term_link;
}

add_action('wp_footer', function () {
    ?>
    <script>
        var ajaxurl = '<?php echo admin_url("admin-ajax.php"); ?>';
    </script>
    <?php
});


add_action('wp_ajax_filtrar_noticias', 'filtrar_noticias_callback');
add_action('wp_ajax_nopriv_filtrar_noticias', 'filtrar_noticias_callback');

function filtrar_noticias_callback() {
    $ano = isset($_POST['ano']) ? intval($_POST['ano']) : '';
    $categoria = isset($_POST['categoria']) ? sanitize_text_field($_POST['categoria']) : '';
    $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
    $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 4;

    $args = [
        'post_type' => 'noticia',
        'posts_per_page' => $posts_per_page,
        'offset' => $offset,
        'post_status' => 'publish'
    ];

    if ($ano) {
        $args['date_query'][] = [
            'year' => $ano
        ];
    }

    if ($categoria) {
        $args['tax_query'][] = [
            'taxonomy' => 'categoria_de_noticias',
            'field' => 'slug',
            'terms' => $categoria
        ];
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $terms = get_the_terms(get_the_ID(), 'categoria_de_noticias');
            ?>
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
                                ?>
                            </small>
                        </div>
                    </a>
                </div>
            </div>
            <?php
        endwhile;
    else :
        echo '<p class="text-center">Nenhuma notícia encontrada.</p>';
    endif;

    wp_die();
}

?>