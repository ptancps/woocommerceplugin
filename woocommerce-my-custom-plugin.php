<?php
/**
* Plugin Name: CPS
* Plugin URI: https://www.cpscentral.com/
* Description: CPS Central
* Version: 1.0
* Author:cps
* Author URI: https://www.cpscentral.com/
**/
define(appUrl, " https://0428-2603-7000-3000-2c-f420-2f9b-a6e2-d80e.ngrok.io");
define(storehash, "g9qr0e4d1v");

function wpb_hook_javascript() {
    ?>
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="http://localhost:3551/admside/js/woocommerce/vendor_product_warranty_woocommerce_cart.js">
        
        </script>
  <script src="http://localhost:3551/admside/js/woocommerce/vendor_product_warranty_woocommerce.js">
        
        </script>
    <?php
}
add_action('wp_head', 'wpb_hook_javascript');	
wp_enqueue_script( 'script', 'template_woocommerce.js', array ( 'jquery' ), 1.1, true);

function print_home()  {
  
    $file = file_get_contents(appUrl . '/home?storehash=' . storehash . '&appurl=' . appUrl, false);
    if($file == false)
    {
        echo 'file not found' . appUrl . '/home?storehash=' . storehash . '&appurl=' . appUrl;
    }
    else
    {
        echo $file;
    }
  
}
function print_products()  {
  $file = file_get_contents(appUrl . '/products?storehash=' . storehash . '&appurl=' . appUrl, false);
    if($file == false)
    {
        echo 'file not found' . appUrl . '/products?storehash=' . storehash . '&appurl=' . appUrl;
    }
    else
    {
        echo $file;
    }
}
function print_orders()  {
    $file = file_get_contents(appUrl . '/orders?storehash=' . storehash . '&appurl=' . appUrl, false);
    if($file == false)
    {
        echo 'file not found';
    }
    else
    {
      echo $file;
    }

}
function print_settings()  {
  $file = file_get_contents(appUrl . '/settings?storehash=' . storehash . '&appurl=' . appUrl, false);
    if($file == false)
    {
        echo 'file not found';
    }
    else
    {
        echo $file;
    }
}
function print_pricing()  {
  $file = file_get_contents(appUrl . '/pricing?storehash=' . storehash . '&appurl=' . appUrl, false);
  if($file == false)
  {
      echo 'file not found';
  }
  else
  {
      echo $file;
  }

}
function print_faq()  {
  $file = file_get_contents(appUrl . '/faq?storehash=' . storehash . '&appurl=' . appUrl, false);
  if($file == false)
  {
      echo 'file not found';
  }
  else
  {
      echo $file;
  }

}
function print_profile()  {
  $file = file_get_contents(appUrl . '/profile?storehash=' . storehash . '&appurl=' . appUrl, false);
  if($file == false)
  {
      echo 'file not found';
  }
  else
  {
      echo $file;
  }

}
function admin_menu()  {
  add_menu_page(
    'CPS',// page title  
    'CPS',// menu title  
    'manage_options',// capability  
    'home',// menu slug  
    'print_hello_world_title'  // callback function  
  );  

  add_submenu_page( 'home', 'Home', 'Home',
    'manage_options', 'home','print_home');

  add_submenu_page( 'home', 'Products', 'Products',
    'manage_options', 'products','print_products');
  add_submenu_page( 'home', 'Orders', 'Orders',
    'manage_options', 'orders','print_orders');
  add_submenu_page( 'home', 'Settings', 'Settings',
    'manage_options', 'settings','print_settings');
  add_submenu_page( 'home', 'Pricing', 'Pricing',
    'manage_options', 'pricing','print_pricing');
  add_submenu_page( 'home', 'FAQ', 'FAQ',
    'manage_options','faq', 'print_faq');
    add_submenu_page( 'home', 'Profile', 'Profile',
    'manage_options', 'profile','print_profile');
}  
add_action( 'admin_menu', 'admin_menu' );

?>