<?php //pr($employee_data);
//pr($employee_competency_data);
//pr($disable_button);
//pr($appraiser_goal);
//pr($appraiser_competency);
?>
		<section class="content-header">
		  <h1>View Appraisal <span style="font-size: 13px;">(<?php echo $emp_name?> <?php echo "/"?> <?php echo $emp_id?>)</span></h1>
		</section>
	<!-- 	<div><p></p></div>	
		
		 -->
		<section class="content" id="aditya">
			<div class="row">
				<div class="col-md-12 col-sm-6 col-xs-12">
					<div class="box">
						<div class="box-body BottomDiv" id="style-7">
						  <table id="" class="table table-bordered table-striped d-format" style="border:1px solid black !important;">
							<tr>
								<td colspan="11" class="text-center TableHeading" style="vertical-align:middle;"><b style="font-size:14px;">SECTION I - GOALS/OBJECTIVES</td>
							</tr>
							<tr>
								<td colspan="11" class="text-center TableHeading" style="vertical-align:middle;"><b style="font-size:14px;">Rating (1-5) Annual Review&nbsp;&nbsp;&nbsp;
								<span style="font-size:11px; font-weight:100;">(Total Weightage = 80)</span>
								<button type="button" class="btn" id="infobtn" data-toggle="modal" data-target="#information"><i class="fa fa-info-circle" aria-hidden="true"></i></button></td>
							        <div class="modal fade" id="information">
									  <div class="modal-dialog" id="dialoginfo">
										<div class="modal-content">					 
										  <div class="modal-body" style="overflow-x: unset;overflow-y: unset; height:313px;">
											<p style="text-align:justify; margin: 4%;font-weight: 500;">For the upcoming appraisal period, list and weight the major objective/goal to be accomplished by the employee during the appraisal weightage of this section should be 80. Distribute the weights so that the combined weights of all objects equals to the overall weights for the section. Objectives/Goal for section head and above should be framed considering the relevant financial, customer, process, and people development & innovation. Objectives should be stated in specific and measurable terms (including timeliness), plan vs actual (measurable) is compared within timeline.<br/>Please list out not more than seven key job objective/goals set by you and your appraiser for the year, which significantly impact the business performance of the company and carry out a self-assessment in term of achievement/fulfillment.</p>
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
										  </div>
										</div>
										<!-- /.modal-content -->
									  </div>
									  <!-- /.modal-dialog -->
									</div>
							</tr>
							<tr align="center" class="text-center TableHeading" style="background-color: #dddddd;">	
                                <td colspan="1" style="border-bottom-color: #ddd;"></td>							
								<td colspan="2"><b style="font-size:14px;">Measurable</b></td>
								<td colspan="2"></td>
								<td colspan="6"><b style="font-size:14px;">Annual Review</b></td>
							</tr>
							<tr align="center" class="text-center TableHeading" style="background-color: #dddddd;">
							<td rowspan="2" style="vertical-align:middle;"><b style="font-size:14px;">Goals</b></td>
								  <td style="vertical-align:middle;"><b style="font-size:14px;">Plan</b></td>
								  <td style="vertical-align:middle;"><b style="font-size:14px;">Actual</b></td>	
								  <td rowspan="2" style="vertical-align:middle;"><b style="font-size:14px;">Timeline</b></td>
								  <td rowspan="2" style="vertical-align:middle;"><b style="font-size:14px;">Weightage (a)</b></td>								  
								  <td style="vertical-align:middle;"><b style="font-size:14px;">Self Assessment (b)</b></td>
								  <td style="vertical-align:middle;"><b style="font-size:14px;">Total Self Assessment Score (a*b)</b></td>
								  <td style="vertical-align:middle;"><b style="font-size:14px;">Appraiser Assessment (x)</b></td>
								  <td style="vertical-align:middle;"><b style="font-size:14px;">Total Appraiser Assessment Score (x*a)</b></td>
								  <td style="vertical-align:middle;" colspan="2"><b style="font-size:14px;">Remarks</b></td>
							</tr>
							<tbody class="TableRow">
								<tr>
									<td colspan="11"><b style="font-size: 14px;">Financial</b></td>									
								</tr>
								<?php if(!empty($appraiser_goal)){foreach($appraiser_goal as $appraiser_goal) {?>
								<tr>
									<td><?php echo $appraiser_goal['free_goal'];?></td>
									<td>0%</td>
									<td>0%</td>
									<td>Monthly</td>
									<td>10</td>
									<td>4</td>
									<td>40</td>
									<td><?php echo $appraiser_goal['rating'];?></td>
									<td><?php echo $appraiser_goal['score'];?></td>
									<td colspan="2"><?php echo $appraiser_goal['remarks'];?></td>
								</tr>
							<?php }}?>
													
								
								<tr>
									<td colspan="11"></td>
								</tr>								
								<tr class="text-center" style="background: #e2e2e2;">
									<td colspan="4" style="font-size:17px; font-weight: 700;">Total</td>
									<td>80</td>
									<td>43</td>
									<td>350</td>
									<td></td>
									<td></td>
									<td></td>
						
								</tr>
							</tbody>
						  </table>
						  <p></p>
							<table id="" class="table table-bordered table-striped d-format"
								<tr>
									<td colspan="9" class="text-center TableHeading" style="vertical-align:middle;"><b style="font-size:14px;">SECTION II - PERFORMANCE FACTORS</td>
								</tr>
								<tr>
									<td colspan="9" class="text-center TableHeading" style="vertical-align:middle;"><b style="font-size:14px;">Rating (1-5) Annual Review</td>
								</tr>
								<tr class="TableHeading" align="center" style="background-color: #dddddd !important;">
									<td style="vertical-align:middle; align:center"><b style="font-size:14px;">Attribute</b></td>
									<td style="vertical-align:middle; align:center"><b style="font-size:14px;">Weightage (a)</b></td>
									<td style="vertical-align:middle; align:center"><b style="font-size:14px;">Self Assessment (b)</b></td>
									<td style="vertical-align:middle; align:center"><b style="font-size:14px;">Total Self Assessment Score (a*b)</b></td>
									<td style="vertical-align:middle; align:center"><b style="font-size:14px;">Appraiser Assessment (x)</b></td>
									<td style="vertical-align:middle; align:center"><b style="font-size:14px;">Total Appraiser Assessment Score (x*a)</b></td>
									
									<td style="vertical-align:middle; align:center"><b style="font-size:14px;">Remarks</b></td>
								</tr>
								<tr>
									<td colspan="10">
										<b style="font-size: 14px;">Creating Personal Execellance</b>
									</td>
								</tr>
								<?php if(!empty($appraiser_competency)){ foreach($appraiser_competency as $appraiser_competency) {?>
								<tr>
									<td><?php echo $appraiser_competency['competency_name']?></td>
									<td>2</td>
									<td>5</td>
									<td>10</td>
									
									<td><?php echo $appraiser_competency['rating']?></td>
									<td><?php echo $appraiser_competency['score']?></td>
									<td><?php echo $appraiser_competency['remarks']?></td>
									
								</tr>
								<?php }}?>
								<tr class="TableHeading text-center" align="center" style="background: #e2e2e2;">
									<td style="vertical-align:middle; align:center; font-size:17px; font-weight: 700;"">Total</td>
									<td style="vertical-align:middle; align:center">20</td>
									<td style="vertical-align:middle; align:center">46</td>
									<td style="vertical-align:middle; align:center">92</td>
									<td style="vertical-align:middle; align:center">0</td>
									<td style="vertical-align:middle; align:center">0</td>
									
									<td></td>
								</tr>
								
							</table>
							
							
						  <p></p>
							<table id="" class="table table-bordered table-striped d-format"
								<tr>
									<td colspan="9" class="text-center TableHeading" style="vertical-align:middle;"><b>SECTION III - OVERALL PERFORMANCE</td>
								</tr>
								<tr>
									<td colspan="9" class="text-center TableHeading" style="vertical-align:middle;"><b>Rating</td>
								</tr>
								<tr>
									<td colspan="9" class="text-center" style="vertical-align:middle;">
										The overall rating is summary of the employee's performance against the Goals and Performance Factors, in order to calculate the overall rating, and the total points for the sections I and II. Then referring to the overall performance rating scale belowk indicate the employee's overall rating by checking one of the five corresponding boxes eithin the appropriate point range.
									</td>
								</tr>
								<tr>
									<td>
										<table id="" class="table table-bordered table-striped d-format"
											<tr>
												<td>
													Section I
												</td>
												<td>
													Objectives/Goals (Total Points)
												</td>
												<td>
													<input type="text" class="form-control" placeholder="Enter ...">
												</td>
											</tr>
											<tr>
												<td>
													Section II
												</td>
												<td>
													Performance Factors (Total Points)
												</td>
												<td>
													<input type="text" class="form-control" placeholder="Enter ...">
												</td>
											</tr>
											<tr align="right">
												<td colspan="2">
													OVERALL POINTS (500)
												</td>
												<td>
													<input type="text" class="form-control" placeholder="Enter ...">
												</td>
											</tr>
											
										</table>
									</td>
								</tr>
							</table>
							
						  <p></p>
							<table id="" class="table table-bordered table-striped d-format"
								<tr>
									<td class="text-center TableHeading" style="vertical-align:middle;"><b>SECTION IV - DEVELOPMENT NEEDS</td>								
								</tr>
								<tr>
									<td class="text-center TableHeading" style="vertical-align:middle;">
										This pertain to the strengths, area for improvement, training needs & growth areas of the individual. It is very essential that is filled with a very specific inputs, which are actionable
									</td>								
								</tr>
								<tr>
									<td>
										<textarea class="form-control" rows="4" placeholder="Enter ..."></textarea>
									</td>
								</tr>
							</table>
						  <p></p>
							<table id="" class="table table-bordered table-striped d-format"
								<tr>
									<td class="text-center TableHeading" style="vertical-align:middle;"><b>SECTION V - APPRAISER COMMENTS</td>								
								</tr>
								<tr>
									<td class="text-center TableHeading" style="vertical-align:middle;">
										Summarize employee's overall performance results against Key Goal/Objectives and Performance Factors. While arriving at overall rating, predominant Weightage will be given to rating in section I & II
									</td>								
								</tr>
								<tr>
									<td>
										<textarea class="form-control" rows="4" placeholder="Enter ..."></textarea>
									</td>
								</tr>
							</table>
							<p></p>
							<table id="" class="table table-bordered table-striped d-format"
								<tr>
									<td class="text-center TableHeading" style="vertical-align:middle;"><b>SECTION VI - REVIEWER COMMENTS</td>								
								</tr>
								<tr>
									<td class="text-center TableHeading" style="vertical-align:middle;">The Reviewer(s)/Review committee is expected to ensure standard cause for the function /plant head on which they finalize the individual rating and communication to the Appraisee.</td>								
								</tr>
								<tr>
									<td>
										<textarea class="form-control" rows="4" placeholder="Enter ..."></textarea>
									</td>
								</tr>
							</table>
							<p></p>
							<table id="" class="table table-bordered table-striped d-format"
								<tr>
									<td class="text-center TableHeading" style="vertical-align:middle;"><b>SECTION VII - EMPLOYEE'S COMMENTS</td>								
								</tr>
								<tr>
									<td class="text-center TableHeading" style="vertical-align:middle;">
										After performance review discussions, the employee has option to make comments regarding his/her appraisal.
									</td>								
								</tr>
								<tr>
									<td>
										<textarea class="form-control" rows="4" placeholder="Enter ..."></textarea>
									</td>
								</tr>
							</table>
      					</div>
					</div>
				</div>
		</section>
		<section class="content" id="akshay">
			<!-- <hr class="hr0"> -->
			<div class="row">
				<div class="col-md-12 col-sm-6 col-xs-12">
					<div class="box">
						<?php echo $this->Form->Create()?>
						<div class="box-body BottomDiv" id="style-7">
						  <table id="countit" class="table table-bordered table-striped d-format" style="border:1px solid black !important;">
							<tr>
								<td colspan="11" class="text-center TableHeading" style="vertical-align:middle;"><b style="font-size:14px;">SECTION I - GOALS/OBJECTIVES</td>
							</tr>
							<tr>
								<td colspan="11" class="text-center TableHeading" style="vertical-align:middle;"><b style="font-size:14px;">Rating (1-5) Annual Review&nbsp;&nbsp;&nbsp;
								<span style="font-size:11px; font-weight:100;">(Total Weightage = 80)</span>
								<button type="button" class="btn" id="infobtn" data-toggle="modal" data-target="#information"><i class="fa fa-info-circle" aria-hidden="true"></i></button></td>
							        <div class="modal fade" id="information">
									  <div class="modal-dialog" id="dialoginfo">
										<div class="modal-content">					 
										  <div class="modal-body" style="overflow-x: unset;overflow-y: unset; height:313px;">
											<p style="text-align:justify; margin: 4%;font-weight: 500;">For the upcoming appraisal period, list and weight the major objective/goal to be accomplished by the employee during the appraisal weightage of this section should be 80. Distribute the weights so that the combined weights of all objects equals to the overall weights for the section. Objectives/Goal for section head and above should be framed considering the relevant financial, customer, process, and people development & innovation. Objectives should be stated in specific and measurable terms (including timeliness), plan vs actual (measurable) is compared within timeline.<br/>Please list out not more than seven key job objective/goals set by you and your appraiser for the year, which significantly impact the business performance of the company and carry out a self-assessment in term of achievement/fulfillment.</p>
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
										  </div>
										</div>
										<!-- /.modal-content -->
									  </div>
									  <!-- /.modal-dialog -->
									</div>
							</tr>
							<tr align="center" class="text-center TableHeading" style="background-color: #dddddd;">
								<td rowspan="2" style="vertical-align:middle;"><b style="font-size:14px;">Goals</b></td>
								<td colspan="2"><b style="font-size:14px;">Measurable</b></td>
								<td rowspan="2" style="vertical-align:middle;"><b style="font-size:14px;">Timeline</b></td>
								<td rowspan="2" style="vertical-align:middle;"><b style="font-size:14px;">Weightage (a)</b></td>
								<td colspan="6"><b style="font-size:14px;">Annual Review</b></td>
							</tr>
							<tr align="center" class="text-center TableHeading" style="background-color: #dddddd;">
								  <td style="vertical-align:middle;"><b style="font-size:14px;">Plan</b></td>
								  <td style="vertical-align:middle;"><b style="font-size:14px;">Actual</b></td>							  

								  <td style="vertical-align:middle;"><b style="font-size:14px;">Self Assessment (b)</b></td>
								  <td style="vertical-align:middle;"><b style="font-size:14px;">Total Self Assessment Score (a*b)</b></td>
								  <td style="vertical-align:middle;"><b style="font-size:14px;">Appraiser Assessment (x)</b></td>
								  <td style="vertical-align:middle;"><b style="font-size:14px;">Total Appraiser Assessment Score (x*a)</b></td>
								  <td style="vertical-align:middle;" colspan="2"><b style="font-size:14px;">Remarks</b></td>
							</tr>
							<tbody class="TableRow">
								<tr>
									<td colspan="11"><b style="font-size: 14px;">Financial</b></td>									
								</tr>
									<?php $i=1;	 foreach($employee_data as $employee_data4) {?>
									
								<tr>
									<td><?php echo $employee_data4['free_goal'];?></td>
									<td class="Plan">99</td>
									<td class="Actual">79</td>
									<td class="time_line">Monthly</td>
									<td class="weightage" id="<?php echo "weightage_".$i?>"><?php echo $employee_data4['weightage'];?></td>
									<td class="self_assmnt"><?php echo $employee_data4['rating'];?></td>
									<td class="total_selfassmnt"><?php echo $employee_data4['score'];?></td>
									<td class="appraiser_assmnt" id="<?php echo "appraiser_assmnt_".$i?>" >
										<select name="<?php echo "appraiser_assmnt_".$i?>" data="<?php echo $i;?>" required = "required" style="width: 100%;">
											<option value="">Select</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
							<!-- 	<input type="text" name="<?php echo"appraiser_assmnt_".$i?>" data="<?php echo $i;?>"  style="width: 35px;" onchange='calculatetotal("<?php echo $i;?>")' required ="required" min="1" max="5" pattern="[1-5]{1}" title="Rating should be between 1 to 5 only	"/>	 -->	
									</td>
									<td class="total_appraiserassmnt"  id="<?php echo "total_appraiserassmnt_".$i?>" >
									</td>
									<input type="hidden" name="<?php echo"total_appraiser_score_".$i?>" id="<?php  echo"total_appraiser_score_".$i?>">
									<input type="hidden" name="no" value="<?php echo $i?>">
									<input type="hidden" name="<?php echo"goal_setting_id_".$i?>" value="<?php echo $employee_data4['goal_setting_id']?>">
									<!-- <td class="reviewer" id="<?php echo"reviewer_".$i?>">
										<input type="text"name=""  value="" style="width: 35px;" data="<?php echo $i;?>" onchange='calculatesum()'>
									</td> -->
								<!-- 	<td class="total_reviewerassmnt" id="<?php echo "total_reviewerassmnt_".$i ?>"></td> -->
								<td>
							    <textarea  name="<?php echo"remark_".$i?>" id="<?php echo"remark_".$i?>"  class="form-control" style="height: 30px;"> 
							    </textarea>		
								</td>
								</tr>
												
									<?php $i++;}?>		
								<tr>
									<td colspan="11"></td>
								</tr>								
								<tr class="text-center" style="background: #e2e2e2;">
									<td colspan="4" style="font-size:17px; font-weight: 700;">Total</td>
									<td id="sum_weightage"></td>
									<td id="sum_self_assmnt"></td>
									<td id="sum_total_selfassmnt"></td>
									<td 	></td>
									<td id="sum_total_appraiserassmnt"></td>
								    <td ></td>
									
								</tr>
							</tbody>
						  </table>
						  <p></p>
							<table id="countit_competency" class="table table-bordered table-striped d-format"
								<tr>
									<td colspan="9" class="text-center TableHeading" style="vertical-align:middle;"><b style="font-size:14px;">SECTION II - PERFORMANCE FACTORS</td>
								</tr>
								<tr>
									<td colspan="9" class="text-center TableHeading" style="vertical-align:middle;"><b style="font-size:14px;">Rating (1-5) Annual Review</td>
								</tr>
								<tr class="TableHeading" align="center" style="background-color: #dddddd !important;">
									<td style="vertical-align:middle; align:center"><b style="font-size:14px;">Attribute</b></td>
									<td style="vertical-align:middle; align:center"><b style="font-size:14px;">Weightage (a)</b></td>
									<td style="vertical-align:middle; align:center"><b style="font-size:14px;">Self Assessment (b)</b></td>
									<td style="vertical-align:middle; align:center"><b style="font-size:14px;">Total Self Assessment Score (a*b)</b></td>
									<td style="vertical-align:middle; align:center"><b style="font-size:14px;">Appraiser Assessment (x)</b></td>
									<td style="vertical-align:middle; align:center"><b style="font-size:14px;">Total Appraiser Assessment Score (x*a)</b></td>
								<!-- 	<td style="vertical-align:middle; align:center"><b style="font-size:14px;">Reviewer Assessment (y)</b></td>
									<td style="vertical-align:middle; align:center"><b style="font-size:14px;">Total Reviewer Assessment Score (y*a)</b></td> -->
									<td style="vertical-align:middle; align:center"><b style="font-size:14px;">Remarks</b></td>
								</tr>
								<tr>
									<td colspan="10">
										<b style="font-size: 14px;">Creating Personal Execellance</b>
									</td>
								</tr>
								<?php $j=1; foreach($employee_competency_data as $employeedata5) {?>
								<tr>
									<td><?php echo $employeedata5['competency_name']?></td>
									<td class="<?php echo"competency_weightage"?>" id="<?php echo"competency_weightage_".$j?>">2</td>
									<td class="competency_self_assmnt">5</td>
									<td class="competency_total_selft_assmnt">10</td>
									<td class="competency_appraiser_assmnt" id="<?php echo"competency_appraiser_assmnt_".$j?>">
								 <select  data="<?php echo $j;?>"  name="<?php echo "competency_appraiser_assmnt_".$j?>"" id="<?php echo "competency_appraiser_assmnt_".$j?> "  required = "required" style="width: 100%;">
											<option value="">Select</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>

									</td>
									<td class="competency_total_appraisal_asmnt" id="<?php echo"competency_total_appraisal_asmnt_".$j?>"></td>
									<input type="hidden" name="competency_no" value="<?php echo $j?>">
									<input type="hidden" name="<?php echo"competency_appraiser_score_".$j?>" id="<?php echo"competency_appraiser_score_".$j?>">
									<input type="hidden" name="<?php echo"competency_setting_id_".$j?>" value="<?php echo $employeedata5['competency_setting_id'];?>">
								<!-- 	<td><input type="text" class="form-control" style="height: 20px;"></td>
									<td><input type="text" class="form-control" style="height: 20px;"></td> -->
									<td><textarea type="text" class="form-control" style="height: 30px;" name="<?php echo"remark_competency_".$j?>"></textarea></td>
								</tr>
							 <?php  $j++; }?>
								
								
								
								<tr class="TableHeading text-center" align="center" style="background: #e2e2e2;">
									<td style="vertical-align:middle; align:center; font-size:17px; font-weight: 700;"">Total</td>
									<td style="vertical-align:middle; align:center" id="sum_competency_weightage">20</td>
									<td style="vertical-align:middle; align:center" id="sum_competency_self_assmnt">46</td>
									<td style="vertical-align:middle; align:center" id="sum_competency_total_selfassmnt">92</td>
									<td style="vertical-align:middle; align:center"></td>
									<td style="vertical-align:middle; align:center" id="sum_competency_appraiser_assmnt"></td>
									<td style="vertical-align:middle; align:center"></td>
									<!-- <td style="vertical-align:middle; align:center"><input type="text" class="form-control" style="height: 20px;"></td>
									<td></td> -->
								</tr>
								
							</table>
							
							
						  <p></p>
							<table id="" class="table table-bordered table-striped d-format"
								<tr>
									<td colspan="9" class="text-center TableHeading" style="vertical-align:middle;"><b>SECTION III - OVERALL PERFORMANCE</td>
								</tr>
								<tr>
									<td colspan="9" class="text-center TableHeading" style="vertical-align:middle;"><b>Rating</td>
								</tr>
								<tr>
									<td colspan="9" class="text-center" style="vertical-align:middle;">
										The overall rating is summary of the employee's performance against the Goals and Performance Factors, in order to calculate the overall rating, and the total points for the sections I and II. Then referring to the overall performance rating scale belowk indicate the employee's overall rating by checking one of the five corresponding boxes eithin the appropriate point range.
									</td>
								</tr>
								<tr>
									<td>
										<table id="" class="table table-bordered table-striped d-format"
											<tr>
												<td>
													Section I
												</td>
												<td>
													Objectives/Goals (Total Points)
												</td>
												<td id="total_goal_point">
													
												</td>
											</tr>
											<tr>
												<td>
													Section II
												</td>
												<td>
													Performance Factors (Total Points)
												</td>
												<td id="total_competency_point">
													
												</td>
											</tr>
											<tr align="right">
												<td colspan="2">
													OVERALL POINTS (500)
												</td>
												<td id="total_score_point">
													
												</td>
											</tr>
											
										</table>
									</td>
								</tr>
							</table>
							
						  <p></p>
							<table id="" class="table table-bordered table-striped d-format"
								<tr>
									<td class="text-center TableHeading" style="vertical-align:middle;"><b>SECTION IV - DEVELOPMENT NEEDS</td>								
								</tr>
								<tr>
									<td class="text-center TableHeading" style="vertical-align:middle;">
										This pertain to the strengths, area for improvement, training needs & growth areas of the individual. It is very essential that is filled with a very specific inputs, which are actionable
									</td>								
								</tr>
								<tr>
									<td>
										<textarea class="form-control" rows="4" placeholder="Enter ..."></textarea>
									</td>
								</tr>
							</table>
						  <p></p>
							<table id="" class="table table-bordered table-striped d-format"
								<tr>
									<td class="text-center TableHeading" style="vertical-align:middle;"><b>SECTION V - APPRAISER COMMENTS</td>								
								</tr>
								<tr>
									<td class="text-center TableHeading" style="vertical-align:middle;">
										Summarize employee's overall performance results against Key Goal/Objectives and Performance Factors. While arriving at overall rating, predominant Weightage will be given to rating in section I & II
									</td>								
								</tr>
								<tr>
									<td>
										<textarea class="form-control" rows="4" placeholder="Enter ..."></textarea>
									</td>
								</tr>
							</table>
							<p></p>
							<table id="" class="table table-bordered table-striped d-format"
								<tr>
									<td class="text-center TableHeading" style="vertical-align:middle;"><b>SECTION VI - REVIEWER COMMENTS</td>								
								</tr>
								<tr>
									<td class="text-center TableHeading" style="vertical-align:middle;">The Reviewer(s)/Review committee is expected to ensure standard cause for the function /plant head on which they finalize the individual rating and communication to the Appraisee.</td>								
								</tr>
								<tr>
									<td>
										<textarea class="form-control" rows="4" placeholder="Enter ..."></textarea>
									</td>
								</tr>
							</table>
							<p></p>
							<table id="" class="table table-bordered table-striped d-format"
								<tr>
									<td class="text-center TableHeading" style="vertical-align:middle;"><b>SECTION VII - EMPLOYEE'S COMMENTS</td>								
								</tr>
								<tr>
									<td class="text-center TableHeading" style="vertical-align:middle;">
										After performance review discussions, the employee has option to make comments regarding his/her appraisal.
									</td>								
								</tr>
								<tr>
									<td>
										<textarea class="form-control" rows="4" placeholder="Enter ..."></textarea>
									</td>
								</tr>
							</table>
							<p></p>
							<button class="btn btn-primary pull-right" id="send_rating" type="submit">Submit</button>
							<?php echo $this->Form->end();?>
      					</div>
					</div>
				</div>
		</section>
<script src="bower_components/jquery/dist/jquery.min.js"></script>

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
var button_data = <?php echo $disable_button; ?>;

  $('#aditya').hide();	

  var tds = document.getElementById('countit').getElementsByTagName('td');
            var sum_weightage = 0;
            var sum_self_assmnt = 0;
            var sum_total_appraiserassmnt =0;
            var sum_appraiser_assmnt = 0;
            var sum_total_selfassmnt = 0;
            var appraiser_sum = 0;
            var sumArray = [];
            for(var i = 0; i < tds.length; i ++) {
                if(tds[i].className == 'weightage') {
                    sum_weightage += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
                }
                if(tds[i].className == 'self_assmnt') {
                    sum_self_assmnt += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
                }
                if(tds[i].className == 'total_selfassmnt') {
                    sum_total_selfassmnt += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
                }
                if(tds[i].className == 'appraiser_assmnt') {
                    sum_appraiser_assmnt += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
                }

                if(tds[i].className == 'total_appraiserassmnt') {
                    sum_total_appraiserassmnt += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
                }
            }
   
   var tds_competency = document.getElementById('countit_competency').getElementsByTagName('td');
            var competency_sum_weightage = 0;
            var competency_sum_self_assmnt = 0;
            var competency_sum_total_appraiserassmnt =0;
            var competency_sum_appraiser_assmnt = 0;
            var competency_sum_total_selfassmnt = 0;
            var competency_appraiser_sum = 0;
            var competency_sumArray = [];
            for(var i = 0; i < tds_competency.length; i ++) {
                if(tds_competency[i].className == 'competency_weightage') {
                    competency_sum_weightage += isNaN(tds_competency[i].innerHTML) ? 0 : parseInt(tds_competency[i].innerHTML);
                }
                if(tds_competency[i].className == 'competency_self_assmnt') {
                    competency_sum_self_assmnt += isNaN(tds_competency[i].innerHTML) ? 0 : parseInt(tds_competency[i].innerHTML);
                }
                if(tds_competency[i].className == 'competency_total_selft_assmnt') {
                    competency_sum_total_appraiserassmnt += isNaN(tds_competency[i].innerHTML) ? 0 : parseInt(tds_competency[i].innerHTML);
                }
                if(tds_competency[i].className == 'competency_appraiser_assmnt') {
                    competency_sum_appraiser_assmnt += isNaN(tds_competency[i].innerHTML) ? 0 : parseInt(tds_competency[i].innerHTML);
                }

                if(tds_competency[i].className == 'competency_total_appraisal_asmnt') {
                    competency_sum_total_selfassmnt += isNaN(tds_competency[i].innerHTML) ? 0 : parseInt(tds_competency[i].innerHTML);
                }
            }



            $('.competency_appraiser_assmnt select').on('change',function(){  
            	var sum = 0; 
            	 var value = this.value;
                   var id = $(this).attr('data');
                   var weight = (document.getElementById("competency_weightage_"+id).innerHTML);
                  // alert(id);alert(value);alert(weight);
                   var competency_total = parseInt(value*weight);
                 // alert(competency_total);
            	 $(".appraiser_assmnt select").each(function() {
            	  
               if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value); 

            }
                 });

                 document.getElementById('competency_total_appraisal_asmnt_'+id).innerHTML = competency_total;
                 $('#competency_appraiser_score_'+id).val(competency_total);
                 calculatetotal1(id);

            	});

                 function calculatetotal1(id)
                 {
                     competency_sumArray[id] = parseInt($('#competency_total_appraisal_asmnt_'+id).text());

           		 for(key in competency_sumArray){
           			competency_appraiser_sum += competency_sumArray[key];
           		 }
           		 //alert(competency_appraiser_sum);
           		 $('td#sum_competency_appraiser_assmnt').text(competency_appraiser_sum);
           		
           		var goal_score = $('td#sum_total_appraiserassmnt').text();
           		var total_score = parseInt(competency_appraiser_sum) + parseInt(goal_score);
           		$('td#total_competency_point').text(competency_appraiser_sum);
           		$('td#total_score_point').text(total_score);
           		 competency_appraiser_sum = 0;
                 }



             document.getElementById('sum_competency_weightage').innerHTML = competency_sum_weightage;
            document.getElementById('sum_competency_self_assmnt').innerHTML = competency_sum_self_assmnt;
            document.getElementById('sum_competency_total_selfassmnt').innerHTML = competency_sum_total_appraiserassmnt;
   

            $('.appraiser_assmnt select').on('change',function(){  
            	var sum = 0; 
            	 var value = this.value;
                   var id = $(this).attr('data');
                   var weight = (document.getElementById("weightage_"+id).innerHTML);
                   var total = parseInt(value*weight);
            	 $(".appraiser_assmnt select").each(function() {
            	  
               if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value); 

            }
                 });
                  document.getElementById('total_appraiserassmnt_'+id).innerHTML = total;
                  $('#total_appraiser_score_'+id).val(total);
                 // alert($('#total_appraiser_score_'+id).val());
                  //document.getElementById('sum_appraiser_assmnt').innerHTML = sum;
                  calculatetotal(id);
            });
           function calculatetotal(id)
           {
           		//alert(id);
           		//alert($('#total_appraiserassmnt_'+id).text());
           		sumArray[id] = parseInt($('#total_appraiserassmnt_'+id).text());
           		for(key in sumArray){
           			appraiser_sum += sumArray[key];
           		}
           		$('td#sum_total_appraiserassmnt').text(appraiser_sum);
           		$('td#total_goal_point').text(appraiser_sum);
           		appraiser_sum =0;
           }
            
            document.getElementById('sum_weightage').innerHTML = sum_weightage;
            document.getElementById('sum_self_assmnt').innerHTML = sum_self_assmnt;
            document.getElementById('sum_total_selfassmnt').innerHTML = sum_total_selfassmnt;
          
            
            document.getElementById('sum_reviewer').innerHTML = sum_reviewer;
            document.getElementById('sum_total_reviewerassmnt').innerHTML = sum_total_reviewerassmnt;


</script>
<style type="text/css">
	
/* Login Css */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body  { margin:0px; padding:0px;font-family:arial;}
img, ul, ol, li, span, table  { border:none; margin:0px; padding:0px; }
video { width: 100%; height: auto; }
video { max-width: 100%; height: auto; }
html, body {
  height: 100%;
  background-size: cover;
  background-image: url(PMS-BG.jpg);
  background-repeat: no-repeat;
  font-family: "arial";
/*  color: white;*/
}

.modal-dialog
{
	float:right;
}

.modal-content
{
	background-color: #ffffff;/*#265a89;darkcyan;*/
	border: 2px solid black;
	vertical-align: bottom;	
	position: absolute;
	bottom: 0px;
	right:50px;
}
.btn-link
{
	color:#265a89;	/*white;*/
}
.modal-heading h2
{
	color:#265a89;
}

.pace
{
	font-family: Arial, Helvetica, sans-serif;
	color:#bf0000;
	font-size:100px;
	font-weight: bold;
}

a, a:visited {
    color: inherit;
	text-decoration:none !important;
}


.fontPMS
{
	font-family: sans-serif;
	font-size:15px;
	font-weight:bold;
	float: left;
    background-color: transparent;
    background-image: none;
    padding: 15px 15px;
	color: #fff;
}

hr.MenuDivider{
	border-top: 1px solid #8c8b8b;
}


.fontPMSDashboard
{
	font-family: sans-serif;
	font-size:35px;
	font-weight:bold;
	color: black;
}


.TDStyle
{
	vertical-align:middle !important;
	font-size:20px;
	font-family: sans-serif;
}

.TopInfoImage
{
	vertical-align:middle !important;
}

.contentTop
{
    padding: 15px 0px 0px 0px;
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;
}

.Initiated
{
	color: green;
}

.Pending
{
	color: orange;
}

.Completed
{
	color:blue;
}

.Question
{
	font-size:14px;
}

.Answer
{
	font-size:12px !important;
}


.BottomDiv
{
	overflow-y: auto; 
	height:73vh;
}

.TableHeading
{
	font-size:12px;
	vertical-align:middle !important;
}

.TableRow
{
	font-size:11px;
	vertical-align:middle !important;
}

/* width 
::-webkit-scrollbar {
  width: 10px;
}


::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 

::-webkit-scrollbar-thumb {
  background: #888; 
}


::-webkit-scrollbar-thumb:hover {
  background: #555; 
}*/



#style-4::-webkit-scrollbar-track
{
	/*-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);*/
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,1);
	background-color: #F5F5F5;
}

#style-4::-webkit-scrollbar
{
	width: 8px;
	height: 8px;
	background-color: #F5F5F5;
}

#style-4::-webkit-scrollbar-thumb
{
	background-color: #000000;
	border: 2px solid #555555;
}


#style-7::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
	border-radius: 10px;
}

#style-7::-webkit-scrollbar
{
	width: 8px;
	height: 8px;
	background-color: #F5F5F5;
}

#style-7::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	background-image: -webkit-gradient(linear,
									   left bottom,
									   left top,
									   color-stop(0.44, rgb(122,153,217)),
									   color-stop(0.72, rgb(73,125,189)),
									   color-stop(0.86, rgb(28,58,148)));
}



.ARS
{
	color:#2d6f96;
	font-size:12px;
	/*float:right;
	padding:0px 0px 0px 0px;
	text-align:center;
	font-size:16px;
	background-color: #ecf0f5 !important;
	width: 8vh !important;
	right: 2vh !important;*/
	
	
	padding: 0px 2px 0px 2px; 
	float:right; 
	bottom:0; 
	top:0;	
}

#myBtn {
  display: none;
  position: fixed;
  bottom: 30px;
  right: 30px;
  z-index: 99;
  font-size: 20px;
  border: none;
  outline: none;
  background-color: #3c8dbc;
  color: white;
  cursor: pointer;
  padding: 10px;
  border-radius: 25px;
  opacity: 0.5;
}

#myBtn:hover {
  background-color: #555;
  opacity: 0.5;
}

.CenterDiv
{
	margin: 0 auto;
	overflow: hidden;
	padding: 10px 0;
	align-items:center;
	/*justify-content: space-around;*/
	justify-content: center;
	display: flex;
	float: none;
}


/***************Expand - Collapse********************/
.collapsible {
  background-color: #89bddc;
  color: #000000;
  cursor: pointer;
  /*padding:5px 15px 5px 15px*/
  padding: 10px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 12px;
}

.DivCcontent {
  padding: 5px 15px 0px 15px;
  display: none;
  overflow: hidden;
  background-color: #ffffff;
  font-size:12px;
  text-align: justify;
  border: 1px solid #d2d6de;
}

.collapsible:after {
  content: '\002B';
  color: #000000;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  /*content: "\2212";*/
}

/*Expand - Collapse Ends********************/

.Agree {
  position: fixed;
  bottom: 90px;
  right: 30px;
  z-index: 99;
  font-size: 20px;
  border: none;
  outline: none;
  color: white;
  cursor: pointer;
  padding: 10px;
}

.ColorRed
{
	color:#990000 !important;
}

.ColorGreen
{
	color:#336600 !important;
}


/*Small Scroll bars*/
/* width */
::-webkit-scrollbar {
  width: 8px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
/*Small Scroll bars*/

.dataTables_filter
{
	float:right !important;
}

.VerticalMiddle
{
	position:relative;
	vertical-align:middle !important;
}

/**************************************/


.dropdownoption
{
	height:24px;
}

.Profile-Button
{
	margin-top: 6%;
}
.Profile-Buttons
{
	background-color: #2d6f96 !important;
    border-color: #1a4b69 !important;
    width: 160px;
    border-radius: 6px;
    font-size: 13px;
}
.image-box
{
	margin-bottom:-5%;
}
label.filebutton 
{
    width: 160px;
    height: 25px;
    border-bottom-left-radius: 22px;
    border-bottom-right-radius: 22px;
    position: relative;
    background-color: #cccccc78;
    top: -30px;
	cursor: pointer;
	text-align: center;
}

label span input {
    z-index: 999;
    width: 0px;
    height: 0px;
    line-height: 0;
    font-size: 50px;
    position: absolute;
    opacity: 0;
    filter: alpha(opacity = 0);
    -ms-filter: "alpha(opacity=0)";
    cursor: pointer;
    _cursor: hand;
    margin: 0;
    padding: 0;
}
.PPDivAlign h2
{
	border-bottom: 5px solid #aeb5c5;
	color: white;
	margin: 2%;
	padding: 3%;
}
.PPDivAlign span
{
	padding: 5px; 
	margin-left: 4%;
}
.PPDivAlign
{
	vertical-align:middle;
}
.d-format>tbody>tr>td
{
            border: 1px solid #b5b5b5;
			font-size:11px;
}

.action>tbody>tr>td
{
	font-size:11px !important;
}


/* Media Query for responsiveness*/

@media only screen and (max-width: 768px) {
  label.filebutton 
{
    top: -30px;
	right: 0px;
}
}

@media only screen and (max-width: 411px) {
  label.filebutton 
{
    top: -30px;
	right: 0px;
}
}

@media only screen and (max-width: 375px) {
  label.filebutton 
{
    top: -30px;
	right: 0px;
}
}

@media only screen and (max-width: 360px) {
  label.filebutton 
{
    top: -30px;
	right: 0px;
}
}
@media only screen and (max-width: 320px) {
  label.filebutton 
{
    top: -30px;
	right: 0px;
}
}




/*****Tree View Starts*****/

.treeview {
  margin: 10px 0 0 20px;
}

ul { 
  list-style: none;
}

.treeview li {
  background: url(http://jquery.bassistance.de/treeview/images/treeview-default-line.gif) 0 0 no-repeat;
  padding: 2px 0 2px 16px;
}

.treeview > li:first-child > label {
  /* style for the root element - IE8 supports :first-child
  but not :last-child ..... */
  
}

.treeview li.last {
  background-position: 0 -1766px;
}

.treeview li > input {
  height: 16px;
  width: 16px;
  /* hide the inputs but keep them in the layout with events (use opacity) */
  opacity: 0;
  filter: alpha(opacity=0); /* internet explorer */ 
  -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(opacity=0)"; /*IE8*/
}

.treeview li > label {
  background: url(https://www.thecssninja.com/demo/css_custom-forms/gr_custom-inputs.png) 0 -1px no-repeat;
  /* move left to cover the original checkbox area */
  margin-left: -20px;
  /* pad the text to make room for image */
  padding-left: 20px;
}

/* Unchecked styles */

.treeview .custom-unchecked {
  background-position: 0 -1px;
}
.treeview .custom-unchecked:hover {
  background-position: 0 -21px;
}

/* Checked styles */

.treeview .custom-checked { 
  background-position: 0 -81px;
}
.treeview .custom-checked:hover { 
  background-position: 0 -101px; 
}

/* Indeterminate styles */

.treeview .custom-indeterminate { 
  background-position: 0 -141px; 
}
.treeview .custom-indeterminate:hover { 
  background-position: 0 -121px; 
}
/*******Tree View Ends***********/


.font11px
{
	font-size:11px !important;
}


/*********************/

.selection
{
    width: 100%;
    padding: 6px 12px;
	font-size: 14px;
    border-color: #d2d6de;
    border-radius: 4px;
	line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
	border: 1px solid #ccc;
	cursor: pointer;
}
.labelpara
{
	font-weight:bold;
	margin-top: 8%;
}
#infobtn
{
	background: none;
    border: none;
    box-shadow: none;
}
#dialoginfo
{
	margin-top: 32%; 
	margin-right: 23%;
}
/****************Progress Bar**********************/

.progress1bar {
  width: 100%;
}

.progress1 {
  -webkit-appearance: none;
  width: 100%;
  height: 5px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.progress1:hover {
  opacity: 1;
}

.progress1::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 18px;
  height: 18px;
  border-radius: 50%;
  background: #2d6f96;
  cursor: pointer;
}

.progress1::-moz-range-thumb {
  width: 18px;
  height: 18px;
  border-radius: 50%;
  background: #2d6f96;
  cursor: pointer;
}

/* Media Query for responsiveness*/

@media only screen and (max-width: 768px) {
  label.filebutton 
{
    top: -30px;
	right: 0px;
}
.selection
{
    width: 66%;
}
}

@media only screen and (max-width: 411px) {
  label.filebutton 
{
    top: -30px;
	right: 0px;
}
}

@media only screen and (max-width: 375px) {
  label.filebutton 
{
    top: -30px;
	right: 0px;
}
}

@media only screen and (max-width: 360px) {
  label.filebutton 
{
    top: -30px;
	right: 0px;
}
}
@media only screen and (max-width: 320px) {
  label.filebutton 
{
    top: -30px;
	right: 0px;
}
}
</style>