<?php
$id=$_REQUEST["id"];
$lab=(int)$id;
$lab--;

echo '
<div class="card1">
							<div style="display:inline">
							<h4 style="margin-left:15px;display:inline"><b>Specimen Details</b></h4>
							
							</div>
							<hr/>
							
								<form class="form-horizontal">
									<fieldset>
										<label style="float:right">Specimen Sample - '; echo $id; echo '</label><br/>
										<div class="form-group">
											<label class="col-md-3 control-label">Species </label>
											<div class="col-md-3">
												<select name="specimenSpecies[]" class="form-control">';
													include('species/list_species.php'); 
												echo '</select>
											</div>
											<label class="col-md-3 control-label">Sample Type </label>
											<div class="col-md-3">
												<select name="sampleType[]" value="val" class="form-control">';
												include('sampleType/list_sampleType.php');
																																					
												echo '</select>
											</div>
											
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Select Labs </label>
											<div class="col-md-3 ">
											<select id="lab' . $lab . '" name="lab[]" class="selectpicker" multiple>
													<option value="DBM">DBM</option>
													<option value="DIO">DIO</option>
													<option value="DBT">DBT</option>
													<option value="DP">DP</option>
													<option value="SE">SE</option>
													<option value="DV">DV</option>
													<option value="E&I">E&amp;I</option>
													<option value="GD">GD</option>
												</select>
												</div>
											<script>
											
											$(document).ready(function(){
												$("select").selectpicker();
												});
											</script>
											
											
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Animal Age</label>
											<div class="col-md-3"> 	
											<input name="animalAge[]" type="text" placeholder="Enter Age in numbers" class="form-control">
											</div>
											<label class="col-md-3 control-label">Sex</label>
											<div class="col-md-3">
												<select name="animalSex[]"  class="selectpicker">
													<option value="Nil" selected>Nil</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
									
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Tests Required</label>
											<div class="col-md-6"> 	
											<select id="testsRequired' . $lab . '" name="testsRequired[]" data-width="50%" class="selectpicker" multiple>';
											include('tests/list_tests_required.php'); 
											echo '</select>
											</div>					
									
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Disease Suspected </label>
											<div class="col-md-6"> 	
											<select id="diseaseSuspected' . $lab . '" name="diseaseSuspected[]" data-width="50%" class="selectpicker" multiple>';
													 include('disease/list_diseaseNames.php');
												echo '</select>
											</div>					
									
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Animal History </label>
											<div class="col-md-9"> 	
											<textarea name="animalHistory[]" placeholder="Enter the Animal History" type="text" class="form-control"></textarea>
											</div>					
									
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Barcode </label>
											<div class="col-md-4"> 	
											<input name="barcode[]" placeholder="Scan the barcode" type="text" class="form-control"></textarea>
											</div>					
									
										</div>
									</fieldset>
								</form>
							
					</div><!--/ .card -->
					';
?>