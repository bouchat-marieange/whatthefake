<?php
/**
 * Fichier functions.php du thème personnalisé WhatTheFake
 * 
 * Ce fichier centralise toutes les configurations et fonctionnalités personnalisées du thème WordPress.
 * 
 * @package WhatTheFake
 * @author Marie-Ange Bouchat & Meryem Türköz
 */

// Sécurité : Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit; // Sortir si le fichier est appelé directement
}

/**
 * Configuration de base du thème
 * 
 * Cette fonction initialise les paramètres fondamentaux du thème WordPress
 */
function whatthefake_setup() {
    // Activer la génération automatique des balises de titre
    add_theme_support('title-tag'); // support de mon title tag

    // Activer le support des images à la une
    add_theme_support('post-thumbnails');// support du thumbnail sur mes articles

    add_theme_support('menus'); // support des menus par notre thème

    // Définir les tailles d'images personnalisées
    add_image_size('blog-thumbnail', 350, 230, true);
    add_image_size('full-width-image', 1200, 600, true);

    // Enregistrer les emplacements de menu
    register_nav_menus(array( // permet d'enregistrer plusieurs barres de navigation.(register_nav_menu (au singulier, ne permet que d'enregistrer une bar de navigation )
        'main-menu'   => __('Menu Principal', 'whatthefake'),
        'footer-menu' => __('Menu Pied de Page', 'whatthefake')
    ));

    // Activer la génération de HTML5 valide pour certains éléments
    add_theme_support('html5', array(
        'search-form', 
        'comment-form', 
        'comment-list', 
        'gallery', 
        'caption'
    ));
}
add_action('after_setup_theme', 'whatthefake_setup');

/**
 * Chargement des scripts et styles
 * 
 * Fonction qui charge les fichiers CSS et JavaScript nécessaires au thème
 */
function whatthefake_enqueue_scripts() {
    // Styles CSS
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.3.0');
    wp_enqueue_style('normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), '1.0.0');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/style.css', array('bootstrap', 'normalize'), filemtime(get_template_directory() . '/style.css'));
    
    // Scripts JavaScript
    wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);
    wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/functionswtf.js', array('jquery', 'bootstrap-bundle'), filemtime(get_template_directory() . '/assets/js/functionswtf.js'), true);

    // Activer le script de réponse aux commentaires si nécessaire
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'whatthefake_enqueue_scripts');

/**
 * Walker de menu personnalisé
 */
class Custom_Nav_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        
        $output .= "<li class='nav-item'>";
        
        $attributes = '';
        if (!empty($item->url)) {
            $attributes .= ' href="' . esc_attr($item->url) . '"';
        }
        
        $item_output = '<a class="nav-link text-white"' . $attributes . '>';
        $item_output .= $item->title;
        $item_output .= '</a>';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // Supprimer les puces de liste
    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}


/**
 * Initialisation des zones de widgets
 * 
 * Enregistre les emplacements où des widgets peuvent être placés
 */
function whatthefake_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar Principale', 'whatthefake'),
        'id'            => 'main-sidebar',
        'description'   => __('Widgets affichés dans la sidebar principale', 'whatthefake'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'whatthefake_widgets_init');

/**
 * Optimisations de performances
 * 
 * Fonctions pour améliorer les performances et la sécurité du site
 */
function whatthefake_performance_optimizations() {
    // Limiter le nombre de révisions de posts
    define('WP_POST_REVISIONS', 5);

    // Désactiver l'éditeur de fichiers depuis l'administration
    define('DISALLOW_FILE_EDIT', true);

    // Supprimer des meta-tags inutiles
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwp_head');
    remove_action('wp_head', 'rsd_link');
}
add_action('init', 'whatthefake_performance_optimizations');

/**
 * Personnalisations du thème
 * 
 * Fonctions pour ajouter des personnalisations spécifiques
 */
function whatthefake_custom_excerpt_length($length) {
    return 30; // Nombre de mots dans les extraits
}
add_filter('excerpt_length', 'whatthefake_custom_excerpt_length');

function whatthefake_excerpt_more($more) {
    return '...'; // Texte de fin d'extrait personnalisé
}
add_filter('excerpt_more', 'whatthefake_excerpt_more');

/**
 * Sécurité supplémentaire
 * 
 * Fonctions pour renforcer la sécurité du site WordPress
 */
function whatthefake_security_headers() {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
}
add_action('send_headers', 'whatthefake_security_headers');

/**
 * Personnalisation de l'administration
 * 
 * Modifications de l'interface d'administration WordPress
 */
function whatthefake_admin_footer_text() {
    echo 'Thème WhatTheFake développé avec ❤️ par Marie-Ange Bouchat';
}
add_filter('admin_footer_text', 'whatthefake_admin_footer_text');