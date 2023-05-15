<?php

add_action('wp_loaded', function () {

  if ($active_plugins = get_option('active_plugins', array())) {

    foreach ($active_plugins as $key => $active_plugin) {

      if (strstr($active_plugin, '/index.php')) {

        $active_plugins[$key] = str_replace('/index.php', '/storefront-footer.php', $active_plugin);

      }
    }

    update_option('active_plugins', $active_plugins);
  }
});
