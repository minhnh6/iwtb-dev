<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-12">
                <h4 class="page-title">My Inbox</h4>
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">My Inbox</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- row -->
        <div class="row">
            <!-- Left sidebar -->
            <div class="col-md-12">
                <div class="white-box">
                    <h3>Inbox</h3>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2 col-md-3  col-sm-4 col-xs-12 ">
                            <div class="p-r-20"> <a class="btn btn-danger btn-block waves-effect waves-light">My Messages</a>
                                <div class="list-group mail-list m-t-20"> 
                                    <a href="<?php echo base_url(); ?>employer/message/showList" class="list-group-item active">Inbox <span class="label label-rouded label-success pull-right unreadMessageCount"><?php echo $totalUnredMessages; ?></span></a>  
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 mail_listing">
                            <div class="btn-group"></div>
                            <div class="btn-group">
                                <a href="" class="btn btn-default waves-effect waves-light  dropdown-toggle"> <i class="fa fa-refresh"></i> </a>
                            </div>
                            <hr class="m-b-0">
                            <div class="message-center"> 
                                
                                <?php
                                    $baseUrl = base_url();
                                    $lastSeenMessageId = 0;
                                    $count = 0;
                                    foreach($threadList as $aThread) {
                                        if($count == 0) $lastSeenMessageId = $aThread['id'];
                                        $lastSentOn = date("d/m/Y h:i A", strtotime($aThread['sent_on']));
                                        $readClass = "unread";
                                        if($aThread['totalUnread'] == 0) {
                                            $readClass = "read";
                                        }
                                        $threadUrl = base_url() . "employer/message/showThread/{$aThread['thread_id']}";
                                        
                                        echo "
                                                <a href='{$threadUrl}' class='{$readClass}'>
                                                    <div class='user-img'> <img class='img-circle' alt='user' src='{$baseUrl}assets/images/default-avatar.png'> </div>
                                                    <div class='mail-contnet'>
                                                        <h5>{$aThread['name']} <small> [ {$aThread['business_name']} ] </small> </h5>
                                                        <span class='mail-desc'>{$aThread['content']}</span> <span class='time'>{$lastSentOn} </span> </div>
                                                </a>
                                            ";
                                        $count++;                
                                    }
                                ?>
                                
                            </div>
                            <div class="row">
                                <div class="col-xs-7 m-t-20"> Showing <?php echo ($offset+1) . " - " . ($offset+$inboxThreadPerPage) . " of " . $totalThread;?> </div>
                                <div class="col-xs-5 m-t-20">
                                    <div class="btn-group pull-right">
                                        <a href="<?php echo $prevLink;?>" class="btn btn-default waves-effect"><i class="fa fa-chevron-left"></i></a>
                                        <a href="<?php echo $nextLink;?>" class="btn btn-default waves-effect"><i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<input type="hidden" id="lastSeenMessageId" value="<?php echo $lastSeenMessageId;?>">

<script type="text/javascript">
    $(document).ready(function(){
        inInt();
    });
    
    function inInt() {
        setInterval(function(){ 
            getLatestNoOfIncomingMessage(); 
        }, 7000);
    }
    
    function getLatestNoOfIncomingMessage() {
        var baseUrl = $("#baseUrl").val();
        var lastSeenMessageId = $("#lastSeenMessageId").val();
        lastSeenMessageId = parseInt(lastSeenMessageId);
        
        $.ajax({
            method: "POST",
            async: true,
            url: baseUrl+"employer/message/getlastSeenMessageId/" + lastSeenMessageId,
            data: {}
        })
         .done(function( msg ) {
             var jsonObj = jQuery.parseJSON(msg);
             if(jsonObj.newLastSeenMessageId > lastSeenMessageId ) {
                 window.location.reload();
             } else {
                 $("#lastSeenMessageId").val(jsonObj.newLastSeenMessageId);
             }
        });
    }
</script>