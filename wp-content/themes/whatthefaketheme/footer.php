<footer>
    <!-- Taskbar de navigation mobile (sticky en bas, uniquement pour xs) -->
    <nav class="navbar fixed-bottom d-md-none" style="background-color: #330066;">
        <div class="container-fluid justify-content-around">
            <a href="#" class="nav-icon text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_icones/Cup.svg" alt="Classement" height="24">
            </a>
            <a href="#" class="nav-icon text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_icones/Gamepad.svg" alt="Jeux" height="24">
            </a>
            <a href="#" class="nav-icon text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_icones/Gift.svg" alt="Récompenses" height="24">
            </a>
            <a href="#" class="nav-icon text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_icones/Notes.svg" alt="Notes" height="24">
            </a>
            <a href="#" class="nav-icon text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_icones/User Rounded.svg" alt="Profil" height="24">
            </a>
        </div>
    </nav>

    <?php wp_footer(); ?>
</footer>
</body>
</html>