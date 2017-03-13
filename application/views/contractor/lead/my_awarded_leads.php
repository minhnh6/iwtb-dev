  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-12">
          <h4 class="page-title">Home</h4>
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">My Bids</li>
          </ol>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- row -->
      <div class="row">
        <div class="col-sm-12">
          <div class="white-box">
            <center><h3>My Awardeds</h3></center>
            <center><p class="text-muted m-b-30">View All Project Lists, where I've awarded</p></center>
            <hr>
            <table id="myTable" class="table table-striped">
              <thead>
                <tr>
                  <th>Project Name</th>
                  <th>Suburb</th>
                  <th>Date of creation</th>
                  <th>My Bid</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                 
                 if($awardProjectList && count($awardProjectList) > 0)
                 {
                    foreach ($awardProjectList as $project)
                    {                       
                        ?>
                         <tr>
                              <td><a href="<?php echo base_url();?>contractor/lead/awardedLeadDetails/<?=$project['project_id'];?>"><?=$project['name'];?></a></td>
                              <td><?=$project['suburb'];?></td>
                              <?php
                              $date = new DateTime($project['added_on']);                                
                              echo "<td>".$date->format('d-M-Y')."</td>";
                              ?>                                                     
                              <td>$<?=$project['bid_amount'];?></td>
                                <?php
                                if($project['bid_status'] == 'Accepted')
                                {
                                    ?>                                    
                                      <td>
                                         <span style="color: red; font-weight: bold ">Accepted</span> 
                                      </td>                                    
                                <?php
                                }
                                else
                                {
                                    if($project['bid_status'] == 'Rejected')
                                    {
                                        ?>                                       
                                          <td>
                                               <span style="color: grey; font-weight: bold ">Rejected</span>
                                          </td>                                       
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                              <td>
                                                  <a class="btn btn-success" href="<?php echo base_url();?>contractor/lead/acceptAwardProject/<?=$project['project_id'];?>/<?=$project['bid_id'];?>"><i class="icon-like"></i> Accept</a>
                                                  <a class="btn btn-danger" href="<?php echo base_url();?>contractor/lead/rejecttAwardProject/<?=$project['project_id'];?>/<?=$project['bid_id'];?>"><i class="icon-dislike"></i> Reject</a>
                                              </td>                                        
                                        <?php
                                    }
                                }
                                ?>
                        </tr>
                        <?php
                        
                    }
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
          $(".myAwarded").addClass("active");
          $(".myAwarded a").addClass("active");
      });
  </script>
  