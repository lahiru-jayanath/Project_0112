        
<!-- begin body -->
<div class="page-wrapper-row full-height">
    <div class="page-wrapper-middle">
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Dashboard</h1>
                        </div>
                        <!-- END PAGE TITLE -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">

                            <!-- =============================================== daily sale widget (Management)================================================================ -->

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="dashboard-stat dashboard-stat-v2 green">
                                        <div class="visual">
                                            <i class="fa fa-dollar"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                Rs.
                                                <span data-counter="counterup" data-value="1349">
                                                <?php 
                                                  if($today_income)
                                                  {
                                                      $sum = 0;
                                                      foreach($today_income as $income){

                                                         $sum = $income->total + $sum; 
                                                      }
                                                      echo $sum;
                                                  }
                                                  else {
                                                      echo 0;
                                                  }
                                                ?>    
                                                    
                                                </span>
                                            </div>
                                            <div class="desc"> TODAY TOTAL INCOME </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="dashboard-stat dashboard-stat-v2 red-mint">
                                        <div class="visual">
                                            <i class="fa fa-birthday-cake"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                Rs.
                                                <span data-counter="counterup" data-value="1349">
                                                      <?php 
                                                  if($today_income)
                                                  {
                                                      $sum = 0;
                                                      foreach($today_income as $income){
                                                            if($income->type =='F'){
                                                         $sum = $income->total + $sum; 
                                                            }
                                                      }
                                                      echo $sum;
                                                  }
                                                  else {
                                                      echo 0;
                                                  }
                                                ?>    
                                                </span>
                                            </div>
                                            <div class="desc"> TODAY FOOD INCOME </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="dashboard-stat dashboard-stat-v2 purple">
                                        <div class="visual">
                                            <i class="fa fa-coffee"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                Rs.
                                                <span data-counter="counterup" data-value="1349">
                                                       <?php 
                                                  if($today_income)
                                                  {
                                                      $sum = 0;
                                                      foreach($today_income as $income){
                                                            if($income->type =='B'){
                                                         $sum = $income->total + $sum; 
                                                            }
                                                      }
                                                      echo $sum;
                                                  }
                                                  else {
                                                      echo 0;
                                                  }
                                                ?>  
                                                    
                                                </span>
                                            </div>
                                            <div class="desc"> TODAY BEVERAGES INCOME </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="dashboard-stat dashboard-stat-v2 blue">
                                        <div class="visual">
                                            <i class="fa fa-glass"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                 Rs.
                                                 <span data-counter="counterup" data-value="1349">
                                                          <?php 
                                                  if($today_income)
                                                  {
                                                      $sum = 0;
                                                      foreach($today_income as $income){
                                                            if($income->type =='D'){
                                                         $sum = $income->total + $sum; 
                                                            }
                                                      }
                                                      echo $sum;
                                                  }
                                                  else {
                                                      echo 0;
                                                  }
                                                ?>
                                                     
                                                 </span>
                                            </div>
                                            <div class="desc"> TODAY BAR INCOME </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            
                            <!-- ===================================================week, month, report according(management)=========================================================== -->
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN ACCORDION PORTLET-->
                                    <div class="portlet box green">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-newspaper-o"></i>Summery Report </div>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse"> </a>

                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="panel-group accordion" id="accordion1">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"> Last Day Income</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse_1" class="panel-collapse in">
                                                        <div class="panel-body">
                                                            <div class="row widget-row">
                                                                <div class="col-md-3">
                                                                    <!-- BEGIN WIDGET THUMB -->
                                                                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                                        <h4 class="widget-thumb-heading">Last Day TOtal Income</h4>
                                                                        <div class="widget-thumb-wrap">
                                                                            <i class="widget-thumb-icon bg-green icon-bar-chart"></i>
                                                                            <div class="widget-thumb-body">
                                                                                <span class="widget-thumb-subtitle">RS</span>
                                                                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">
                                                                                     <?php 
                                                  if($lastday_income)
                                                  {
                                                      $sum = 0;
                                                      foreach($lastday_income as $income){

                                                         $sum = $income->total + $sum; 
                                                      }
                                                      echo $sum;
                                                  }
                                                  else {
                                                      echo 0;
                                                  }
                                                ?>    
                                               
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END WIDGET THUMB -->
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <!-- BEGIN WIDGET THUMB -->
                                                                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                                        <h4 class="widget-thumb-heading">Last Day Food Income</h4>
                                                                        <div class="widget-thumb-wrap">
                                                                            <i class="widget-thumb-icon bg-red icon-bar-chart"></i>
                                                                            <div class="widget-thumb-body">
                                                                                <span class="widget-thumb-subtitle">RS</span>
                                                                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="1,293">
                                                                                          <?php 
                                                  if($lastday_income)
                                                  {
                                                      $sum = 0;
                                                      foreach($lastday_income as $income){
                                                            if($income->type =='F'){
                                                         $sum = $income->total + $sum; 
                                                            }
                                                      }
                                                      echo $sum;
                                                  }
                                                  else {
                                                      echo 0;
                                                  }
                                                ?>
                                                                                    
                                                                                    
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END WIDGET THUMB -->
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <!-- BEGIN WIDGET THUMB -->
                                                                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                                        <h4 class="widget-thumb-heading">Last Day Beverages Income</h4>
                                                                        <div class="widget-thumb-wrap">
                                                                            <i class="widget-thumb-icon bg-purple icon-bar-chart"></i>
                                                                            <div class="widget-thumb-body">
                                                                                <span class="widget-thumb-subtitle">RS</span>
                                                                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="815">
                                                                                 <?php 
                                                  if($lastday_income)
                                                  {
                                                      $sum = 0;
                                                      foreach($lastday_income as $income){
                                                            if($income->type =='B'){
                                                         $sum = $income->total + $sum; 
                                                            }
                                                      }
                                                      echo $sum;
                                                  }
                                                  else {
                                                      echo 0;
                                                  }
                                                ?>    
                                                                                
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END WIDGET THUMB -->
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <!-- BEGIN WIDGET THUMB -->
                                                                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                                        <h4 class="widget-thumb-heading">Last Day Bar Income</h4>
                                                                        <div class="widget-thumb-wrap">
                                                                            <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                                                                            <div class="widget-thumb-body">
                                                                                <span class="widget-thumb-subtitle">RS</span>
                                                                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="5,071">
                                                                                     <?php 
                                                  if($lastday_income)
                                                  {
                                                      $sum = 0;
                                                      foreach($lastday_income as $income){
                                                            if($income->type =='D'){
                                                         $sum = $income->total + $sum; 
                                                            }
                                                      }
                                                      echo $sum;
                                                  }
                                                  else {
                                                      echo 0;
                                                  }
                                                ?>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END WIDGET THUMB -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2"> Last Week Income </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse_2" class="panel-collapse collapse">
                                                        <div class="panel-body" style="height:200px; overflow-y:auto;">
                                                            <div class="row widget-row">
                                                                <div class="col-md-3">
                                                                    <!-- BEGIN WIDGET THUMB -->
                                                                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                                        <h4 class="widget-thumb-heading">Last Week TOtal Income</h4>
                                                                        <div class="widget-thumb-wrap">
                                                                            <i class="widget-thumb-icon bg-green icon-bar-chart"></i>
                                                                            <div class="widget-thumb-body">
                                                                                <span class="widget-thumb-subtitle">RS</span>
                                                                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">
                                                                                             <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">
                                                                                     <?php 
                                                  if($lastweek_income)
                                                  {
                                                      $sum = 0;
                                                      foreach($lastweek_income as $income){

                                                         $sum = $income->total + $sum; 
                                                      }
                                                      echo $sum;
                                                  }
                                                  else {
                                                      echo 0;
                                                  }
                                                ?>    
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END WIDGET THUMB -->
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <!-- BEGIN WIDGET THUMB -->
                                                                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                                        <h4 class="widget-thumb-heading">Last Week Food Income</h4>
                                                                        <div class="widget-thumb-wrap">
                                                                            <i class="widget-thumb-icon bg-red icon-bar-chart"></i>
                                                                            <div class="widget-thumb-body">
                                                                                <span class="widget-thumb-subtitle">RS</span>
                                                                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="1,293">
                                                                                    <?php 
                                                  if($lastweek_income)
                                                  {
                                                      $sum = 0;
                                                      foreach($lastweek_income as $income){
                                                            if($income->type =='F'){
                                                         $sum = $income->total + $sum; 
                                                            }
                                                      }
                                                      echo $sum;
                                                  }
                                                  else {
                                                      echo 0;
                                                  }
                                                ?>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END WIDGET THUMB -->
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <!-- BEGIN WIDGET THUMB -->
                                                                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                                        <h4 class="widget-thumb-heading">Last Week Beverages Income</h4>
                                                                        <div class="widget-thumb-wrap">
                                                                            <i class="widget-thumb-icon bg-purple icon-bar-chart"></i>
                                                                            <div class="widget-thumb-body">
                                                                                <span class="widget-thumb-subtitle">RS</span>
                                                                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="815">
                                                                                      <?php 
                                                  if($lastweek_income)
                                                  {
                                                      $sum = 0;
                                                      foreach($lastweek_income as $income){
                                                            if($income->type =='B'){
                                                         $sum = $income->total + $sum; 
                                                            }
                                                      }
                                                      echo $sum;
                                                  }
                                                  else {
                                                      echo 0;
                                                  }
                                                ?>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END WIDGET THUMB -->
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <!-- BEGIN WIDGET THUMB -->
                                                                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                                        <h4 class="widget-thumb-heading">Last Week Bar Income</h4>
                                                                        <div class="widget-thumb-wrap">
                                                                            <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                                                                            <div class="widget-thumb-body">
                                                                                <span class="widget-thumb-subtitle">RS</span>
                                                                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="5,071">
                                                                                      <?php 
                                                  if($lastweek_income)
                                                  {
                                                      $sum = 0;
                                                      foreach($lastweek_income as $income){
                                                            if($income->type =='D'){
                                                         $sum = $income->total + $sum; 
                                                            }
                                                      }
                                                      echo $sum;
                                                  }
                                                  else {
                                                      echo 0;
                                                  }
                                                ?>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END WIDGET THUMB -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3"> Last Month Income </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse_3" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <div class="row widget-row">
                                                                <div class="col-md-3">
                                                                    <!-- BEGIN WIDGET THUMB -->
                                                                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                                        <h4 class="widget-thumb-heading">Last Month TOtal Income</h4>
                                                                        <div class="widget-thumb-wrap">
                                                                            <i class="widget-thumb-icon bg-green icon-bar-chart"></i>
                                                                            <div class="widget-thumb-body">
                                                                                <span class="widget-thumb-subtitle">RS</span>
                                                                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">
                                                                                        <?php 
                                                  if($lastmonth_income)
                                                  {
                                                      $sum = 0;
                                                      foreach($lastmonth_income as $income){

                                                         $sum = $income->total + $sum; 
                                                      }
                                                      echo $sum;
                                                  }
                                                  else {
                                                      echo 0;
                                                  }
                                                ?>    
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END WIDGET THUMB -->
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <!-- BEGIN WIDGET THUMB -->
                                                                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                                        <h4 class="widget-thumb-heading">Last Month Food Income</h4>
                                                                        <div class="widget-thumb-wrap">
                                                                            <i class="widget-thumb-icon bg-red icon-bar-chart"></i>
                                                                            <div class="widget-thumb-body">
                                                                                <span class="widget-thumb-subtitle">RS</span>
                                                                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="1,293">
                                                                                      <?php 
                                                  if($lastmonth_income)
                                                  {
                                                      $sum = 0;
                                                      foreach($lastmonth_income as $income){
                                                            if($income->type =='F'){
                                                         $sum = $income->total + $sum; 
                                                            }
                                                      }
                                                      echo $sum;
                                                  }
                                                  else {
                                                      echo 0;
                                                  }
                                                ?>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END WIDGET THUMB -->
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <!-- BEGIN WIDGET THUMB -->
                                                                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                                        <h4 class="widget-thumb-heading">Last Month Beverages Income</h4>
                                                                        <div class="widget-thumb-wrap">
                                                                            <i class="widget-thumb-icon bg-purple icon-bar-chart"></i>
                                                                            <div class="widget-thumb-body">
                                                                                <span class="widget-thumb-subtitle">RS</span>
                                                                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="815">
                                                                                      <?php 
                                                  if($lastmonth_income)
                                                  {
                                                      $sum = 0;
                                                      foreach($lastmonth_income as $income){
                                                            if($income->type =='B'){
                                                         $sum = $income->total + $sum; 
                                                            }
                                                      }
                                                      echo $sum;
                                                  }
                                                  else {
                                                      echo 0;
                                                  }
                                                ?>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END WIDGET THUMB -->
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <!-- BEGIN WIDGET THUMB -->
                                                                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                                        <h4 class="widget-thumb-heading">Last Month Bar Income</h4>
                                                                        <div class="widget-thumb-wrap">
                                                                            <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                                                                            <div class="widget-thumb-body">
                                                                                <span class="widget-thumb-subtitle">RS</span>
                                                                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="5,071">
                                                                                      <?php 
                                                  if($lastmonth_income)
                                                  {
                                                      $sum = 0;
                                                      foreach($lastmonth_income as $income){
                                                            if($income->type =='D'){
                                                         $sum = $income->total + $sum; 
                                                            }
                                                      }
                                                      echo $sum;
                                                  }
                                                  else {
                                                      echo 0;
                                                  }
                                                ?>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END WIDGET THUMB -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END ACCORDION PORTLET-->
                                </div>
                            </div>
                            <!-- ====================================================end week, month report according===================================================================== -->

                            <!-- =================================================== restaurent and bar ========================================================================= -->

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN THUMBNAILS PORTLET-->
                                    <div class="portlet light ">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cart-plus font-blue"></i>
                                                <span class="caption-subject font-blue bold uppercase">Sales</span>
                                            </div>
                                            <div class="actions">

                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-3">
                                                    <a href="javascript:;" class="thumbnail">
                                                        <img src="assets/global/img/portfolio/400x300/food.png" alt="100%x180" style="height: 180px; width: 100%; display: block;"> </a>
                                                </div>
                                                <div class="col-sm-6 col-md-3">
                                                    <a href="javascript:;" class="thumbnail">
                                                        <img src="assets/global/img/portfolio/400x300/liquor.png" alt="100%x180" style="height: 180px; width: 100%; display: block;"> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END THUMBNAILS PORTLET-->
                                </div>
                            </div>
                            <!-- =================================================== end restaurent and bar ===================================================================== -->


                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

        </div>
        <!-- END CONTAINER -->
    </div>
</div>
