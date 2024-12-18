<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header>
    <!-- Navbar desktop (md et +, masquée en sm) -->
    <nav class="navbar navbar-expand-md navbar-light sticky-top d-none d-md-flex" style="background-color: #330066; height: 60px;">
        <div class="container-fluid">
            <!-- Logo long -->
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_icones/logo_long.svg" alt="<?php bloginfo('name'); ?>" height="40">
            </a>

            <!-- Bouton de navigation mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu de navigation avec icônes -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto d-flex align-items-center">
                    <?php 
                    // Récupération des éléments du menu principal
                    $current_page_id = get_queried_object_id();
                    $menu_items = wp_get_nav_menu_items('main-menu');
                    if ($menu_items) {
                        foreach ($menu_items as $item) {
                            // Déterminer l'icône en fonction du titre du menu
                            $icon = '';
                            switch (strtolower($item->title)) {
                                case 'jeux':
                                    $icon = 'Gamepad.svg';
                                    break;
                                case 'ressources':
                                    $icon = 'Notes.svg';
                                    break;
                                case 'classement':
                                    $icon = 'Cup.svg';
                                    break;
                                case 'récompenses':
                                    $icon = 'Gift.svg';
                                    break;
                                case 'profil':
                                    $icon = 'User Rounded.svg';
                                    break;
                            }
                            
                            // Ajouter la classe 'active' si la page courante correspond à l'élément de menu
                            $is_active = ($current_page_id == $item->object_id) ? 'active' : '';
                            
                            echo '<li class="nav-item">';
                            echo '<a href="' . esc_url($item->url) . '" class="nav-icon ' . $is_active . '">';
                            if ($icon) {
                                echo '<img src="' . get_template_directory_uri() . '/assets/img/logo_icones/' . $icon . '" alt="' . esc_attr($item->title) . '" height="24">';
                            }
                            echo '</a>';
                            echo '</li>';
                        }
                    }
                    ?>

                    <!-- Score -->
                    <li class="nav-item ms-3">
                        <div class="text-white d-flex align-items-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_icones/coin.svg" alt="Points" height="20">
                            <span class="ms-2">0 pts</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Navbar mobile (xs à sm) -->
    <nav class="navbar d-md-none sticky-top" style="background-color: #330066; height: 50px;">
        <div class="container-fluid">
            <!-- Logo court pour mobile -->
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_icones/logo_haut.svg" alt="<?php bloginfo('name'); ?>" height="30">
            </a>

            <!-- Score en mobile -->
            <div class="text-white">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_icones/coin.svg" alt="Points" height="20">
                <span>0 pts</span>
            </div>
        </div>
    </nav>
</header>

<main>