<?php
 $pageTitle="Tour Dates";

 
 if( @$_REQUEST['td_submit'] ){
     
     $td_artist_name = @$_REQUEST['td_artist_name'];
     $td_custom_css  = @$_REQUEST['td_custom_css'];
     
     $tour_dates_data = array(         
         'td_artist_name' =>  $td_artist_name,
	 'td_custom_css'  =>  $td_custom_css
     );
     
     update_option( 'tour_dates_data' , $tour_dates_data );
 }
 
 $tour_dates_data = get_option( 'tour_dates_data' );
 
 $td_default_css = @file_get_contents( TD_PLUGIN_DIR."/td-style.css" );
 if( empty( $td_default_css ) )
        $td_default_css = '';
 
?>
 
 <div class="wrap">    
   <div id="icon" class="icon32"><br/></div>
    <h2><?php echo esc_html( __($pageTitle) ); ?></h2>   
    <form action="" method="post">
	<div>
	<h3>General Settings</h3>
	<table class="form-table">
                <tr valign="top">
                    <th scope="row"><label>Artist</label></th>
                    <td><input type="text" class="regular-text" value="<?php echo $tour_dates_data['td_artist_name'];?>" id="td_artist_name" name="td_artist_name"></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label>Default CSS</label></th>
                    <td>
                        <p>You can use this section to review our default CSS rules and create your own custom rules to override the look and feel of the output.</p>
                        <textarea cols="90" rows="10" id="td_default_css" readonly="1" name="td_default_css" style="background:#EEEEEE;"><?php echo $td_default_css;?></textarea>                        
                    </td>
                </tr> 
                <tr valign="top">
                    <th scope="row"><label>Custom CSS</label></th>
                    <td>                        
                        <textarea cols="80" rows="8" id="td_custom_css" name="td_custom_css"><?php echo $tour_dates_data['td_custom_css'];?></textarea>                        
                    </td>
                </tr>
                
       </table>
        <p class="submit"><input type="submit" value="Save Settings" class="button button-primary" id="td_submit" name="td_submit"></p>
	</div>     
        </form>
  </div>
 
