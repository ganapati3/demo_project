<div class="wrap">
    <h1>Welcome to this world</h1>
    <?php settings_errors(); ?>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1">Manage Settings</a></li>
        <li><a href="#tab-2">Updates</a></li>
        <li><a href="#tab-3">About</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-pane active">
            <form action="options.php" method="post"> 
            <?php
                settings_fields("demo_plugin_settings");
                do_settings_sections("test_plugin");
                submit_button();
                ?>
            </form>
        </div>
        <div id="tab-2" class="tab-pane">
            <p>Updates</p>
        </div>

        <div id="tab-3" class="tab-pane">
            <p>About</p>
        </div>
    </div>
    
</div>
