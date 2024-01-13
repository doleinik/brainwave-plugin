<?php

class pluginDashboardBrainWave
{
    public function displayPluginAdminDashboard()
    { ?>
      <h1>Це плагін для сворення кастомних блоків</h1>
    <?php }

    public function displayPluginDocs()
    {
        include 'plugin-docs.php';
   }

    public function statusPlugin($name, $file, $slug = '')
    {
        $plugin_path = trailingslashit(WP_PLUGIN_DIR) . $file;

        if (file_exists($plugin_path)) {
            if (!in_array($file, apply_filters('active_plugins', get_option('active_plugins')))) {
                $activation_url = wp_nonce_url(admin_url("plugins.php?action=activate&plugin=$file"), "activate-plugin_$file");
                echo '<div class="notice notice-error"><p>Для использования функциональности плагина "' . $name . '", пожалуйста, активируйте его:</p>';
                echo '<p><a href="' . esc_url($activation_url) . '" class="button button-primary">Активировать ' . $name . '</a></p></div>';
                return false;
            }
        } else {
            if ($slug != '') {
                $plugin_slug = 'webp-express';

                $install_url = wp_nonce_url(
                    add_query_arg(
                        array(
                            'action' => 'install-plugin',
                            'plugin' => $plugin_slug,
                        ),
                        admin_url('update.php')
                    ),
                    'install-plugin_' . $plugin_slug
                );
                echo '<div class="notice notice-error"><p>Для использования функциональности плагина "' . $name . '", пожалуйста, активируйте его:</p>';
                echo '<p><a href="' . esc_url($install_url) . '" class="button button-primary">Установить и активировать плагин ' . $name . '</a></p></div>';
            }

            if ($file === 'advanced-custom-fields-pro/acf.php') { ?>
              <div class="notice notice-error"><p>Установить и активировать плагин</p>';
                <a href="https://www.advancedcustomfields.com/pr" class="button button-primary">Advanced Custom Fields
                  Pro</a>
              </div>
                <?php
            }
//            return false;
        }
        return true;
    }

    public function showErrorTitile()
    { ?>
      <script>
          setTimeout(() => {
              let title = document.querySelector('#toplevel_page_brainwave .wp-menu-name');
              if (title.querySelectorAll('span').length === 0) {
                  title.innerHTML = title.innerHTML + '<span class="update-plugins">!</span>';
              }
          }, 1000);
      </script>
        <?php
    }
}


function my_plugin_add_admin_menu()
{
    $plugin_dashboard = new pluginDashboardBrainWave();

    add_menu_page(
        'brainwave',
        'BrainWave',
        'administrator',
        'brainwave',
        array($plugin_dashboard, 'displayPluginAdminDashboard'),
        'dashicons-shortcode',
        2
    );
    add_submenu_page(
        'brainwave',
        'Документація',
        'Документація',
        'administrator',
        'brainwave-docs',
        array($plugin_dashboard, 'displayPluginDocs')
    );
}

function cacheError()
{
    $plugin_dashboard = new pluginDashboardBrainWave();

    $acf = $plugin_dashboard->statusPlugin('Advanced Custom Fields Pro', 'advanced-custom-fields-pro/acf.php');
//    $webp = $plugin_dashboard->statusPlugin('Webp Express', 'webp-express/webp-express.php', 'webp-express');

    if (!$acf) {
        $plugin_dashboard->showErrorTitile();
    }
}

add_action('admin_menu', 'my_plugin_add_admin_menu');
add_action('admin_init', 'cacheError');