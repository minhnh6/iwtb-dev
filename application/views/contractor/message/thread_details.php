<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-12">
                <h4 class="page-title">Inbox</h4>
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Inbox Page</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- row -->
        <div class="row">
            <!-- Left sidebar -->
            <div class="col-md-12">
                <div class="white-box">
                    <h3><?php echo $theadDetails['projectName'];?></h3>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2 col-md-3  col-sm-4 col-xs-12 ">
                            <div class="p-r-20"> <a href="#" class="btn btn-danger btn-block waves-effect waves-light">My Messages</a>
                                <div class="list-group mail-list m-t-20"> 
                                    <a href="<?php echo base_url(); ?>contractor/message/showList" class="list-group-item active">Inbox <span class="label label-rouded label-success pull-right unreadMessageCount"><?php echo $totalUnredMessages; ?></span></a> 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 mail_listing">
                            <div class="messagePlaceHolder">
                                <ul class="timeline messagePlaceHolderTimeline">
                                    
                                </ul>
                            </div>
                            <hr>
                            <div class="b-all p-20">
                                <div class="row">
                                    <div class="col-md-10">
                                        <textarea class="form-control" style="height: 35px;" id="messageContent"></textarea>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" value="Send Message" id="messageSubmitButton" class="btn btn-success">
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

<input type="hidden" id="lastMessageIdShown" value="0">
<input type="hidden" id="threadId" value="<?php echo $theadDetails['thread_id']; ?>">
<input type="hidden" id="baseUrl" value="<?php echo base_url();?>">
<input type="hidden" id="employerUserId" value="<?php echo $theadDetails['user_id'];?>">

<script type="text/javascript">
    $(document).ready(function(){
        init();
        
        $("#messageSubmitButton").click(function(){
            var messageContent = $("#messageContent").val();
            if(messageContent == "") {
                $("#messageContent").focus();
            } else {
                addNewMessage(messageContent);
                getLatestMessageUpdate(true);
            }
        });
        
    });
    
    function init() {
        $("#messageContent").focus();
        getLatestMessageUpdate(false);
        ///////////////////////////////////////////
        setInterval(function(){ 
            getLatestMessageUpdate(true); 
        }, 3000);
    }
    
    function addNewMessage(messageContent) {
        var threadId = $("#threadId").val();
        var baseUrl = $("#baseUrl").val();
        var employerUserId = $("#employerUserId").val();
        
        
        $.ajax({
            method: "POST",
            async: false,
            url: baseUrl+"contractor/message/addNewMessage/"+threadId+"/"+employerUserId,
            data: { messageContent: messageContent }
        })
         .done(function( msg ) {
             $("#messageContent").val("");
            placeChatScrollBar();
        });
    }
    
    function placeChatScrollBar() {
        var messagePlaceHolder    = $('.messagePlaceHolder');
        var height = messagePlaceHolder[0].scrollHeight;
        messagePlaceHolder.scrollTop(height);
    }
    
    
    function getLatestMessageUpdate(appendWithOldText) {
        var lastMessageIdShown = $("#lastMessageIdShown").val();
        var threadId = $("#threadId").val();
        var baseUrl = $("#baseUrl").val();
        
        
        $.ajax({
            method: "POST",
            async: false,
            url: baseUrl+"contractor/message/getLatestMessageUpdate/"+threadId+"/"+lastMessageIdShown,
            data: {}
        })
         .done(function( msg ) {
            var responseObj = jQuery.parseJSON(msg);
            
            if(appendWithOldText) {
                if(responseObj.messageListOutput != ""){
                    $(".messagePlaceHolderTimeline").append(responseObj.messageListOutput);
                }
            }
            else {
               $(".messagePlaceHolderTimeline").html(responseObj.messageListOutput); 
            }
            
            $("#lastMessageIdShown").val(responseObj.lastMessageShownId);
            placeChatScrollBar();
        });
    }
    
    $("#messageContent").on("focus", function(){
        var threadId = $("#threadId").val();
        var baseUrl = $("#baseUrl").val();
        $.ajax({
            method: "POST",
            async: false,
            url: baseUrl+"contractor/message/updateUnreadMessageStatus/"+threadId,
            data: {}
        })
         .done(function( msg ) {
        });
    });
    
</script>


<style>
    .timeline > li > .timeline-panel{
        float: right;
        overflow: hidden;
        text-align: right;
        width: 90%;
    }
    .timeline > li.timeline-inverted > .timeline-panel {
        float: left;
        text-align: left;
    }
    .timeline:before{
        display: none;
    }
    .messagePlaceHolder{
        height: 500px;
        overflow-y: scroll;
        overflow-x: hidden;
    }
</style>