<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-12">
                <h4 class="page-title">Create New Project</h4>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="active">Create New Project</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <center><h3>Create New Project | <button class="btn btn-primary hiringIwtbProjectManagerButton"><i class="icon-user"></i> Hire an IWTB project manager</button></h3></center> 
                    <center><p class="text-muted m-b-30"> Provide details to create a new project! </p></center>
                    <hr>
                    <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-12">                                   
                                    <div class="form-group">
                                       <form id="fileupload" action="upload/do_upload" method="POST" enctype="multipart/form-data">
                                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                            <div class="row fileupload-buttonbar">
                                                <div class="col-lg-7">
                                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                                    <span class="btn btn-success fileinput-button">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        <span>Add files...</span>
                                                        <input type="file" name="userfile" multiple>
                                                    </span>
                                                    <button type="submit" class="btn btn-primary start">
                                                        <i class="glyphicon glyphicon-upload"></i>
                                                        <span>Start upload</span>
                                                    </button>
                                                    <button type="reset" class="btn btn-warning cancel">
                                                        <i class="glyphicon glyphicon-ban-circle"></i>
                                                        <span>Cancel upload</span>
                                                    </button>
                                                    <button type="button" class="btn btn-danger delete">
                                                        <i class="glyphicon glyphicon-trash"></i>
                                                        <span>Delete</span>
                                                    </button>
                                                    <input type="checkbox" class="toggle">
                                                    <!-- The global file processing state -->
                                                    <span class="fileupload-process"></span>
                                                </div>
                                                <!-- The global progress state -->
                                               
                                            </div>
                                            <!-- The table listing the files available for upload/download -->
                                            <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                                        </form> 
                                        <!-- The blueimp Gallery widget -->
                                        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                                            <div class="slides"></div>
                                            <h3 class="title"></h3>
                                            <a class="prev">�</a>
                                            <a class="next">�</a>
                                            <a class="close">�</a>
                                            <a class="play-pause"></a>
                                            <ol class="indicator"></ol>
                                        </div>
                                        <style>
                                        tr.fade {
                                            opacity: 1 !important;
                                        }
                                        </style>
                                                                      
                                    </div>
                                </div>                               
                            </div>
                        </div>
                        <hr />
                    <form action="" method="POST" enctype="multipart/form-data" data-toggle="validator">
                        <hr>
                        <center><h3>Main Details</h3></center>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">I want to build</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter project title.." value="<?php echo @$_POST['name'];?>" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>                                 
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputEmail" class="control-label">Project Details & Brief</label>
                                        <textarea style="height: 150px;" class="form-control" id="description" name="description" placeholder="Enter project details.." required><?php echo @$_POST['description'];?></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <center><h3>Contact Details</h3></center>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Name</label>
                                        <input type="text" class="form-control" value="<?php echo $employerDetails['title'] . " " . $employerDetails['first_name'] . " " . $employerDetails['surename'];?>" readonly="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Email address</label>
                                        <input type="email" class="form-control" value="<?php echo $employerDetails['email_address'];?>" readonly="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Contact</label> 
                                        <input type="text" class="form-control" value="<?php echo $employerDetails['phone_number'];?>" readonly="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Address Line 1</label>
                                        <input type="email" class="form-control" value="<?php echo $employerDetails['address_line_1'];?>" readonly="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Address Line 2</label>
                                        <input type="text" class="form-control" value="<?php echo $employerDetails['address_line_2'];?>" readonly="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Suburb</label>
                                        <input type="text" class="form-control" name="suburb" value="<?php echo $employerDetails['suburb'];?>" readonly="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Postal Code</label>
                                        <input type="text" class="form-control" value="<?php echo $employerDetails['post_code'];?>" readonly="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="State" class="control-label">State</label>
                                        <input type="text" class="form-control" value="<?php echo $state['name'];?>" readonly="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="alert alert-info"><i class="icon-note"></i> Note that, your contact details will not be shared publicly. But you will be shared only with the contractors you approve.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <center><h3>Project Details</h3></center>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Sector</label>
                                        <select class="form-control" name="sector" id="sector" required="">
                                            <option value="">---Select A Sector---</option>
                                            <option <?php if(isset($_POST['sector']) && ($_POST['sector'] == "Commercial")) echo " selected ";?> value="Commercial">Commercial</option>
                                            <option <?php if(isset($_POST['sector']) && ($_POST['sector'] == "Residential")) echo " selected ";?> value="Residential">Residential</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Hire A</label>
                                        <select class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Choose Category" name="trades[]" id="trades">
                                            <optgroup label="Select multiple categories">
                                                <?php
                                                    foreach( $tradeList as $aTrade ){
                                                        $selectHtml = "";
                                                        if(in_array($aTrade['trade_id'], $_POST['trades']))
                                                                $selectHtml = " selected ";
                                                        echo "<option value='{$aTrade['trade_id']}' {$selectHtml}>{$aTrade['trade_name']}</option>";
                                                    }
                                                ?>
                                            </optgroup>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Project Budget</label>
                                        <select class="form-control" id="budget_range" name="budget_range">
                                            <option value="">---Select any price range---</option>
                                            <option <?php if(isset($_POST['budget_range']) && ($_POST['budget_range'] == "<2500")) echo " selected ";?> value="<2500"><2500</option>
                                            <option <?php if(isset($_POST['budget_range']) && ($_POST['budget_range'] == "2500-3000")) echo " selected ";?> value="2500-3000">2500-3000</option>
                                            <option <?php if(isset($_POST['budget_range']) && ($_POST['budget_range'] == ">3000")) echo " selected ";?> value=">3000">>3000</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">OR Mention a fixed price</label>
                                        <input type="number" min="0" step=".000000001" class="form-control" name="fixed_budget" id="fixed_budget" <?php echo @$_POST['fixed_budget'];?> placeholder="Enter any fixed price amount..">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">Inspection Required</label>
                                        <select class="form-control" id="is_inspection_required" name="is_inspection_required" required="">
                                            <option value="">---Select if inspection is required---</option>
                                            <option <?php if(isset($_POST['is_inspection_required']) && ($_POST['is_inspection_required'] == "Y")) echo " selected ";?> value="Y">Yes</option>
                                            <option <?php if(isset($_POST['is_inspection_required']) && ($_POST['is_inspection_required'] == "N")) echo " selected ";?> value="N">No</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputName1" class="control-label">DA Approval Required</label>
                                        <select class="form-control" id="is_da_approval_required" name="is_da_approval_required" required=""> 
                                            <option value="">---Select if DA approval is required---</option>
                                            <option <?php if(isset($_POST['is_da_approval_required']) && ($_POST['is_da_approval_required'] == "Y")) echo " selected ";?> value="Y">Yes</option>
                                            <option <?php if(isset($_POST['is_da_approval_required']) && ($_POST['is_da_approval_required'] == "N")) echo " selected ";?> value="N">No</option>
                                        </select>
                                        <span class="help-block">
                                            <small><input type="file" class="btn btn-primary" id="daFile" name="daFile" disabled=""></small>
                                            <div class="form-group checkbox checkbox-success">
                                                <input type="checkbox" name="has_not_obtained_da_file" value="Y" class="has_not_obtained_da_file" id="checkbox3">
                                                <label for="checkbox3"> Not obtained yet </label>
                                            </div>
                                        </span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <center><h3>Additional Features</h3></center>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group checkbox checkbox-success">
                                        <input type="checkbox" name="is_urgent_project" value="Y" id="checkbox3" <?php if(isset($_POST['is_urgent_project'])) echo " checked ";?>>
                                        <label for="checkbox3"> Urgent Project($30) </label>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="display: none !important;">
                                    <div class="form-group">
                                        <div class="form-group checkbox checkbox-success">
                                            <input type="checkbox" name="is_hiring_iwtb_expert" value="Y" id="checkbox3" <?php if(isset($_POST['is_hiring_iwtb_expert'])) echo " checked ";?>>
                                            <label for="checkbox3"> Hire an IWTB expert </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="display: none;" id="upoaded_imgs">
                        
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <button type="submit" name="submitButton" id="submitButton" class="btn btn-primary">Submit</button>
                                        <a href="../index" class="btn btn-danger"><i class="icon-close"></i> Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->




<!-- feedback modal to provide feedback to the contractors -->
<div id="responsive-modal" class="modal fade hiringIwtbProjectManagerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" data-toggle="validator" class="feedbackProvidingForm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#10007;</button>
                    <h4 class="modal-title">Hire an IWTB project manager!</h4> 
                </div>
                <div class="modal-body">
                    <div class="form-group" style="overflow: hidden;">
                        <h3>Get an IWTB manager to help you with your project and hire the right people.</h3>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="hiringIwtbProjectManagerSubmitButton" class="btn btn-success waves-effect waves-light"><i class="icon-arrow-right-circle"></i> Pay through EWay</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        // check after failed project creation submit //
        var is_da_approval_required = $("#is_da_approval_required").val();
        if(is_da_approval_required == "Y")
            $("#daFile").prop('disabled', false);
        else
           $("#daFile").prop('disabled', true); 
        $("#submitButton").click(function(){
            $("#upoaded_imgs").empty(); 
            $(".template-download").each(function()
            {
                $(this).find('p.name a').each(function()
                {
                    url = $(this).attr('href');
                    html = '<input type="hidden" name="project_imgs[]" value="'+url+'" />';
                    $("#upoaded_imgs").append(html);
                })  
            }); 
            ///////////////// budget selection validation ///////////////////////
            var budget_range = $("#budget_range").val();
            var fixed_budget = $("#fixed_budget").val();
            if(budget_range == "" && fixed_budget == "") {
                $("#errorMessage").html("Please select budget!");
                $(".errorNotificationAlert").show();        
                return false;
            }else if(budget_range != "" && fixed_budget != "") {
                $("#errorMessage").html("Please select only one type of price!");
                $(".errorNotificationAlert").show(); 
                return false;
            }
            //////////////////////// Trade selection validation////////////////////////////
            var options = $('#trades option:selected');
            if(options.length == 0){
                $("#errorMessage").html("Please select any Trade!");
                $(".errorNotificationAlert").show();
                return false;
            }
            ////// Da approval and file upload control //////////////////////////////
            var is_da_approval_required = $("#is_da_approval_required").val();
            if(is_da_approval_required == "Y"){
                if($("#daFile").val() == "" && !$(".has_not_obtained_da_file").is(":checked")){
                    $("#errorMessage").html("Please check DA file issue!");
                    $(".errorNotificationAlert").show();
                    return false;
                } else {
                    if($("#daFile").val() != "" && $(".has_not_obtained_da_file").is(":checked")){
                        $("#errorMessage").html("Please check DA file issue!");
                        $(".errorNotificationAlert").show();
                        return false;
                    }
                }
            }          
        });
        $("#is_da_approval_required").change(function(){
            var is_da_approval_required = $("#is_da_approval_required").val();
            if(is_da_approval_required == "Y")
                $("#daFile").prop('disabled', false);
            else
               $("#daFile").prop('disabled', true); 
        });
        
        $(".hiringIwtbProjectManagerButton").click(function(){
            $(".hiringIwtbProjectManagerModal").modal();
        });
    });
</script>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> Upload file is failed. The uploaded file exceeds the maximum allowed size.</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>     
<style>
#fileupload .fade
{
    opacity: 1;
}
.table {
    margin-top: 15px;
}
</style>
<script>

$(function () {
    'use strict';

    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: base_url + 'upload/do_upload/'
    });
    
    // Enable iframe cross-domain access via redirect option:
    $('#fileupload').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )
    );

    if (window.location.hostname === 'blueimp.github.io') {
        // Demo settings:
        $('#fileupload').fileupload('option', {
            url: '//jquery-file-upload.appspot.com/',
            // Enable image resizing, except for Android and Opera,
            // which actually support image resizing, but fail to
            // send Blob objects via XHR requests:
            disableImageResize: /Android(?!.*Chrome)|Opera/
                .test(window.navigator.userAgent),
            maxFileSize: 999000,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
        });
        // Upload server status check for browsers with CORS support:
        if ($.support.cors) {
            $.ajax({
                url: '//jquery-file-upload.appspot.com/',
                type: 'HEAD'
            }).fail(function () {
                $('<div class="alert alert-danger"/>')
                    .text('Upload server currently unavailable - ' +
                            new Date())
                    .appendTo('#fileupload');
            });
        }
    } else {
        // Load existing files:
        $('#fileupload').addClass('fileupload-processing');
        var first_time = 1;
        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: $('#fileupload').fileupload('option', 'url') + '/?first=' + first_time,
            dataType: 'json',
            context: $('#fileupload')[0]
        }).always(function () {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
            $(this).fileupload('option', 'done')
                .call(this, $.Event('done'), {result: result});
            first_time = 0;             
        });
    }

});
</script>