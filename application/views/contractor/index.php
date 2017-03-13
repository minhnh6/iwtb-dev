  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-12">
          <h4 class="page-title">Home</h4>
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">My Leads</li>
          </ol>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- row -->
      <div class="row">
        <div class="col-sm-12">
          <div class="white-box">
            <center><h3>My Leads</h3></center>
            <center><p class="text-muted m-b-30">View All Project Lists</p></center>
            <hr>
            <table id="myTable" class="table table-striped">
              <thead>
                <tr>
                  <th>Project Name</th>
                  <th>Suburb</th>
                  <th>Date of creation</th>
                </tr>
              </thead>
              <tbody>
                    <?php
                        foreach($leadList as $aLead) {
                            echo "<tr>";
                                echo "<td><a href='lead/viewDetails/{$aLead['project_id']}/{$aLead['user_id']}'>{$aLead['name']}</a></td>";
                                echo "<td>{$aLead['suburb']}</td>";                               
                                $date = new DateTime($aLead['added_on']);                                
                                echo "<td>".$date->format('d-M-Y')."</td>";
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
  <script type="text/javascript">
      $(document).ready(function(){
          $(".myLeads").addClass("active");
          $(".myLeads a").addClass("active");
      });
  </script>