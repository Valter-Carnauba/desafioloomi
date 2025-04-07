<?php
    // Carregamento dos estilos e scripts do tema pai e filho
    function carrega_estilos() {
        wp_enqueue_style('estilos-pai', get_template_directory_uri() . '/style.css');
        wp_enqueue_style('estilos-filho', get_stylesheet_directory_uri() . '/css/style.css');
        wp_enqueue_style('estilos-media', get_stylesheet_directory_uri() . '/css/media.css');

        wp_enqueue_script('jquery-pai', get_stylesheet_directory_uri() . '/js/jquery-3.7.1.min.js', array('jquery'), false, true);
        wp_enqueue_script('main-pai', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), false, true);
    }
    add_action('wp_enqueue_scripts', 'carrega_estilos');

    // Remover barra do admin no front-end
    add_filter('show_admin_bar', '__return_false');

    // Permitir upload de SVG e WebP
    function custom_mime_types($mimes) {
        $mimes['svg']  = 'image/svg+xml';
        $mimes['webp'] = 'image/webp';
        return $mimes;
    }
    add_filter('upload_mimes', 'custom_mime_types');

    // Sanitizar SVGs durante o upload com validação
    function sanitize_svg_upload($file) {
        if ($file['type'] === 'image/svg+xml') {
            $svg_content = file_get_contents($file['tmp_name']);

            // Remove scripts e atributos perigosos
            $svg_content = preg_replace('/<script.*?<\/script>/is', '', $svg_content);
            $svg_content = preg_replace('/on\w+="[^"]*"/i', '', $svg_content);
            $svg_content = preg_replace('/javascript:/i', '', $svg_content);

            // Reescreve o conteúdo limpo no arquivo temporário
            file_put_contents($file['tmp_name'], $svg_content);
        }

        return $file;
    }
    add_filter('wp_handle_upload_prefilter', 'sanitize_svg_upload');
?>
