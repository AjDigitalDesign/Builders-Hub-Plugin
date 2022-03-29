<div class="builder_hub_wrapper">
    <?php settings_errors(); ?>

    <ul class="db_nav db_nav-tabs">
        <li class="db_active"><a href="#tab-1">Manage Settings</a></li>
        <li><a href="#tab-2">Feed Settings</a></li>
        <li><a href="#tab-3">Manage Settings</a></li>
    </ul>

    <div class="db_tab-content">
        <div id="tab-1" class="db_tab-pane db_active">
            <form method="post" action="options.php">

                    <?php
                    settings_fields('builders_hub_settings');
                    do_settings_sections('builders_hub');
                    submit_button();
                    ?>

            </form>
        </div>
        <div id="tab-2" class="db_tab-pane">
            <form method="post" action="options.php">

                <?php
                settings_fields('builders_hub_settings_feed');
                do_settings_sections('builders_hub_feed');
                submit_button();
                ?>

            </form>
        </div>
        <div id="tab-3" class="db_tab-pane">
            <h1>Tab 3</h1>
            <?php

            ?>
        </div>
    </div>
</div>