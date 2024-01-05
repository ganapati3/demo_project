<div class="wrap">
    <h1>Welcome to CPT Manager</h1>
    <?php settings_errors(); ?>

    <form action="options.php" method="post"> 
        <?php
            settings_fields("demo_plugin_cpt_settings");
            do_settings_sections('test_cpt');
            submit_button();
            ?>
    </form>
</div>
