<footer class="footer text-center"><i>Does this project seem suspicious? Report it to us via live chat</i></footer>
</div>
<!-- Start of LiveChat (www.livechatinc.com) code -->
    <script type="text/javascript">
    window.__lc = window.__lc || {};
    window.__lc.license = 8615564;
    (function() {
      var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
      lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
    })();
    </script>
    <!-- End of LiveChat code -->
<!-- /#wrapper -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>/assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>
<!--Nice scroll JavaScript -->
<script src="<?php echo base_url(); ?>/assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url(); ?>/assets/bower_components/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/validator.js"></script>
<script src="<?php echo base_url(); ?>/assets/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/assets/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>/assets/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>/assets/js/myadmin.js"></script>
<script>
    $(document).ready(function(){
        $(".select2").select2();
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [
                    { "visible": false, "targets": 2 }
                ],
                "order": [[ 2, 'asc' ]],
                "displayLength": 5,
                "drawCallback": function ( settings ) {
                    var api = this.api();
                    var rows = api.rows( {page:'current'} ).nodes();
                    var last=null;
                    api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                        if ( last !== group ) {
                            $(rows).eq( i ).before(
                            '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                        );
                            last = group;
                        }
                    } );
                }
            } );
            // Order by the grouping
            $('#example tbody').on( 'click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
                    table.order( [ 2, 'desc' ] ).draw();
                }
                else {
                    table.order( [ 2, 'asc' ] ).draw();
                }
            } );
        } );
    });
    
    
    
    $(document).ready(function(){
        inIt();
    });
    
    function inIt() {
        getNoOfUnreadMessages();
        
        setInterval(function(){ 
            getNoOfUnreadMessages(); 
        }, 5000);
    }
    
    function getNoOfUnreadMessages() {
        var baseUrl = $("#baseUrl").val();
        
        $.ajax({
            method: "POST",
            async: true,
            url: baseUrl+"employer/message/getNoOfUnreadMessages",
            data: {}
        })
         .done(function( msg ) {
             msg = parseInt(msg);
             if(msg > 0) {
                 $(".headerUnreadMessageCount").html("new ("+msg+")");
                 if($(".unreadMessageCount").length > 0) { // this is for showThread page //
                     $(".unreadMessageCount").html(msg);
                 }
             } else {
                 $(".headerUnreadMessageCount").html("");
                 $(".unreadMessageCount").html(msg);
             }
        });
    }
    
</script>
<!-- Thí for upload ST?T --> 

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo base_url(); ?>/assets/upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url(); ?>/assets/upload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo base_url(); ?>/assets/upload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo base_url(); ?>/assets/upload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo base_url(); ?>/assets/upload/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo base_url(); ?>/assets/upload/js/jquery.fileupload-ui.js"></script>
<!-- The File Upload jQuery UI plugin -->
<script src="<?php echo base_url(); ?>/assets/upload/js/jquery.fileupload-jquery-ui.js"></script>
<!-- The main application script -->
<script src="<?php echo base_url(); ?>/assets/upload/js/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="js/cors/jquery.xdr-transport.js"></script>
<![endif]-->

<!-- This for upload END --> 
</body>
</html>