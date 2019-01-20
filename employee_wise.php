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

  $ews_detail_11months=  $mysql->select(array('table'=>'ews_detail','fields'=>'*','condition'=>'emp_id='.$emp_id.' and YEAR(assesment_month) = YEAR(CURRENT_DATE - INTERVAL 11 MONTH) and MONTH(assesment_month) = MONTH(CURRENT_DATE - INTERVAL 11 MONTH)'));
                            $count_r_r_twelve=0;
                            $count_one_on_one_twelve=0;
                            $count_perfomance_twelve=0;
                            $count_leave_r_twelve=0;
                            $count_external_interviews_twelve=0;
                            $count_behavior_motivation_twelve=0;
                            $count_personal_effectiveness_twelve=0;
                            $count_career_growth_twelve=0;
                            $count_skill_set_twelve=0;
						  foreach($ews_detail_11months as $key=>$value)
								{
						$count_one_on_one_twelve=$value['ews_detail']['one_on_one_ass'];
			            $count_perfomance_twelve=$value['ews_detail']['performance'];
			            $count_leave_r_twelve=$value['ews_detail']['leave_r'];
                        $count_external_interviews_twelve=$value['ews_detail']['external_interviews'];
                        $count_behavior_motivation_twelve=$value['ews_detail']['behavior_motivation'];
                        $count_personal_effectiveness_twelve=$value['ews_detail']['personal_effectiveness'];
                        $count_career_growth_twelve=$value['ews_detail']['career_growth'];
                        $count_skill_set_twelve=$value['ews_detail']['skill_set'];

								$events_detail_total=$value['ews_detail']['one_on_one_ass']+$value['ews_detail']['performance']+$value['ews_detail']['leave_r']+$value['ews_detail']['external_interviews']+$value['ews_detail']['behavior_motivation']+$value['ews_detail']['personal_effectiveness']+$value['ews_detail']['career_growth']+$value['ews_detail']['skill_set'];
								$count_r_r_twelve = $events_detail_total;
							}

$ews_detail_10months=  $mysql->select(array('table'=>'ews_detail','fields'=>'*','condition'=>'emp_id='.$emp_id.' and YEAR(assesment_month) = YEAR(CURRENT_DATE - INTERVAL 10 MONTH) and MONTH(assesment_month) = MONTH(CURRENT_DATE - INTERVAL 10 MONTH)'));
                            $count_r_r_eleven=0;
                            $count_one_on_one_eleven=0;
                            $count_perfomance_eleven=0;
                            $count_leave_r_eleven=0;
                            $count_external_interviews_eleven=0;
                            $count_behavior_motivation_eleven=0;
                            $count_personal_effectiveness_eleven=0;
                            $count_career_growth_eleven=0;
                            $count_skill_set_eleven=0;

						  foreach($ews_detail_10months as $key=>$value)
								{
									$count_one_on_one_eleven=$value['ews_detail']['one_on_one_ass'];
                        $count_perfomance_eleven=$value['ews_detail']['performance'];
                        $count_leave_r_eleven=$value['ews_detail']['leave_r'];
                        $count_external_interviews_eleven=$value['ews_detail']['external_interviews'];
                        $count_behavior_motivation_eleven=$value['ews_detail']['behavior_motivation'];
                        $count_personal_effectiveness_eleven=$value['ews_detail']['personal_effectiveness'];
                        $count_career_growth_eleven=$value['ews_detail']['career_growth'];
                        $count_skill_set_eleven=$value['ews_detail']['skill_set'];
								$events_detail_total=$value['ews_detail']['one_on_one_ass']+$value['ews_detail']['performance']+$value['ews_detail']['leave_r']+$value['ews_detail']['external_interviews']+$value['ews_detail']['behavior_motivation']+$value['ews_detail']['personal_effectiveness']+$value['ews_detail']['career_growth']+$value['ews_detail']['skill_set'];
								$count_r_r_eleven = $events_detail_total;
							}

$ews_detail_9months=  $mysql->select(array('table'=>'ews_detail','fields'=>'*','condition'=>'emp_id='.$emp_id.' and YEAR(assesment_month) = YEAR(CURRENT_DATE - INTERVAL 9 MONTH) and MONTH(assesment_month) = MONTH(CURRENT_DATE - INTERVAL 9 MONTH)'));
                            $count_r_r_ten=0;
                            $count_one_on_one_ten=0;
                            $count_perfomance_ten=0;
                            $count_leave_r_ten=0;
                            $count_external_interviews_ten=0;
                            $count_behavior_motivation_ten=0;
                            $count_personal_effectiveness_ten=0;
                            $count_career_growth_ten=0;
                            $count_skill_set_ten=0;
						  foreach($ews_detail_9months as $key=>$value)
								{
									$count_one_on_one_ten=$value['ews_detail']['one_on_one_ass'];
                        $count_perfomance_ten=$value['ews_detail']['performance'];
                        $count_leave_r_ten=$value['ews_detail']['leave_r'];
                        $count_external_interviews_ten=$value['ews_detail']['external_interviews'];
                        $count_behavior_motivation_ten=$value['ews_detail']['behavior_motivation'];
                        $count_personal_effectiveness_ten=$value['ews_detail']['personal_effectiveness'];
                        $count_career_growth_ten=$value['ews_detail']['career_growth'];
                        $count_skill_set_ten=$value['ews_detail']['skill_set'];
								$events_detail_total=$value['ews_detail']['one_on_one_ass']+$value['ews_detail']['performance']+$value['ews_detail']['leave_r']+$value['ews_detail']['external_interviews']+$value['ews_detail']['behavior_motivation']+$value['ews_detail']['personal_effectiveness']+$value['ews_detail']['career_growth']+$value['ews_detail']['skill_set'];
								$count_r_r_ten = $events_detail_total;
							}
$ews_detail_8months=  $mysql->select(array('table'=>'ews_detail','fields'=>'*','condition'=>'emp_id='.$emp_id.' and YEAR(assesment_month) = YEAR(CURRENT_DATE - INTERVAL 8 MONTH) and MONTH(assesment_month) = MONTH(CURRENT_DATE - INTERVAL 8 MONTH)'));
                            $count_r_r_nine=0;
                            $count_one_on_one_nine=0;
                            $count_perfomance_nine=0;
                            $count_leave_r_nine=0;
                            $count_external_interviews_nine=0;
                            $count_behavior_motivation_nine=0;
                            $count_personal_effectiveness_nine=0;
                            $count_career_growth_nine=0;
                            $count_skill_set_nine=0;
						  foreach($ews_detail_8months as $key=>$value)
								{
									$count_one_on_one_nine=$value['ews_detail']['one_on_one_ass'];
                        $count_perfomance_nine=$value['ews_detail']['performance'];
                        $count_leave_r_nine=$value['ews_detail']['leave_r'];
                        $count_external_interviews_nine=$value['ews_detail']['external_interviews'];
                        $count_behavior_motivation_nine=$value['ews_detail']['behavior_motivation'];
                        $count_personal_effectiveness_nine=$value['ews_detail']['personal_effectiveness'];
                        $count_career_growth_nine=$value['ews_detail']['career_growth'];
                        $count_skill_set_nine=$value['ews_detail']['skill_set'];

								$events_detail_total=$value['ews_detail']['one_on_one_ass']+$value['ews_detail']['performance']+$value['ews_detail']['leave_r']+$value['ews_detail']['external_interviews']+$value['ews_detail']['behavior_motivation']+$value['ews_detail']['personal_effectiveness']+$value['ews_detail']['career_growth']+$value['ews_detail']['skill_set'];
								$count_r_r_nine = $events_detail_total;
							}
$ews_detail_7months=  $mysql->select(array('table'=>'ews_detail','fields'=>'*','condition'=>'emp_id='.$emp_id.' and YEAR(assesment_month) = YEAR(CURRENT_DATE - INTERVAL 7 MONTH) and MONTH(assesment_month) = MONTH(CURRENT_DATE - INTERVAL 7 MONTH)'));
                            $count_r_r_eight=0;
                            $count_one_on_one_eight=0;
                            $count_perfomance_eight=0;
                            $count_leave_r_eight=0;
                            $count_external_interviews_eight=0;
                            $count_behavior_motivation_eight=0;
                            $count_personal_effectiveness_eight=0;
                            $count_career_growth_eight=0;
                            $count_skill_set_eight=0;
						  foreach($ews_detail_7months as $key=>$value)
								{
									$count_one_on_one_eight=$value['ews_detail']['one_on_one_ass'];
                        $count_perfomance_eight=$value['ews_detail']['performance'];
                        $count_leave_r_eight=$value['ews_detail']['leave_r'];
                        $count_external_interviews_eight=$value['ews_detail']['external_interviews'];
                        $count_behavior_motivation_eight=$value['ews_detail']['behavior_motivation'];
                        $count_personal_effectiveness_eight=$value['ews_detail']['personal_effectiveness'];
                        $count_career_growth_eight=$value['ews_detail']['career_growth'];
                        $count_skill_set_eight=$value['ews_detail']['skill_set'];
								$events_detail_total=$value['ews_detail']['one_on_one_ass']+$value['ews_detail']['performance']+$value['ews_detail']['leave_r']+$value['ews_detail']['external_interviews']+$value['ews_detail']['behavior_motivation']+$value['ews_detail']['personal_effectiveness']+$value['ews_detail']['career_growth']+$value['ews_detail']['skill_set'];
								$count_r_r_eight = $events_detail_total;
							}

$ews_detail_6months=  $mysql->select(array('table'=>'ews_detail','fields'=>'*','condition'=>'emp_id='.$emp_id.' and YEAR(assesment_month) = YEAR(CURRENT_DATE - INTERVAL 6 MONTH) and MONTH(assesment_month) = MONTH(CURRENT_DATE - INTERVAL 6 MONTH)'));
                            $count_r_r_seven=0;
                            $count_one_on_one_seven=0;
                            $count_perfomance_seven=0;
                            $count_leave_r_seven=0;
                            $count_external_interviews_seven=0;
                            $count_behavior_motivation_seven=0;
                            $count_personal_effectiveness_seven=0;
                            $count_career_growth_seven=0;
                            $count_skill_set_seven=0;
						  foreach($ews_detail_6months as $key=>$value)
								{
									$count_one_on_one_seven=$value['ews_detail']['one_on_one_ass'];
                        $count_perfomance_seven=$value['ews_detail']['performance'];
                        $count_leave_r_seven=$value['ews_detail']['leave_r'];
                        $count_external_interviews_seven=$value['ews_detail']['external_interviews'];
                        $count_behavior_motivation_seven=$value['ews_detail']['behavior_motivation'];
                        $count_personal_effectiveness_seven=$value['ews_detail']['personal_effectiveness'];
                        $count_career_growth_seven=$value['ews_detail']['career_growth'];
                        $count_skill_set_seven=$value['ews_detail']['skill_set'];

								$events_detail_total=$value['ews_detail']['one_on_one_ass']+$value['ews_detail']['performance']+$value['ews_detail']['leave_r']+$value['ews_detail']['external_interviews']+$value['ews_detail']['behavior_motivation']+$value['ews_detail']['personal_effectiveness']+$value['ews_detail']['career_growth']+$value['ews_detail']['skill_set'];
								$count_r_r_seven = $events_detail_total;
							}

$ews_detail_5months=  $mysql->select(array('table'=>'ews_detail','fields'=>'*','condition'=>'emp_id='.$emp_id.' and YEAR(assesment_month) = YEAR(CURRENT_DATE - INTERVAL 5 MONTH) and MONTH(assesment_month) = MONTH(CURRENT_DATE - INTERVAL 5 MONTH)'));
                            $count_r_r_six=0;
                            $count_one_on_one_six=0;
                            $count_perfomance_six=0;
                            $count_leave_r_six=0;
                            $count_external_interviews_six=0;
                            $count_behavior_motivation_six=0;
                            $count_personal_effectiveness_six=0;
                            $count_career_growth_six=0;
                            $count_skill_set_six=0;
						  foreach($ews_detail_5months as $key=>$value)
								{
									$count_one_on_one_six=$value['ews_detail']['one_on_one_ass'];
                        $count_perfomance_six=$value['ews_detail']['performance'];
                        $count_leave_r_six=$value['ews_detail']['leave_r'];
                        $count_external_interviews_six=$value['ews_detail']['external_interviews'];
                        $count_behavior_motivation_six=$value['ews_detail']['behavior_motivation'];
                        $count_personal_effectiveness_six=$value['ews_detail']['personal_effectiveness'];
                        $count_career_growth_six=$value['ews_detail']['career_growth'];
                        $count_skill_set_six=$value['ews_detail']['skill_set'];
								$events_detail_total=$value['ews_detail']['one_on_one_ass']+$value['ews_detail']['performance']+$value['ews_detail']['leave_r']+$value['ews_detail']['external_interviews']+$value['ews_detail']['behavior_motivation']+$value['ews_detail']['personal_effectiveness']+$value['ews_detail']['career_growth']+$value['ews_detail']['skill_set'];
								$count_r_r_six = $events_detail_total;
							}
$ews_detail_4months=  $mysql->select(array('table'=>'ews_detail','fields'=>'*','condition'=>'emp_id='.$emp_id.' and YEAR(assesment_month) = YEAR(CURRENT_DATE - INTERVAL 4 MONTH) and MONTH(assesment_month) = MONTH(CURRENT_DATE - INTERVAL 4 MONTH)'));
                            $count_r_r_five=0;
                            $count_one_on_one_five=0;
                            $count_perfomance_five=0;
                            $count_leave_r_five=0;
                            $count_external_interviews_five=0;
                            $count_behavior_motivation_five=0;
                            $count_personal_effectiveness_five=0;
                            $count_career_growth_five=0;
                            $count_skill_set_five=0;
						  foreach($ews_detail_4months as $key=>$value)
								{
									$count_one_on_one_five=$value['ews_detail']['one_on_one_ass'];
                        $count_perfomance_five=$value['ews_detail']['performance'];
                        $count_leave_r_five=$value['ews_detail']['leave_r'];
                        $count_external_interviews_five=$value['ews_detail']['external_interviews'];
                        $count_behavior_motivation_five=$value['ews_detail']['behavior_motivation'];
                        $count_personal_effectiveness_five=$value['ews_detail']['personal_effectiveness'];
                        $count_career_growth_five=$value['ews_detail']['career_growth'];
                        $count_skill_set_five=$value['ews_detail']['skill_set'];

								$events_detail_total=$value['ews_detail']['one_on_one_ass']+$value['ews_detail']['performance']+$value['ews_detail']['leave_r']+$value['ews_detail']['external_interviews']+$value['ews_detail']['behavior_motivation']+$value['ews_detail']['personal_effectiveness']+$value['ews_detail']['career_growth']+$value['ews_detail']['skill_set'];
								$count_r_r_five = $events_detail_total;
							}

$ews_detail_3months=  $mysql->select(array('table'=>'ews_detail','fields'=>'*','condition'=>'emp_id='.$emp_id.' and YEAR(assesment_month) = YEAR(CURRENT_DATE - INTERVAL 3 MONTH) and MONTH(assesment_month) = MONTH(CURRENT_DATE - INTERVAL 3 MONTH)'));
                            $count_r_r_four=0;
                            $count_one_on_one_four=0;
                            $count_perfomance_four=0;
                            $count_leave_r_four=0;
                            $count_external_interviews_four=0;
                            $count_behavior_motivation_four=0;
                            $count_personal_effectiveness_four=0;
                            $count_career_growth_four=0;
                            $count_skill_set_four=0;
						  foreach($ews_detail_3months as $key=>$value)
								{
									$count_one_on_one_four=$value['ews_detail']['one_on_one_ass'];
                        $count_perfomance_four=$value['ews_detail']['performance'];
                        $count_leave_r_four=$value['ews_detail']['leave_r'];
                        $count_external_interviews_four=$value['ews_detail']['external_interviews'];
                        $count_behavior_motivation_four=$value['ews_detail']['behavior_motivation'];
                        $count_personal_effectiveness_four=$value['ews_detail']['personal_effectiveness'];
                        $count_career_growth_four=$value['ews_detail']['career_growth'];
                        $count_skill_set_four=$value['ews_detail']['skill_set'];
								$events_detail_total=$value['ews_detail']['one_on_one_ass']+$value['ews_detail']['performance']+$value['ews_detail']['leave_r']+$value['ews_detail']['external_interviews']+$value['ews_detail']['behavior_motivation']+$value['ews_detail']['personal_effectiveness']+$value['ews_detail']['career_growth']+$value['ews_detail']['skill_set'];
								$count_r_r_four = $events_detail_total;
							}

$ews_detail_2months=  $mysql->select(array('table'=>'ews_detail','fields'=>'*','condition'=>'emp_id='.$emp_id.' and YEAR(assesment_month) = YEAR(CURRENT_DATE - INTERVAL 2 MONTH) and MONTH(assesment_month) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH)'));
                            $count_r_r_three=0;
                            $count_one_on_one_three=0;
                            $count_perfomance_three=0;
                            $count_leave_r_three=0;
                            $count_external_interviews_three=0;
                            $count_behavior_motivation_three=0;
                            $count_personal_effectiveness_three=0;
                            $count_career_growth_three=0;
                            $count_skill_set_three=0;
						  foreach($ews_detail_2months as $key=>$value)
								{
									$count_one_on_one_three=$value['ews_detail']['one_on_one_ass'];
                        $count_perfomance_three=$value['ews_detail']['performance'];
                        $count_leave_r_three=$value['ews_detail']['leave_r'];
                        $count_external_interviews_three=$value['ews_detail']['external_interviews'];
                        $count_behavior_motivation_three=$value['ews_detail']['behavior_motivation'];
                        $count_personal_effectiveness_three=$value['ews_detail']['personal_effectiveness'];
                        $count_career_growth_three=$value['ews_detail']['career_growth'];
                        $count_skill_set_three=$value['ews_detail']['skill_set'];
								$events_detail_total=$value['ews_detail']['one_on_one_ass']+$value['ews_detail']['performance']+$value['ews_detail']['leave_r']+$value['ews_detail']['external_interviews']+$value['ews_detail']['behavior_motivation']+$value['ews_detail']['personal_effectiveness']+$value['ews_detail']['career_growth']+$value['ews_detail']['skill_set'];
								$count_r_r_three = $events_detail_total;
							}

$ews_detail_1months=  $mysql->select(array('table'=>'ews_detail','fields'=>'*','condition'=>'emp_id='.$emp_id.' and YEAR(assesment_month) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) and MONTH(assesment_month) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)'));
                            $count_r_r_two=0;
                            $count_one_on_one_two=0;
                            $count_perfomance_two=0;
                            $count_leave_r_two=0;
                            $count_external_interviews_two=0;
                            $count_behavior_motivation_two=0;
                            $count_personal_effectiveness_two=0;
                            $count_career_growth_two=0;
                            $count_skill_set_two=0;
						  foreach($ews_detail_1months as $key=>$value)
								{

                      $count_one_on_one_two=$value['ews_detail']['one_on_one_ass'];
                        $count_perfomance_two=$value['ews_detail']['performance'];
                        $count_leave_r_two=$value['ews_detail']['leave_r'];
                        $count_external_interviews_two=$value['ews_detail']['external_interviews'];
                        $count_behavior_motivation_two=$value['ews_detail']['behavior_motivation'];
                        $count_personal_effectiveness_two=$value['ews_detail']['personal_effectiveness'];
                        $count_career_growth_two=$value['ews_detail']['career_growth'];
                        $count_skill_set_two=$value['ews_detail']['skill_set'];
								$events_detail_total=$value['ews_detail']['one_on_one_ass']+$value['ews_detail']['performance']+$value['ews_detail']['leave_r']+$value['ews_detail']['external_interviews']+$value['ews_detail']['behavior_motivation']+$value['ews_detail']['personal_effectiveness']+$value['ews_detail']['career_growth']+$value['ews_detail']['skill_set'];
								$count_r_r_two = $events_detail_total;
							}

$ews_detail_lastmonths= $mysql->select(array('table'=>'ews_detail','fields'=>'*','condition'=>'emp_id='.$emp_id.' and YEAR(assesment_month) = YEAR(CURRENT_DATE())
							and MONTH(assesment_month) = MONTH(CURRENT_DATE())'));
                            $count_r_r_one=0;
                            $count_one_on_one_one=0;
                            $count_perfomance_one=0;
                            $count_leave_r_one=0;
                            $count_external_interviews_one=0;
                            $count_behavior_motivation_one=0;
                            $count_personal_effectiveness_one=0;
                            $count_career_growth_one=0;
                            $count_skill_set_one=0;
						  foreach($ews_detail_lastmonths as $key=>$value)
								{
									$count_one_on_one_one=$value['ews_detail']['one_on_one_ass'];
                        $count_perfomance_one=$value['ews_detail']['performance'];
                        $count_leave_r_one=$value['ews_detail']['leave_r'];
                        $count_external_interviews_one=$value['ews_detail']['external_interviews'];
                        $count_behavior_motivation_one=$value['ews_detail']['behavior_motivation'];
                        $count_personal_effectiveness_one=$value['ews_detail']['personal_effectiveness'];
                        $count_career_growth_one=$value['ews_detail']['career_growth'];
                        $count_skill_set_one=$value['ews_detail']['skill_set'];
								$events_detail_total=$value['ews_detail']['one_on_one_ass']+$value['ews_detail']['performance']+$value['ews_detail']['leave_r']+$value['ews_detail']['external_interviews']+$value['ews_detail']['behavior_motivation']+$value['ews_detail']['personal_effectiveness']+$value['ews_detail']['career_growth']+$value['ews_detail']['skill_set'];
								$count_r_r_one = $events_detail_total;
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
         
    <div class="box box-success" id="chartdiv">
      <div class="box-header with-border" style="text-align:center;">
        <h3 class="box-title">Score Trend</h3>
      <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
	   <div id="chartdivtrends" style="width: 100%; height: 300px;"></div>
      </div>
      <div class="box-body table-responsive no-padding">
	   <div id="chartdivtrendz" style="width: 100%; height: 300px;"></div>
      </div>
      <!-- /.box-body -->
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
                  	//print_r($users_ews);
			                  	$events_detail_total_sum =$users_ewsss['ews_detail']['one_on_one_ass']+$users_ewsss['ews_detail']['performance']+$users_ewsss['ews_detail']['leave_r']+$users_ewsss['ews_detail']['external_interviews']+$users_ewsss['ews_detail']['behavior_motivation']+$users_ewsss['ews_detail']['personal_effectiveness']+$users_ewsss['ews_detail']['career_growth']+$users_ewsss['ews_detail']['skill_set'];
			                  	$report_value[] = $events_detail_total_sum;
			                 
                  }
                  //print_r($report_value);
                  
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
$('#chartdiv').hide();
$('#filter_report').click(function(){
	$('#chartdiv').show();
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
                    "month": '<?php echo date('M Y', strtotime('first day of -11 month'));?>',
                    "lowrisk":<?php echo $count_r_r_twelve; ?> 
                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -10 month'));?>',
                  
                    "lowrisk": <?php echo $count_r_r_eleven; ?>
				                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -9 month'));?>',
                    "lowrisk":<?php echo $count_r_r_ten; ?>
					
                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -8 month'));?>',
                       "lowrisk": <?php echo $count_r_r_nine; ?>
         
                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -7 month'));?>',
                       "lowrisk": <?php echo $count_r_r_eight; ?>
                   
                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -6 month'));?>',

                    "lowrisk": <?php echo $count_r_r_seven; ?>
					
                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -5 month'));?>',

                    "lowrisk": <?php echo $count_r_r_six; ?>
					
                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -4 month'));?>',

                    "lowrisk": <?php echo $count_r_r_five; ?>
					
                },
                {
                     "month": '<?php echo date('M Y', strtotime('first day of -3 month'));?>',
                    //  "highrisk": 4,
                    // "mediumrisk": 4,
                    "lowrisk": <?php echo $count_r_r_four; ?>
				
                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -2 month'));?>',
                    // "highrisk": 3,
                    // "mediumrisk": 3,
                    "lowrisk": <?php echo $count_r_r_three; ?>
					
                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -1 month'));?>',
     
                    "lowrisk": <?php echo $count_r_r_two; ?>
					
                },
				{
                    "month": '<?php echo date('M Y', strtotime('first day of this month'));?>',

                    "lowrisk": <?php echo $count_r_r_one; ?>
					
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
				valueAxis.title = "EWS Score";
                valueAxis.gridCount = 10;
                valueAxis.reversed = false; // this line makes the value axis reversed
                chart.addValueAxis(valueAxis);

                // GRAPHS
                
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
<script type="text/javascript">
            var chart_1;
            var chartData_1 = [
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -11 month'));?>',
                    "highrisk": <?php echo $count_perfomance_twelve;?>,
"mediumrisk": <?php echo $count_one_on_one_twelve;?>,
"lowrisk": <?php echo $count_leave_r_twelve;?>,
"highrisk_1": <?php echo $count_external_interviews_twelve;?>,
"mediumrisk_1": <?php echo $count_behavior_motivation_twelve;?>,
"lowrisk_1": <?php echo $count_personal_effectiveness_twelve;?>,
"highrisk_2": <?php echo $count_career_growth_twelve;?>,
"mediumrisk_2": <?php echo $count_skill_set_twelve;?>

			
                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -10 month'));?>',
                    "highrisk": <?php echo $count_perfomance_eleven;?>,
"mediumrisk": <?php echo $count_one_on_one_eleven;?>,
"lowrisk": <?php echo $count_leave_r_eleven;?>,
"highrisk_1": <?php echo $count_external_interviews_eleven;?>,
"mediumrisk_1": <?php echo $count_behavior_motivation_eleven;?>,
"lowrisk_1": <?php echo $count_personal_effectiveness_eleven;?>,
"highrisk_2": <?php echo $count_career_growth_eleven;?>,
"mediumrisk_2": <?php echo $count_skill_set_eleven;?>
                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -9 month'));?>',
                     "highrisk": <?php echo $count_perfomance_ten;?>,
"mediumrisk": <?php echo $count_one_on_one_ten;?>,
"lowrisk": <?php echo $count_leave_r_ten;?>,
"highrisk_1": <?php echo $count_external_interviews_ten;?>,
"mediumrisk_1": <?php echo $count_behavior_motivation_ten;?>,
"lowrisk_1": <?php echo $count_personal_effectiveness_ten;?>,
"highrisk_2": <?php echo $count_career_growth_ten;?>,
"mediumrisk_2": <?php echo $count_skill_set_ten;?>
                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -8 month'));?>',
                   "highrisk": <?php echo $count_perfomance_nine;?>,
"mediumrisk": <?php echo $count_one_on_one_nine;?>,
"lowrisk": <?php echo $count_leave_r_nine;?>,
"highrisk_1": <?php echo $count_external_interviews_nine;?>,
"mediumrisk_1": <?php echo $count_behavior_motivation_nine;?>,
"lowrisk_1": <?php echo $count_personal_effectiveness_nine;?>,
"highrisk_2": <?php echo $count_career_growth_nine;?>,
"mediumrisk_2": <?php echo $count_skill_set_nine;?>
                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -7 month'));?>',
              "highrisk": <?php echo $count_perfomance_eight;?>,
"mediumrisk": <?php echo $count_one_on_one_eight;?>,
"lowrisk": <?php echo $count_leave_r_eight;?>,
"highrisk_1": <?php echo $count_external_interviews_eight;?>,
"mediumrisk_1": <?php echo $count_behavior_motivation_eight;?>,
"lowrisk_1": <?php echo $count_personal_effectiveness_eight;?>,
"highrisk_2": <?php echo $count_career_growth_eight;?>,
"mediumrisk_2": <?php echo $count_skill_set_eight;?>
                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -6 month'));?>',
                    
 "highrisk": <?php echo $count_perfomance_seven;?>,
"mediumrisk": <?php echo $count_one_on_one_seven;?>,
"lowrisk": <?php echo $count_leave_r_seven;?>,
"highrisk_1": <?php echo $count_external_interviews_seven;?>,
"mediumrisk_1": <?php echo $count_behavior_motivation_seven;?>,
"lowrisk_1": <?php echo $count_personal_effectiveness_seven;?>,
"highrisk_2": <?php echo $count_career_growth_seven;?>,
"mediumrisk_2": <?php echo $count_skill_set_seven;?>
                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -5 month'));?>',
                     "highrisk": <?php echo $count_perfomance_six;?>,
"mediumrisk": <?php echo $count_one_on_one_six;?>,
"lowrisk": <?php echo $count_leave_r_six;?>,
"highrisk_1": <?php echo $count_external_interviews_six;?>,
"mediumrisk_1": <?php echo $count_behavior_motivation_six;?>,
"lowrisk_1": <?php echo $count_personal_effectiveness_six;?>,
"highrisk_2": <?php echo $count_career_growth_six;?>,
"mediumrisk_2": <?php echo $count_skill_set_six;?>
                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -4 month'));?>',
                    "highrisk": <?php echo $count_perfomance_five;?>,
"mediumrisk": <?php echo $count_one_on_one_five;?>,
"lowrisk": <?php echo $count_leave_r_five;?>,
"highrisk_1": <?php echo $count_external_interviews_five;?>,
"mediumrisk_1": <?php echo $count_behavior_motivation_five;?>,
"lowrisk_1": <?php echo $count_personal_effectiveness_five;?>,
"highrisk_2": <?php echo $count_career_growth_five;?>,
"mediumrisk_2": <?php echo $count_skill_set_five;?>
                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -3 month'));?>',
                     "highrisk": <?php echo $count_perfomance_four;?>,
"mediumrisk": <?php echo $count_one_on_one_four;?>,
"lowrisk": <?php echo $count_leave_r_four;?>,
"highrisk_1": <?php echo $count_external_interviews_four;?>,
"mediumrisk_1": <?php echo $count_behavior_motivation_four;?>,
"lowrisk_1": <?php echo $count_personal_effectiveness_four;?>,
"highrisk_2": <?php echo $count_career_growth_four;?>,
"mediumrisk_2": <?php echo $count_skill_set_four;?>
                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -2 month'));?>',
                   "highrisk": <?php echo $count_perfomance_three;?>,
"mediumrisk": <?php echo $count_one_on_one_three;?>,
"lowrisk": <?php echo $count_leave_r_three;?>,
"highrisk_1": <?php echo $count_external_interviews_three;?>,
"mediumrisk_1": <?php echo $count_behavior_motivation_three;?>,
"lowrisk_1": <?php echo $count_personal_effectiveness_three;?>,
"highrisk_2": <?php echo $count_career_growth_three;?>,
"mediumrisk_2": <?php echo $count_skill_set_three;?>
                },
                {
                    "month": '<?php echo date('M Y', strtotime('first day of -1 month'));?>',
                   "highrisk": <?php echo $count_perfomance_two;?>,
"mediumrisk": <?php echo $count_one_on_one_two;?>,
"lowrisk": <?php echo $count_leave_r_two;?>,
"highrisk_1": <?php echo $count_external_interviews_two;?>,
"mediumrisk_1": <?php echo $count_behavior_motivation_two;?>,
"lowrisk_1": <?php echo $count_personal_effectiveness_two;?>,
"highrisk_2": <?php echo $count_career_growth_two;?>,
"mediumrisk_2": <?php echo $count_skill_set_two;?>
                },
				{
                    "month": '<?php echo date('M Y', strtotime('first day of this month'));?>',
                    "highrisk": <?php echo $count_perfomance_one;?>,
"mediumrisk": <?php echo $count_one_on_one_one;?>,
"lowrisk": <?php echo $count_leave_r_one;?>,
"highrisk_1": <?php echo $count_external_interviews_one;?>,
"mediumrisk_1": <?php echo $count_behavior_motivation_one;?>,
"lowrisk_1": <?php echo $count_personal_effectiveness_one;?>,
"highrisk_2": <?php echo $count_career_growth_one;?>,
"mediumrisk_2": <?php echo $count_skill_set_one;?>
                }
            ];
            AmCharts.ready(function () {
                // SERIAL CHART
                chart_1 = new AmCharts.AmSerialChart();
                chart_1.dataProvider = chartData_1;
                chart_1.categoryField = "month";
                chart_1.startDuration = .3;
                chart_1.balloon.color = "#000000";

                // AXES
                // category
                var categoryAxis = chart_1.categoryAxis;
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
				valueAxis.title = "Risk Score";
                valueAxis.gridCount = 10;
                valueAxis.reversed = false; // this line makes the value axis reversed
                chart_1.addValueAxis(valueAxis);

                // GRAPHS
                // High Risk graph
                var graph = new AmCharts.AmGraph();
                graph.title = "Performance";
				graph.lineColor = "#dd4b39";
                graph.valueField = "highrisk";
				graph.urlField = "urlhighrisk";
                graph.balloonText = "<span style='color:##ff0000'><b>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                graph.bullet = "round";
				graph.bulletSize = 15;
				graph.lineThickness = 1.5;
                chart_1.addGraph(graph);

                // Medium Risk graph
                var graph = new AmCharts.AmGraph();
                graph.title = "One on one Assesment";
				graph.lineColor = "#f39c12";
                graph.valueField = "mediumrisk";
				graph.urlField = "urlmediumrisk";
                graph.balloonText = "<span style='color:#ff8000'><b>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                graph.bullet = "round";
				graph.bulletSize = 10;
				graph.lineThickness = 1.5;
                chart_1.addGraph(graph);

                // Low Risk graph
                var graph = new AmCharts.AmGraph();
                graph.title = "Leave";
				graph.lineColor = "#00a65a";
                graph.valueField = "lowrisk";
				graph.urlField = "urllowrisk";
                graph.balloonText = "<span style='color:#ffff00'><b>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                graph.bullet = "round";
				graph.bulletSize = 8;
				graph.lineThickness = 1.5;
                chart_1.addGraph(graph);

                 // High Risk graph
                var graph = new AmCharts.AmGraph();
                graph.title = "External Interview";
				graph.lineColor = "#dd4b39";
                graph.valueField = "highrisk_1";
				graph.urlField = "urlhighrisk";
                graph.balloonText = "<span style='color:#80ff00'><b>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                graph.bullet = "round";
				graph.bulletSize = 15;
				graph.lineThickness = 1.5;
                chart_1.addGraph(graph);

                // Medium Risk graph
                var graph = new AmCharts.AmGraph();
                graph.title = "Behaviour Motivation";
				graph.lineColor = "#f39c12";
                graph.valueField = "mediumrisk_1";
				graph.urlField = "urlmediumrisk";
                graph.balloonText = "<span style='color:#0040ff'><b>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                graph.bullet = "round";
				graph.bulletSize = 10;
				graph.lineThickness = 1.5;
                chart_1.addGraph(graph);


                
                var graph = new AmCharts.AmGraph();
                graph.title = "Personal Effectiveness";
				graph.lineColor = "#00a65a";
                graph.valueField = "lowrisk_1";
				graph.urlField = "urllowrisk";
                graph.balloonText = "<span style='color:#ff0080'><b>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                graph.bullet = "round";
				graph.bulletSize = 8;
				graph.lineThickness = 1.5;
                chart_1.addGraph(graph);



                 // High Risk graph
                var graph = new AmCharts.AmGraph();
                graph.title = "Carrer Growth";
				graph.lineColor = "#dd4b39";
                graph.valueField = "highrisk_2";
				graph.urlField = "urlhighrisk";
                graph.balloonText = "<span style='color:#ff0000'><b>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                graph.bullet = "round";
				graph.bulletSize = 15;
				graph.lineThickness = 1.5;
                chart_1.addGraph(graph);

                // Medium Risk graph
                var graph = new AmCharts.AmGraph();
                graph.title = "Skill Set";
				graph.lineColor = "#f39c12";
                graph.valueField = "mediumrisk_2";
				graph.urlField = "urlmediumrisk";
                graph.balloonText = "<span style='color:#f39c10'><b>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                graph.bullet = "round";
				graph.bulletSize = 10;
				graph.lineThickness = 1.5;
                chart_1.addGraph(graph);


                
                var graph = new AmCharts.AmGraph();
                graph.title = "Low Risk2";
				graph.lineColor = "#00a65a";
                graph.valueField = "lowrisk_2";
				graph.urlField = "urllowrisk";
                graph.balloonText = "<span style='color:#00a63a'><b>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                graph.bullet = "round";
				graph.bulletSize = 8;
				graph.lineThickness = 1.5;
                chart_1.addGraph(graph);

                // WRITE
                chart_1.write("chartdivtrendz");
            });
        </script>



</body>
</html>
