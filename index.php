<?php
/*
 Plugin name: get-dni
 plugin uri: www.localhost.com
 Description: Short Code para obtener el dni del usuario activo
 Author: Luis Castillo
 Version: 0.1
 Author URI:
 */

add_shortcode("get_dni","get_dni");

function get_dni(){
    global $wpdb;
    $id = get_current_user_id();
    $sql = "SELECT * 
            FROM `wp_users` u 
            INNER JOIN `wp_usermeta` um ON u.ID = um.user_id 
            WHERE u.ID = $id  AND um.meta_key = 'dni'";
    $items = $wpdb->get_results($sql);
    $dni = $items[0]->meta_value;
    return "<script>document.getElementById('additional_wooccm0').value = '$dni' </script>";

}

