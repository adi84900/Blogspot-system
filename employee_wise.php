<?php
ob_start();
session_start();
if(!$_SESSION['userid']){
   header("location:index.php");
   die;
}
include_once('config/config.php');
include_once('config/php_mysql_class.php');
include_once('config/function.php');

function ExportCSVFile($records) {
	// create a file pointer connected to the output stream
	$fh = fopen( 'php://output', 'w' );
	$heading = false;
		if(!empty($records))
		  foreach($records as $row) {
			if(!$heading) {
			  // output the column headings
			  fputcsv($fh, array_keys($row));
			  $heading = true;
			}
			// loop over the rows, outputting them
			 fputcsv($fh, array_values($row));
			 
		  }
		  fclose($fh);
}
function ExportFile($records) {
	$heading = false;
	if(!empty($records))
	  foreach($records as $row) {
		if(!$heading) {
		  // display field/column names as a first row
		  echo implode("\t", array_keys($row)) . "\n";
		  $heading = true;
		}
		echo implode("\t", array_values($row)) . "\n";
	  }
	exit;
}
//print_r($_SESSION);
//$page = (int) $_GET['page'];
$page = isset($_GET['page']) ? mysql_real_escape_string($_GET['page']) : 0;
if ($page < 1) $page = 1;
$numberOfPages = 5;
$resultsPerPage = 30;
$startResults = ($page - 1) * $resultsPerPage;
$mysql = new mysql();
 $user_name=$_SESSION['userid'];
 $userid= $_SESSION['userid'];
 $user_types=$_SESSION['user_type'];
 //echo $user_types;
 
 if(isset($_REQUEST['filter_submit']))
 {
  //print_r($_GET);die();
  $emp_id=$_GET['emp_id'];
  $assesment_month=$_GET['assesment_month'];
  $fromdate_filter=$_GET['fromdate_filter'];
  $todate_filter=$_GET['todate_filter'];
  if($emp_id==0)
  {
  $emp_id='';
  }
   
  
  if ($assesment_month == 0) {
        $assesment_month = '';
    } else {
        $assesment_month = date("Y-m", strtotime($assesment_month));
    }
  
   if($fromdate_filter!='' && $todate_filter!='')
  {
   $fromdate_filter= date("Y-m-d h:m:s", strtotime($fromdate_filter));
   $todate_filter= date("Y-m-d  h:m:s", strtotime($todate_filter));
   $condition = "(`assesment_month` LIKE '%$assesment_month%') AND created_date between '$fromdate_filter' and '$todate_filter' and `emp_id` = '$emp_id' ";
   $condition1 = "(emp_id = '$emp_id')";
  }
  else
  {
   $condition = "`emp_id` LIKE '%$emp_id%' AND `assesment_month` LIKE '%$assesment_month%'";
  }
		 $numberOfRows  = $mysql->countRows(array('table' => 'ews_detail', 'fields' => '*', 'condition'=> $condition,'order'=>'created_date DESC'));
		 $totalPages = ceil($numberOfRows / $resultsPerPage);
		  $users_ews=  $mysql->select(array('table'=>'ews_detail','fields'=>'*','condition'=> $condition,'order'=>'created_date DESC','limit' =>$resultsPerPage,'offset' =>$startResults));
		 $users_ews_export= $mysql->select(array('table'=>'ews_detail','fields'=>'*','condition'=> $condition,'order'=>'created_date DESC'));
 }
 
 
 
 if(isset($_POST["ExportType"]))
{

              $data = array();
		      foreach ($users_ews_export  as $values_export) {
			                            $bu_ids= $values_export['ews_detail']['business_unit'];
										$department= $values_export['ews_detail']['department'];
										$business_name=$mysql->get('business_name','business_name','business_code='.$bu_ids);
										$department=$mysql->get('department_master','department_name','id='.$department);
										$emp_id= $values_export['ews_detail']['emp_id'];
										$id= $values_export['ews_detail']['id'];
										$supervisor_detail= $values_export['ews_detail']['supervisor_detail'];
										$manager_detail= $values_export['ews_detail']['manager_detail'];
										$criticality_check= $values_export['ews_detail']['criticality_check'];
										if($criticality_check == 1)
										{
										 $criticality="High";
										}
										else if($criticality_check == 2)
										{
										 $criticality="Medium";
										}
										else if($criticality_check == 3)
										{
										 $criticality="Low";
										}
										
										$supervisor_comment= $values_export['ews_detail']['comment'];
										if($supervisor_comment!='') {
										$comment_new=$supervisor_comment;
										}else{
										 $comment_new='N/A';
										}
										
										$supervisor_action_plan= $values_export['ews_detail']['action_plan'];
										if($supervisor_action_plan!='') {
										$action_plan_new=$supervisor_action_plan;
										}else{
										 $action_plan_new='N/A';
										}	
									
									$events_detail_total=$values_export['ews_detail']['one_on_one_ass']+$values_export['ews_detail']['performance']+$values_export['ews_detail']['leave_r']+$values_export['ews_detail']['external_interviews']+$values_export['ews_detail']['behavior_motivation']+$values_export['ews_detail']['personal_effectiveness']+$values_export['ews_detail']['career_growth']+$values_export['ews_detail']['skill_set'];
									if($events_detail_total <= 23)
									{
									$risk="High";
									}
									else if($events_detail_total  >= 24 && $events_detail_total  <= 29)
									{
									$risk="Medium";
									}
									else if($events_detail_total >= 30)
									{
									$risk="Low";
									}
									
								$first_name=$mysql->get('users','first_name','user_id='.$emp_id);
								$last_name=$mysql->get('users','last_name','user_id='.$emp_id);
								$username=$mysql->get('users','username','user_id='.$emp_id);
								
								$filledby_fname=$mysql->get('users','first_name','user_id='.$supervisor_detail);
					            $filledby_lname=$mysql->get('users','last_name','user_id='.$supervisor_detail);
								$filledby_id=$mysql->get('users','username','user_id='.$supervisor_detail);
								
								 $status=$mysql->get('users','status','user_id='.$emp_id);
													 if($status==0)
													 {
													   $emp_status = 'Active';
													 }
													 else
													 {
													   $emp_status = 'Resigned';
													 }
								
			  
			  $data[] = array('Employee Details' => $first_name.' '.$last_name.' ('.$username.')', 'Filled By' => $filledby_fname.' '.$filledby_lname.' ('.$filledby_id.')', 'Month Of Assesment' => date('F Y', strtotime($values_export['ews_detail']['assesment_month'])), 'Meet up Date' => date('d F Y', strtotime($values_export['ews_detail']['meeting_date'])),'Created Date' => date('d F Y', strtotime($values_export['ews_detail']['created_date'])),'Criticality' => $criticality,'Risk' => $risk,'Emp Status' => $emp_status,'Performance' => $values_export['ews_detail']['performance'],'Leave' => $values_export['ews_detail']['leave_r'],'External Interviews' => $values_export['ews_detail']['external_interviews'],'Behavior/ Motivation' => $values_export['ews_detail']['behavior_motivation'],'Personal Effectiveness' => $values_export['ews_detail']['personal_effectiveness'],'Career Growth' => $values_export['ews_detail']['career_growth'],'Skill Set' => $values_export['ews_detail']['skill_set'],'1 to 1 Assessment' => $values_export['ews_detail']['one_on_one_ass'],'Comment' => $comment_new,'Action Plan' => $action_plan_new);
			}
			
			

	switch($_POST["ExportType"])
    {
        case "export-to-excel" :
            // Submission from
			$filename = "export-ews-".date('d-F-Y').".xls";		 
            header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=\"$filename\"");
			ExportFile($data);
			//$_POST["ExportType"] = '';
            exit();
		case "export-to-csv" :
            // Submission from
			$filename = "export-ews-".date('d-F-Y').".csv";		 
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Content-type: text/csv");
			header("Content-Disposition: attachment; filename=\"$filename\"");
			header("Expires: 0");
			ExportCSVFile($data);
			//$_POST["ExportType"] = '';
            exit();
        default :
            die("Unknown action : ".$_POST["action"]);
            break;
    }
}			
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Employee Wise Retention | Retention</title>
<?php include_once('includes/allcss.php'); ?>
</head>
<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">
  <?php include_once('includes/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php
		  if($_SESSION['user_type']==1) {
				include('includes/leftside_admin.php');
			 } elseif($_SESSION['user_type']==3) {
				include('includes/leftside_hr.php');
			 } elseif($_SESSION['user_type']==4) {
			  include('includes/leftside_amdm.php');
		  } elseif($_SESSION['user_type']==5) {
			   include('includes/leftside_manager.php');
		  } 
	   ?>
  <?php //include_once('includes/leftside.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Employee Wise Retention</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> My Dashboard</a></li>
        <li class="active">Employee Wise Retention</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-body">
              <div class="row">
                <form action="" method="get" name="userews" id="employee_wise_search">
				<?php
				 if($_SESSION['user_type']==5)
				 {
				 ?>
                  <div class="col-md-2">
                    <div class="form-group" id="employee_div">
                      <label>Employee Name</label>
                      <select name="emp_id" class="form-control select2" id="emp_id">
                        <option value="" selected="selected">Select Employee</option>
                        <?php 
				 $bu_id_new=$_SESSION['business_unit'];
				 $department_id_new=$_SESSION['department'];
				 $manager_detail_new=$_SESSION['manager_id'];
				 $amdm_detail_new=$_SESSION['userid'];
				 $manager_ids=$mysql->get('users','username','user_id='.$amdm_detail_new);
				 $supervisor_name_new= $mysql->select(array('table'=>'users','fields'=>'*','condition'=>'business_unit='.$bu_id_new.' and manager_id LIKE "%'.$manager_ids.'%" and user_type!=6 and status=0','order'=>'first_name'));
				  foreach($supervisor_name_new as $key=>$valuesupervisor)
					 {
				 ?>
                        <option value="<?php echo $valuesupervisor['users']['user_id']; ?>" disabled="disabled"><?php echo $valuesupervisor['users']['first_name'].' '. $valuesupervisor['users']['last_name']."(".$valuesupervisor['users']['username'].")"; ?></option>
						 <?php $employee_list= $mysql->select(array('table'=>'users','fields'=>'*','condition'=>'business_unit='.$bu_id_new.' and manager_id LIKE "%'.$valuesupervisor['users']['username'].'%" and status=0 and user_type=6','order'=>'first_name'));
							foreach($employee_list as $key=>$valuesemployee)
							 {  ?>
							<option value="<?php echo $valuesemployee['users']['user_id']; ?>" <?php if(isset($_GET['emp_id'])){if($_GET['emp_id']==$valuesemployee['users']['user_id']) echo "selected";}?>>&nbsp;&nbsp;-- <?php echo $valuesemployee['users']['first_name'].' '. $valuesemployee['users']['last_name']."(".$valuesemployee['users']['username'].")"; ?> </option>
                        <?php }
						 } ?>
						 <?php $amdm_detail_new=$_SESSION['userid'];
				 $manager_ids=$mysql->get('users','username','user_id='.$amdm_detail_new);
				 $supervisor_name_new= $mysql->select(array('table'=>'users','fields'=>'*','condition'=>'business_unit='.$bu_id_new.' and manager_id LIKE "%'.$manager_ids.'%" and user_type=6 and status=0','order'=>'first_name'));
				  foreach($supervisor_name_new as $key=>$valuesupervisor)
					 {
				 ?>
                        <option value="<?php echo $valuesupervisor['users']['user_id']; ?>" <?php if(isset($_GET['emp_id'])){if($_GET['emp_id']==$valuesupervisor['users']['user_id']) echo "selected";}?>> <?php echo $valuesupervisor['users']['first_name'].' '. $valuesupervisor['users']['last_name']."(".$valuesupervisor['users']['username'].")"; ?> </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
				  <?php } else { ?>
				  <div class="col-md-2">
                    <div class="form-group" id="employee_div">
                      <label>Employee Name</label>
                      <select name="emp_id" class="form-control select2" id="emp_id">
                        <option value="" selected="selected">Select Employee</option>
                        <?php 
				 $bu_id_new=$_SESSION['business_unit'];
				 $department_id_new=$_SESSION['department'];
				 $manager_detail_new=$_SESSION['manager_id'];
				 $amdm_detail_new=$_SESSION['userid'];
				 $manager_ids=$mysql->get('users','username','user_id='.$amdm_detail_new);
				 $supervisor_name_new= $mysql->select(array('table'=>'users','fields'=>'*','condition'=>'business_unit='.$bu_id_new.' and manager_id LIKE "%'.$manager_ids.'%" and user_type=6 and status=0','order'=>'first_name'));
				  foreach($supervisor_name_new as $key=>$valuesupervisor)
					 {
				 ?>
                        <option value="<?php echo $valuesupervisor['users']['user_id']; ?>" <?php if(isset($_GET['emp_id'])){if($_GET['emp_id']==$valuesupervisor['users']['user_id']) echo "selected";}?>> <?php echo $valuesupervisor['users']['first_name'].' '. $valuesupervisor['users']['last_name']."(".$valuesupervisor['users']['username'].")"; ?> </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
				  <?php } ?>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Month Of Assesment</label>
                      <div class="input-group date">
                        <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                        <input class="form-control pull-right" id="assesment_month_search" type="text" name="assesment_month" value="<?php if(isset($_GET['assesment_month'])){ echo $_GET['assesment_month']; }?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>From</label>
                      <div class="input-group date">
                        <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                        <input class="form-control pull-right" id="fromdate_filter" type="text" name="fromdate_filter" value="<?php if(isset($_GET['fromdate_filter'])){ echo $_GET['fromdate_filter']; }?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>To</label>
                      <div class="input-group date">
                        <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                        <input class="form-control pull-right" id="todate_filter" type="text" name="todate_filter" value="<?php if(isset($_GET['todate_filter'])){ echo $_GET['todate_filter']; }?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-1" style="padding-top:25px;">
                    <div class="form-group">
                      <button class="btn btn-success" type="submit" id="filter_submit" name="filter_submit"><span class="fa fa-search" aria-hidden="true"></span> Go</button>
                    </div>
                </div>                      
                </form>
                <?php if(!empty($users_ews)) { ?>
                <form action="" method="post" id="export-form">
                  <input type="hidden" value='' id='hidden-type' name='ExportType'/>
                  <div class="col-md-1" style="padding-top:25px;  padding-left: 0px;">
                    <div class="form-group">
                      <button class="btn btn-success dropdown-toggle" data-toggle="dropdown" name="export_to_excel"><span class="glyphicon glyphicon-export" aria-hidden="true"></span> Export</button>
                      <ul class="dropdown-menu" role="menu" id="export-menu">
                        <li id="export-to-excel"><a href="javascript:void(0);">Export to excel</a></li>
                        <li id="export-to-csv"><a href="javascript:void(0);">Export to csv</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-1" style="padding-top:25px;">
                     <div class="form-group">
                      <button class="btn btn-success" type="button" name="filter_report" id="filter_report"><span class="fa  fa-bar-chart" aria-hidden="true"></span> </button>
                    </div>	
                  </div>
                </form>
                <?php } ?>
                
              </div>
            </div>
          </div>
          <div class="box-body table-responsive no-padding">
            <div id="chartdivtrends" style="width: 100%; height: 300px;"></div>
            </div>
          <?php if(!empty($users_ews)) { ?>
          <div class="box box-success">
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th>Employee Details</th>
                    <th>Filled By</th>
                    <th>Month Of Assesment</th>
                    <th>Meet up Date</th>
                    <th>Created Date</th>
                    <th>Criticality</th>
                    <th>Risk</th>
                    <th>Action</th>
                  </tr>
                  <?php $report_value = array(); 

                  foreach ($users_ews as $users_ewsss) {
			                  	$events_detail_total_sum =$users_ewsss['ews_detail']['one_on_one_ass']+$users_ewsss['ews_detail']['performance']+$users_ewsss['ews_detail']['leave_r']+$users_ewsss['ews_detail']['external_interviews']+$users_ewsss['ews_detail']['behavior_motivation']+$users_ewsss['ews_detail']['personal_effectiveness']+$users_ewsss['ews_detail']['career_growth']+$users_ewsss['ews_detail']['skill_set'];
			                  	$report_value[] = $events_detail_total_sum;
			                 
                  }
                  
				  foreach($users_ews as $key=>$value_ews)
									 { 	 
										$bu_ids= $value_ews['ews_detail']['business_unit'];
										$department= $value_ews['ews_detail']['department'];
										$business_name=$mysql->get('business_name','business_name','business_code='.$bu_ids);
										$department=$mysql->get('department_master','department_name','id='.$department);
										$emp_id= $value_ews['ews_detail']['emp_id'];
										$id= $value_ews['ews_detail']['id'];
										$supervisor_detail= $value_ews['ews_detail']['supervisor_detail'];
										$manager_detail= $value_ews['ews_detail']['manager_detail'];
										$criticality_check= $value_ews['ews_detail']['criticality_check'];
										if($criticality_check == 1)
										{
										 $criticality="<span class='label label-danger'>High</span>";
										}
										else if($criticality_check == 2)
										{
										 $criticality="<span class='label label-warning'>Medium</span>";
										}
										else if($criticality_check == 3)
										{
										 $criticality="<span class='label label-success'>Low</span>";
										}

									$events_detail_total=$value_ews['ews_detail']['one_on_one_ass']+$value_ews['ews_detail']['performance']+$value_ews['ews_detail']['leave_r']+$value_ews['ews_detail']['external_interviews']+$value_ews['ews_detail']['behavior_motivation']+$value_ews['ews_detail']['personal_effectiveness']+$value_ews['ews_detail']['career_growth']+$value_ews['ews_detail']['skill_set'];
						
									
									if($events_detail_total <= 23)
									{
									$risk="<span class='label label-danger'>High</span>";
									$model_class="modal-danger";
									}
									else if($events_detail_total  >= 24 && $events_detail_total  <= 29)
									{
									$risk="<span class='label label-warning'>Medium</span>";
									$model_class="modal-warning";
									}
									else if($events_detail_total >= 30)
									{
									$risk="<span class='label label-success'>Low</span>";
									$model_class="modal-success";
									}
									
									$supervisor_comment= $value_ews['ews_detail']['comment'];
										if($supervisor_comment!='') {
										$comment_new=$supervisor_comment;
										}else{
										 $comment_new='N/A';
										}
										
										$supervisor_action_plan= $value_ews['ews_detail']['action_plan'];
										if($supervisor_action_plan!='') {
										$action_plan_new=$supervisor_action_plan;
										}else{
										 $action_plan_new='N/A';
										}
								 ?>
                  <tr>
                    <td><?php   $first_name=$mysql->get('users','first_name','user_id='.$emp_id);
								$last_name=$mysql->get('users','last_name','user_id='.$emp_id);
								$username=$mysql->get('users','username','user_id='.$emp_id);
								echo $first_name.' '.$last_name.' ('.$username.')';
								 ?></td>
                    <td><?php   $filledby_fname=$mysql->get('users','first_name','user_id='.$supervisor_detail);
					            $filledby_lname=$mysql->get('users','last_name','user_id='.$supervisor_detail);
								$filledby_id=$mysql->get('users','username','user_id='.$supervisor_detail);
								echo $filledby_fname.'&nbsp;'.$filledby_lname.' ('.$filledby_id.')';
								?></td>
                    <td><?php echo date('F Y', strtotime($value_ews['ews_detail']['assesment_month'])); ?></td>
                    <td><?php echo date('d F Y', strtotime($value_ews['ews_detail']['meeting_date'])); ?></td>
                    <td><?php echo date('d F Y', strtotime($value_ews['ews_detail']['created_date'])); ?></td>
                    <td><?php echo $criticality; ?></td>
                    <td><?php echo $risk; ?></td>
                    <td style="cursor:pointer;"><i class="fa fa-eye" aria-hidden="true" data-toggle="modal" data-target="#modal-<?php echo $id; ?>" ></i>
                      <div class="modal <?php echo $model_class; ?> fade" id="modal-<?php echo $id; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" align="center"><?php echo $first_name.' '.$last_name.' ('.$username.')';?></h4>
                            </div>
                            <div class="modal-body" style="background:none!important;">
                              <div class="box-body table-responsive no-padding">
                                <table class="table table-striped" style="color:#000000">
                                  <tbody>
                                    <tr>
                                      <td width="25%">Business Unit:</td>
                                      <td width="25%"><?php echo $business_name;?></td>
                                      <td width="25%">Department:</td>
                                      <td width="25%"><?php echo $department;?></td>
                                    </tr>
                                    <tr>
                                      <td width="25%">Employee Details:</td>
                                      <td width="25%"><?php echo $first_name.' '.$last_name.' ('.$username.')';;?></td>
                                      <td width="25%">Supervisor Details:</td>
                                      <td width="25%"><?php 
										$manager_name=$mysql->get('users','manager_name','user_id='.$emp_id);
										$manager_id=$mysql->get('users','manager_id','user_id='.$emp_id);
										echo $manager_name.' ('.$manager_id.')';
										//echo $mfirst_name.' '.$mlast_name.'('.$musername.')';
										?></td>
                                    </tr>
                                    <tr>
                                      <td width="25%">Filled By:</td>
                                      <td width="25%"><?php   $filledby_fname=$mysql->get('users','first_name','user_id='.$supervisor_detail);
													$filledby_lname=$mysql->get('users','last_name','user_id='.$supervisor_detail);
													$filledby_id=$mysql->get('users','username','user_id='.$supervisor_detail);
													echo $filledby_fname.'&nbsp;'.$filledby_lname.' ('.$filledby_id.')';
													?></td>
                                      <td width="25%">Month Of Assesment:</td>
                                      <td width="25%"><?php echo date('F Y', strtotime($value_ews['ews_detail']['assesment_month'])); ?></td>
                                    </tr>
                                    <tr>
                                      <td width="25%">Meet up Date:</td>
                                      <td width="25%"><?php echo date('d F Y', strtotime($value_ews['ews_detail']['meeting_date'])); ?></td>
                                      <td width="25%">Emp Status:</td>
                                      <td width="25%"><?php
													 $status=$mysql->get('users','status','user_id='.$emp_id);
													 if($status==0)
													 {
													   echo "<span class='label label-success'>Active</span>";
													 }
													 else
													 {
													  echo "<span class='label label-danger'>Resigned</span>";
													 }
													 ?></td>
                                    </tr>
                                    <tr>
                                      <td width="25%">Performance:</td>
                                      <td width="25%"><?php echo $value_ews['ews_detail']['performance']; ?></td>
                                      <td width="25%">Leave:</td>
                                      <td width="25%"><?php echo $value_ews['ews_detail']['leave_r']; ?></td>
                                    </tr>
                                    <tr>
                                      <td width="25%">External Interviews:</td>
                                      <td width="25%"><?php echo $value_ews['ews_detail']['external_interviews']; ?></td>
                                      <td width="25%">Behavior/ Motivation:</td>
                                      <td width="25%"><?php echo $value_ews['ews_detail']['behavior_motivation']; ?></td>
                                    </tr>
                                    <tr>
                                      <td width="25%">Personal Effectiveness:</td>
                                      <td width="25%"><?php echo $value_ews['ews_detail']['personal_effectiveness']; ?></td>
                                      <td width="25%">Career Growth:</td>
                                      <td width="25%"><?php echo $value_ews['ews_detail']['career_growth']; ?></td>
                                    </tr>
                                    <tr>
                                      <td width="25%">Skill Set:</td>
                                      <td width="25%"><?php echo $value_ews['ews_detail']['skill_set']; ?></td>
                                      <td width="25%">1 to 1 Assessment:</td>
                                      <td width="25%"><?php echo $value_ews['ews_detail']['one_on_one_ass']; ?></td>
                                    </tr>
                                    <tr>
                                      <td width="25%">Action:</td>
                                      <td width="75%" colspan="3"><?php echo $action_plan_new; ?></td>
                                    </tr>
                                    <tr>
                                      <td width="25%">Comment:</td>
                                      <td width="75%" colspan="3"><?php echo $comment_new; ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-outline" onClick="PrintFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                              <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div></td>
                  </tr>
                  <?php }  ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <?php $halfPages = floor($numberOfPages / 2);
					$range = array('start' => 1, 'end' => $totalPages);
					$isEven = ($numberOfPages % 2 == 0);
					$atRangeEnd = $totalPages - $halfPages;
					
					if($isEven) $atRangeEnd++;
					
					if($totalPages > $numberOfPages)
					{
						if($page <= $halfPages)
							$range['end'] = $numberOfPages;
						elseif ($page >= $atRangeEnd)
							$range['start'] = $totalPages - $numberOfPages + 1;
						else
						{
							$range['start'] = $page - $halfPages;
							$range['end'] = $page + $halfPages;
							if($isEven) $range['end']--;
						}
					} if($totalPages>1) {  
			   if(isset($_REQUEST['filter_submit']))
                  {		?>
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php if($page > 1)
					echo '<li class="button"><a href="'.$_SERVER['REQUEST_URI'].'&page='.($page - 1).'">&laquo; Previous</a>&nbsp<li>';
				
				for ($i = $range['start']; $i <= $range['end']; $i++)
				{
					if($i == $page)
						echo '<li class="active"><a class="current" href="#">'.$i.'</a></li>';
					else
						echo ' <li><a href="'.$_SERVER['REQUEST_URI'].'&page='.$i.'">'.$i.'</a> </li>';
				}
				if ($page < $totalPages)
					echo ' <li class="button"><a href="'.$_SERVER['REQUEST_URI'].'&page='.($page + 1).'">Next &raquo; </a></li>'; ?>
              </ul>
              <?php } else { ?>
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php if($page > 1)
					echo '<li class="button"><a href="?page='.($page - 1).'">&laquo; Previous</a>&nbsp<li>';
				
				for ($i = $range['start']; $i <= $range['end']; $i++)
				{
					if($i == $page)
						echo '<li class="active"><a class="current" href="#">'.$i.'</a></li>';
					else
						echo ' <li><a href="?page='.$i.'">'.$i.'</a> </li>';
				}
				if ($page < $totalPages)
					echo ' <li class="button"><a href="?page='.($page + 1).'">Next &raquo; </a></li>'; ?>
              </ul>
              <?php } 
			       } ?>
            </div>
          </div>
          <?php } else { 
		   if(isset($_REQUEST['filter_submit']))
            {
		   ?>
          <div class="box box-success">
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th>Employee Details</th>
                    <th>Filled By</th>
                    <th>Month Of Assesment</th>
                    <th>Meet up Date</th>
                    <th>Created Date</th>
                    <th>Criticality</th>
                    <th>Risk</th>
                    <th>Action</th>
                  </tr>
                  <tr>
                    <td colspan="7">No result found.</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <?php }
		   } ?>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <?php include_once('includes/footer.php'); ?>
</div>
<!-- ./wrapper -->
<?php include_once('includes/alljs.php'); ?>
<script>
$('#chartdivtrends').hide();
$('#filter_report').click(function(){
	$('#chartdivtrends').show();
})	
jQuery(document).ready(function(){
		  jQuery("#employee_wise_search").validate({
			rules: {     
				emp_id: {required: true}
			},
			messages: {
				emp_id: {
                required:"Please Select Employee."
                }
			},
			errorPlacement: function(error, element) {
						 return false;
					},
			highlight: function(element, errorClass) {
						jQuery(element).addClass(errorClass).parent("select").addClass(errorClass);
			}
		});

});
</script>
<script  type="text/javascript">
	$(document).ready(function() {
	
		jQuery('#export-menu li').bind("click", function() {
			var target = $(this).attr('id');
			switch(target) {
				case 'export-to-excel' :
				$('#hidden-type').val(target);
				//alert($('#hidden-type').val());
				$('#export-form').submit();
				$('#hidden-type').val('');
				break
				case 'export-to-csv' :
				$('#hidden-type').val(target);
				//alert($('#hidden-type').val());
				$('#export-form').submit();
				$('#hidden-type').val('');
				break
			}
		});
    });
</script>
<script type="text/javascript">
            var chart;
            var chartData = [
                {
                    "month": 'Feb 2018',
                    "lowrisk": <?php echo $report_value[2];?>,

					// "urllowrisk": "http://demo-ews.stratemis.com/risk_wise.php?emp_id=&ews_status=3&assesment_month=2018-02-01&fromdate_filter=&todate_filter=&filter_submit="
                },
                {
                    "month": 'Mar 2018',
                    "lowrisk": <?php echo $report_value[3];?>,
                    
					// "lowrisk": "http://demo-ews.stratemis.com/risk_wise.php?emp_id=&ews_status=3&assesment_month=2018-03-01&fromdate_filter=&todate_filter=&filter_submit="
                },
                {
                    "month": 'Apr 2018',
                    "lowrisk": <?php echo $report_value[4];?>,
                   
					// "urllowrisk": "http://demo-ews.stratemis.com/risk_wise.php?emp_id=&ews_status=3&assesment_month=2018-04-01&fromdate_filter=&todate_filter=&filter_submit="
                },
                {
                    "month": 'May 2018',
                    "lowrisk": <?php echo $report_value[5];?>,
                   
					// "urllowrisk": "http://demo-ews.stratemis.com/risk_wise.php?emp_id=&ews_status=3&assesment_month=2018-05-01&fromdate_filter=&todate_filter=&filter_submit="
                },
                {
                    "month": 'Jun 2018',
                    "lowrisk":<?php echo $report_value[6];?>,
                   
					// "urllowrisk": "http://demo-ews.stratemis.com/risk_wise.php?emp_id=&ews_status=3&assesment_month=2018-06-01&fromdate_filter=&todate_filter=&filter_submit="
                },
                {
                    "month": 'Jul 2018',
                    "lowrisk": <?php echo $report_value[7];?>,
                   
					// "urllowrisk": "http://demo-ews.stratemis.com/risk_wise.php?emp_id=&ews_status=3&assesment_month=2018-07-01&fromdate_filter=&todate_filter=&filter_submit="
                },
                {
                    "month": 'Aug 2018',
                    "lowrisk": <?php echo $report_value[8];?>,
                   
					// "urllowrisk": "http://demo-ews.stratemis.com/risk_wise.php?emp_id=&ews_status=3&assesment_month=2018-08-01&fromdate_filter=&todate_filter=&filter_submit="
                },
                {
                    "month": 'Sep 2018',
                    "lowrisk": <?php echo $report_value[9];?>,
                   
					// "urllowrisk": "http://demo-ews.stratemis.com/risk_wise.php?emp_id=&ews_status=3&assesment_month=2018-09-01&fromdate_filter=&todate_filter=&filter_submit="
                },
                {
                    "month": 'Oct 2018',
                     "lowrisk": <?php echo $report_value[10];?>,
                 
					// "urllowrisk": "http://demo-ews.stratemis.com/risk_wise.php?emp_id=&ews_status=3&assesment_month=2018-10-01&fromdate_filter=&todate_filter=&filter_submit="
                },
                {
                    "month": 'Nov 2018',
                    "lowrisk": <?php echo $report_value[11];?>,
                   
					// "urllowrisk": "http://demo-ews.stratemis.com/risk_wise.php?emp_id=&ews_status=3&assesment_month=2018-11-01&fromdate_filter=&todate_filter=&filter_submit="
                },
                {
                    "month": 'Dec 2018',
                    "lowrisk": <?php echo $report_value[12];?>,
                    
					// "urllowrisk": "http://demo-ews.stratemis.com/risk_wise.php?emp_id=&ews_status=3&assesment_month=2018-12-01&fromdate_filter=&todate_filter=&filter_submit="
                },
				{
                    "month": 'Jan 2019',
                    "lowrisk": <?php echo $report_value[0]?>,
                 
					// "urllowrisk": "http://demo-ews.stratemis.com/risk_wise.php?emp_id=&ews_status=3&assesment_month=2019-01-01&fromdate_filter=&todate_filter=&filter_submit="
                }
            ];
            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "month";
                chart.startDuration = .3;
                chart.balloon.color = "#000000";

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.fillAlpha = 1;
                categoryAxis.fillColor = "#FAFAFA";
                categoryAxis.gridAlpha = 0;
                categoryAxis.axisAlpha = 0;
				categoryAxis.title = "Months";
                categoryAxis.gridPosition = "start";
                categoryAxis.position = "bottom";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.dashLength = 5;
                valueAxis.axisAlpha = 0;
                valueAxis.integersOnly = true;
				valueAxis.title = "Score";
                valueAxis.gridCount = 10;
                valueAxis.reversed = false; // this line makes the value axis reversed
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // High Risk graph
    //             var graph = new AmCharts.AmGraph();
    //             graph.title = "High Risk";
				// graph.lineColor = "#dd4b39";
    //             graph.valueField = "highrisk";
				// graph.urlField = "urlhighrisk";
    //             graph.balloonText = "<span style='color:#00a65a'><b>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
    //             graph.bullet = "round";
				// graph.bulletSize = 15;
				// graph.lineThickness = 1.5;
    //             chart.addGraph(graph);

                // Medium Risk graph
    //             var graph = new AmCharts.AmGraph();
    //             graph.title = "Medium Risk";
				// graph.lineColor = "#f39c12";
    //             graph.valueField = "mediumrisk";
				// graph.urlField = "urlmediumrisk";
    //             graph.balloonText = "<span style='color:#f39c12'><b>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
    //             graph.bullet = "round";
				// graph.bulletSize = 10;
				// graph.lineThickness = 1.5;
    //             chart.addGraph(graph);

                // Low Risk graph
                var graph = new AmCharts.AmGraph();
                graph.title = "Score";
				graph.lineColor = "#00a65a";
                graph.valueField = "lowrisk";
				graph.urlField = "urllowrisk";
                graph.balloonText = "<span style='color:#00a65a'><b>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                graph.bullet = "round";
				graph.bulletSize = 8;
				graph.lineThickness = 1.5;
                chart.addGraph(graph);

                // WRITE
                chart.write("chartdivtrends");
            });
        </script>
</body>
</html>
