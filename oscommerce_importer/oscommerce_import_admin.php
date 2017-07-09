<?php 
    if($_POST['oscimp_hidden'] == 'Y') {
        //Form data sent
        $dbhost = $_POST['oscimp_dbhost'];
        update_option('oscimp_dbhost', $dbhost);
         
        $dbname = $_POST['oscimp_dbname'];
        update_option('oscimp_dbname', $dbname);
         
        $dbuser = $_POST['oscimp_dbuser'];
        update_option('oscimp_dbuser', $dbuser);
         
        $dbpwd = $_POST['oscimp_dbpwd'];
        update_option('oscimp_dbpwd', $dbpwd);
 
        $prod_img_folder = $_POST['oscimp_prod_img_folder'];
        update_option('oscimp_prod_img_folder', $prod_img_folder);
 
        $store_url = $_POST['oscimp_store_url'];
        update_option('oscimp_store_url', $store_url);
        ?>
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
        <?php
    } else {
        //Normal page display
        $dbhost = get_option('oscimp_dbhost');
        $dbname = get_option('oscimp_dbname');
        $dbuser = get_option('oscimp_dbuser');
        $dbpwd = get_option('oscimp_dbpwd');
        $prod_img_folder = get_option('oscimp_prod_img_folder');
        $store_url = get_option('oscimp_store_url');
    }
?>
<div class="wrap">
    <?php    echo "<h2>" . __( 'OSCommerce Product Display Options', 'oscimp_trdom' ) . "</h2>"; ?>
     
    <form name="oscimp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="oscimp_hidden" value="Y">
        <?php    echo "<h4>" . __( 'OSCommerce Database Settings', 'oscimp_trdom' ) . "</h4>"; ?>
        <p><?php _e("Database host: " ); ?><input type="text" name="oscimp_dbhost" value="<?php echo $dbhost; ?>" size="20"><?php _e(" ex: localhost" ); ?></p>
        <p><?php _e("Database name: " ); ?><input type="text" name="oscimp_dbname" value="<?php echo $dbname; ?>" size="20"><?php _e(" ex: oscommerce_shop" ); ?></p>
        <p><?php _e("Database user: " ); ?><input type="text" name="oscimp_dbuser" value="<?php echo $dbuser; ?>" size="20"><?php _e(" ex: root" ); ?></p>
        <p><?php _e("Database password: " ); ?><input type="text" name="oscimp_dbpwd" value="<?php echo $dbpwd; ?>" size="20"><?php _e(" ex: secretpassword" ); ?></p>
        <hr />
        <?php    echo "<h4>" . __( 'OSCommerce Store Settings', 'oscimp_trdom' ) . "</h4>"; ?>
        <p><?php _e("Store URL: " ); ?><input type="text" name="oscimp_store_url" value="<?php echo $store_url; ?>" size="20"><?php _e(" ex: http://www.yourstore.com/" ); ?></p>
        <p><?php _e("Product image folder: " ); ?><input type="text" name="oscimp_prod_img_folder" value="<?php echo $prod_img_folder; ?>" size="20"><?php _e(" ex: http://www.yourstore.com/images/" ); ?></p>
         
     
        <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Update Options', 'oscimp_trdom' ) ?>" />
        </p>
    </form>
</div>