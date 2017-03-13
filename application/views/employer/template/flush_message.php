<?php
    $baseUrl = base_url();
    if( isset($_SESSION[$sessionPrefix.'error']) ){
        echo "
             <div id='alerttopright' class='myadmin-alert myadmin-alert-img alert6 myadmin-alert-top-right' style='display: block;'> <img src='{$baseUrl}/assets/images/warning_icon.jpg' class='img' alt='img'><a href='#' class='closed'>&times;</a>
                <h4>Operation Failed!</h4>
                {$_SESSION[$sessionPrefix.'error']}
             </div>
            ";
         unset($_SESSION[$sessionPrefix.'error']);       
    }
    else if( isset($_SESSION[$sessionPrefix.'success']) ) {
        echo "
             <div id='alerttopright' class='myadmin-alert myadmin-alert-img alert3 myadmin-alert-top-right' style='display: block;'> <img src='{$baseUrl}/assets/images/success_icon.png' class='img' alt='img'> <a href='#' class='closed'>&times;</a>
                <h4>Operation successful!</h4>
                {$_SESSION[$sessionPrefix.'success']}
             </div>
            ";
         unset($_SESSION[$sessionPrefix.'success']);
    }
?>
<!-- notification showing section for all pages, with JS -->
<div class="notificationShowingDiv">
    <div id='alerttopright' class='myadmin-alert myadmin-alert-img alert6 myadmin-alert-top-right errorNotificationAlert'> <img src='<?php echo base_url();?>/assets/images/warning_icon.jpg' class='img' alt='img'><a href='#' class='closed'>&times;</a>
        <h4>Operation Failed!</h4>
        <div id="errorMessage"></div>
     </div>
</div>

<div class="commonNotificationDiv">
    
</div>