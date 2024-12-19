<?php
/**
 * Template pour le footer avec menu dynamique
 * Ce fichier gère l'affichage du menu de navigation en bas de page pour les appareils mobiles
 */
?>
<footer>
    <!-- Taskbar de navigation mobile (sticky en bas, uniquement pour xs) -->
    <nav class="navbar fixed-bottom d-md-none" style="background-color: #330066;">
        <div class="container-fluid justify-content-around">
            <?php 
            // Récupération des éléments du menu principal
            $menu_items = wp_get_nav_menu_items('main-menu');

            if ($menu_items) {
                foreach ($menu_items as $item) {
                    // Déterminer l'icône en fonction du titre du menu
                    $icon = '';
                    $original_title = strtolower($item->title);
                    
                    // Association des titres de menu avec leurs icônes correspondantes
                    switch ($original_title) {
                        case 'challenge':
                            $icon = 'Gamepad.svg';
                            break;
                        case 'ressources':
                            $icon = 'Notes.svg';
                            break;
                        case 'bonus':
                            $icon = 'Bonus.svg';
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
                    
                    // Génération des liens du menu avec leurs icônes
                    if ($icon) {
                        echo '<a href="' . esc_url($item->url) . '" class="nav-icon text-center">';
                        echo '<img src="' . get_template_directory_uri() . '/assets/img/logo_icones/' . $icon . '" alt="' . esc_attr($item->title) . '" height="24">';
                        echo '</a>';
                    }
                }
            }
            ?>
        </div>
    </nav>

    <?php wp_footer(); // Inclusion des scripts et styles WordPress nécessaires ?>
</footer>
</body>
</html>