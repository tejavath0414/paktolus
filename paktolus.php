<?php

/*
 * Plugin Name: paktolus
 * Plugin URI: 
 * description: Fot test.
 * Version: 1.0
 * Author: parvathi
 * Author URI:   
 * WC requires at least: 3.0.0 
 */
register_activation_hook( __FILE__, 'paktolus_table' );

//  add menu
function paktolus_table(){
    global $wpdb;
    global $wnm_db_version;
  
    $config_paktolus_table = $wpdb->prefix . "paktolus_table";
    if($wpdb->get_var("show tables like '". $config_paktolus_table . "'") != $config_paktolus_table){ 
    $sql_config_paktolus = "CREATE TABLE ". $config_paktolus_table . "(
    id int(50) NOT NULL AUTO_INCREMENT,
    Auth_Token varchar(50)  NOT NULL,
    Api_Url varchar(50) NOT NULL,
    PRIMARY KEY (id)
    )";
  
  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  dbDelta($sql_config_paktolus);
  //dbDelta($sql);
  add_option("wnm_db_version", $wnm_db_version);
  $success = $wpdb->insert(
    $config_table,
    array(
      'Auth_Token' => 0,
      'Api_Url' => 0
    ),
  array('%s', '%s')
  );
  }
  
  }

  function paktolus_menu() {

    add_menu_page("paktolus", "paktolus","manage_options", "paktolus", "paktolusshowDashView",'dashicons-admin-users',52);

}


add_action("admin_menu", "paktolus_menu");

function paktolusshowDashView(){
  include( plugin_dir_path( __FILE__ ) . '\dashboard.php');
  //include "dashboard.php";
}

add_action('wp_enqueue_scripts','paktolus_plugin_css_jsscripts');
function paktolus_plugin_css_jsscripts() {
    // CSS
    wp_enqueue_style( 'style-css', plugins_url( '/style.css', __FILE__ ));
    
    
    // JavaScript
    wp_enqueue_script( 'script-js', plugins_url( '/script.js', __FILE__ ),array('jquery'));
    
    // Pass ajax_url to script.js
    wp_localize_script( 'script-js', 'plugin_ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}

function price_quote_display () {
  ?>
     <div class="container">
            <h2 style="text-align:center; margin-top:60px;">Hippo Plugin Form</h2>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                
                <div class="alert alert-info" id="productformvalue" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong id="formsuccess"></strong> We will contact you soon...
                </div>
                
                    <div>
                      <h3  style="display:none;" id="final_text">Your Quote Premium is <span  style="color:#89bf4d"><b id="quote_final"></b></span></h3>
                    <table id="res_tab" style="display:none;" class="table table-striped">
  
    <tbody>
      <tr>
        <td>Quote Url</td>
        <td id="hippi_quote_url"></td>
      </tr>
      <tr>
        <td>Coverage</td>
        <td id="hippi_coverage"></td>
      </tr>
      <tr>
        <td>Quote Premium</td>
        <td id="hippi_premium"></td>
      </tr>
      <tr>
        <td>Quote ID</td>
        <td id="hippi_id" ></td>
      </tr>
    </tbody>
  </table>
                    </div> 
                    <!-- <form action="https://api.staging.myhippo.io/v1/herd/quote?" method="GET" role="form"> -->
                      <form action="" method="GET" id="form_hippo_main" role="form">
                       
                    <input type='hidden' id="auth_token" name="auth_token" value="zcXbR1NoE0zoozyuqAa75s5gBATbeiUsbkGhvb5toGiNWUdDjIUkAU5XgDwCRTet">
                        <div class="form-group" style="margin-top:15px;">
                            <label for=""><strong>Firstname</strong></label>
                            <input type="text" class="form-control" name="first_name" id="fname" placeholder="Please enter your first name"required="required">
                        </div>

                        <div class="form-group" style="margin-top:15px;">
                            <label for=""><strong>Middlename</strong></label>
                            <input type="text" class="form-control" id="Middlename" name="" placeholder="Please enter your middle name">
                        </div>


                        <div class="form-group" style="margin-top:15px;">
                            <label for=""><strong>Lastname</strong></label>
                            <input type="text" class="form-control" id="lname" name="last_name" placeholder="Please enter your last name" required="required">
                        </div>

                        <div class="form-group" style="margin-top:15px;">
                            <label for=""><strong>Street Address</strong></label>
                            <input type="text" class="form-control" name="street" id="streetaddress" placeholder="Please enter your street ddress" required="required">
                        </div>

                        <div class="form-group" style="margin-top:15px;">
                            <label for=""><strong>Unit</strong></label>
                            <input type="text" class="form-control" name="" id="unit" placeholder="Please enter your unit">
                        </div>

                        <div class="form-group" style="margin-top:15px;">
                            <label for=""><strong>City</strong></label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="Please enter your city" required="required">
                        </div>

                        <div class="form-group" style="margin-top:15px;">
                            <label for=""><strong>State</strong></label>
                           

                            <select name="state" id="state">
  <option value="" selected="selected">Select a State</option>
  <option value="AL">Alabama</option>
  <option value="AK">Alaska</option>
  <option value="AZ">Arizona</option>
  <option value="AR">Arkansas</option>
  <option value="CA">California</option>
  <option value="CO">Colorado</option>
  <option value="CT">Connecticut</option>
  <option value="DE">Delaware</option>
  <option value="DC">District Of Columbia</option>
  <option value="FL">Florida</option>
  <option value="GA">Georgia</option>
  <option value="HI">Hawaii</option>
  <option value="ID">Idaho</option>
  <option value="IL">Illinois</option>
  <option value="IN">Indiana</option>
  <option value="IA">Iowa</option>
  <option value="KS">Kansas</option>
  <option value="KY">Kentucky</option>
  <option value="LA">Louisiana</option>
  <option value="ME">Maine</option>
  <option value="MD">Maryland</option>
  <option value="MA">Massachusetts</option>
  <option value="MI">Michigan</option>
  <option value="MN">Minnesota</option>
  <option value="MS">Mississippi</option>
  <option value="MO">Missouri</option>
  <option value="MT">Montana</option>
  <option value="NE">Nebraska</option>
  <option value="NV">Nevada</option>
  <option value="NH">New Hampshire</option>
  <option value="NJ">New Jersey</option>
  <option value="NM">New Mexico</option>
  <option value="NY">New York</option>
  <option value="NC">North Carolina</option>
  <option value="ND">North Dakota</option>
  <option value="OH">Ohio</option>
  <option value="OK">Oklahoma</option>
  <option value="OR">Oregon</option>
  <option value="PA">Pennsylvania</option>
  <option value="RI">Rhode Island</option>
  <option value="SC">South Carolina</option>
  <option value="SD">South Dakota</option>
  <option value="TN">Tennessee</option>
  <option value="TX">Texas</option>
  <option value="UT">Utah</option>
  <option value="VT">Vermont</option>
  <option value="VA">Virginia</option>
  <option value="WA">Washington</option>
  <option value="WV">West Virginia</option>
  <option value="WI">Wisconsin</option>
  <option value="WY">Wyoming</option>
</select>
                        </div>


                        <div class="form-group" style="margin-top:15px;">
                            <label for=""><strong>Zipcode</strong></label>
                            <input type="text" class="form-control" name="zip" id="zipcode" placeholder="please enter your zipcode" required="required"><br>
                        </div><br>

                        <div class="form-group" style="margin-top:15px;">
                            <label for=""><strong>Date of Birth</strong></label>
                            
                            <input type="date" name="" onblur="dateFormat(this)" data-date-format="MMDDYYYY" id="" class="form-control" value="" required="required" title=""><br>
                            <input style="display:none;" type="text" name="date_of_birth" onblur="dateFormat(this)" data-date-format="MMDDYYYY" id="date_of_birth" class="form-control" value="" required="required" title=""><br>
                            
                        </div>

                        <div class="form-group" style="margin-top:15px;">
                            <label for="" ><strong>Phone number</strong></label>
                            <input type="tel" name="phone" id="phonenumber" class="form-control" placeholder="Please enter your phonenumber" required="required"><br>
                        </div>
                        
                        <div class="form-group">
                            <label for="" style="margin-top:15px;"><strong>EmailAddress</strong></label>
                           <input type="email" name="email" class="form-control" id="emailaddress" placeholder="Please enter your email" required="required"><br>
                        </div>

                       

                        <div class="form-group" style="display:inline;">  
                        <h3 style="margin-top:15px;">Is this a House,Condo and HO5?</h3>

                      
                        <input type="radio" id="house" name="house" value="">
                        <label for="house">House</label><br>

                        
                        <input type="radio" id="condo" name="codndo" value="">
                        <label for="condo">condo</label><br> 
                        
                      
                        <input type="radio" id="HO5" name="ho5" value="">
                        <label for="ho5">h05</label><br>
                        
                       
                         </div>


    
                    
                        <button type="button" class="btn btn-primary form-control" onclick="hippiformSubmit()" id="hippoformbtn">Submit</button>
                    </form>
                    

                </div>

            </div>
        </div>
  <?php
}

function form_shortcode() {
  ob_start();

  price_quote_display();

  return ob_get_clean();
}

  //creates shortcode
  add_shortcode('Hippo-quote','form_shortcode');

  add_action( 'wp_ajax_updateAuth', 'updateAuth_callback' );
  add_action( 'wp_ajax_nopriv_updateAuth', 'updateAuth_callback' );
  function updateAuth_callback() {
    global $wpdb;
    
    $request = $_POST['request'];
    $response = array();
  
    // Fetch record by id
    $Value = $_POST['Value'];
    $AuthLimit = $wpdb->get_var("select `Auth_Token` from  `".$wpdb->prefix."paktolus_table` WHERE `user_id`= 1");
    // echo $AuthLimit;
   return $AuthLimit;
    if($AuthLimit == 1){
      $res2= $wpdb->query("UPDATE `".$wpdb->prefix."paktolus_table` SET `Auth_Token`='".$Value."");
    }else{
      $response = $wpdb->query("INSERT INTO `".$wpdb->prefix."paktolus_table` (`Auth_Token`) VALUES ('".$Value."')");
    }
  
   
  
   
    echo json_encode($response);
    wp_die(); 
  }

  add_action( 'wp_ajax_updateApiurl', 'updateApiurl_callback' );
  add_action( 'wp_ajax_nopriv_updateApiurl', 'updateApiurl_callback' );
  function updateApiurl_callback() {
    global $wpdb;
    
    $request = $_POST['request'];
    $response = array();
  
    // Fetch record by id
    $Value = $_POST['Value'];
    $AuthLimit = $wpdb->get_var("select `Api_Url` from  `".$wpdb->prefix."paktolus_table` WHERE `user_id`= 1");
    echo $AuthLimit;
    if($AuthLimit == 1){
      $res2= $wpdb->query("UPDATE `".$wpdb->prefix."paktolus_table` SET `Api_Url`='".$Value."");
    }else{
      $response = $wpdb->query("INSERT INTO `".$wpdb->prefix."paktolus_table` (`Api_Url`) VALUES ('".$Value."')");
    }
  
   
  
   
    echo json_encode($response);
    wp_die(); 
  }

?>