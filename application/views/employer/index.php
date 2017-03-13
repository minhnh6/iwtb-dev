  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-12">
          <h4 class="page-title">Home</h4>
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">My Projects</li>
          </ol>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- row -->
      <div class="row">
        <div class="col-sm-12">
          <div class="white-box">
            <center><h3>My Projects</h3></center>
            <center><p class="text-muted m-b-30">View All Project Lists</p></center>
            <a class="btn btn-success" href="<?php echo base_url();?>employer/project/addNew"><i class="icon-plus"></i> Create New Project</a>
            <hr>
            <table id="myTable" class="table table-striped">
              <thead>
                <tr>
                  <th>Project Name</th>
                  <th>No Of Bids</th>
                  <th>Project Status</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                        $baseUrl = base_url();
                        foreach($projectList as $aProject) {
                            if($aProject['project_status'] == "Ended") {
                                $labelClass = "label-primary";
                            } else {
                                $labelClass = "label-success";
                            }
                            echo "<tr>";
                                echo "<td><a href='{$baseUrl}employer/project/viewDetails/{$aProject['project_id']}'>{$aProject['name']}</a></td>";
                                echo "<td>{$aProject['total_bid']}</td>";
                                echo "<td><span class='label {$labelClass}'>{$aProject['project_status']}</span></td>";
                            echo "</tr>";
                        }
                  ?>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->