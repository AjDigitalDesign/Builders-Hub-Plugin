<div class="builder_hub_wrapper">

    <div class=" builders_hub_setting_alert alert alert-success" role="alert">
        <?php settings_errors(); ?>
    </div>


    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1">Manage Settings</a></li>
        <li><a href="#tab-2">Manage Settings</a></li>
        <li><a href="#tab-3">Manage Settings</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-pane active">
            <form method="post" action="options.php">
                <div class="mb-3">
                    <?php
                    settings_fields('builders_hub_group');
                    do_settings_sections('builders_hub');
                    submit_button();
                    ?>
                </div>
            </form>
        </div>
        <div id="tab-2" class="tab-pane">
            <h1>Tab 2</h1>
        </div>
        <div id="tab-3" class="tab-pane">
            <h1>Tab 2</h1>
            <?php

            ?>
        </div>
    </div>
</div>