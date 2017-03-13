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
            url: baseUrl+"contractor/message/getNoOfUnreadMessages",
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
</body>
</html>