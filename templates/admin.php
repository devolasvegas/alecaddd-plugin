<div class="wrap">
    <h1>Alecad Tutorial Plugin</h1>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php
            settings_fields('alecad_options_group');
            do_settings_sections('alecad_plugin');
            submit_button();
        ?>
    </form>
</div>
