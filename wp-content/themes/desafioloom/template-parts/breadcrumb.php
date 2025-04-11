<div class="breadcrumb-container theme1">
    <ul>
        <li><a href="<?php echo home_url(); ?>"><span>Home</span></a><span class="separator">&gt;</span></li>

        <?php if (is_home()) : ?>
        <li><span>Blog</span></li>

        <?php elseif (is_category()) : ?>
        <li><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><span>Blog</span></a><span
                class="separator">&gt;</span></li>
        <li><span><?php single_cat_title(); ?></span></li>

        <?php elseif (is_single() && get_post_type() === 'post') : ?>
        <li><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><span>Blog</span></a><span
                class="separator">&gt;</span></li>
        <?php
                $category = get_the_category();
                if (!empty($category)) :
                    $cat = $category[0];
            ?>
        <li><a
                href="<?php echo get_category_link($cat->term_id); ?>"><span><?php echo esc_html($cat->name); ?></span></a><span
                class="separator">&gt;</span></li>
        <?php endif; ?>
        <li><span><?php the_title(); ?></span></li>

        <?php elseif (is_page()) : 
            $ancestors = array_reverse(get_post_ancestors(get_the_ID()));
            foreach ($ancestors as $ancestor) {
                echo '<li><a href="' . get_permalink($ancestor) . '"><span>' . get_the_title($ancestor) . '</span></a><span class="separator">&gt;</span></li>';
            }
        ?>
        <li><span><?php the_title(); ?></span></li>

        <?php elseif (is_search()) : ?>
        <li><span>Busca por: "<?php echo get_search_query(); ?>"</span></li>

        <?php elseif (is_404()) : ?>
        <li><span>Página não encontrada</span></li>

        <?php endif; ?>
    </ul>
</div>