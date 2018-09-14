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
												<select name="specimenSpecies[]" class="form-control">
													<option>Bovine</option>
													<option>Ovine</option>
													<option>Capmine</option>
													<option>Feline</option>
													<option>Wild Animal</option>
													<option>Lab Animal</option>
													<option>Other</option>
												</select>
											</div>
											<label class="col-md-3 control-label">Sample Type </label>
											<div class="col-md-3">
												<select name="sampleType[]" value="val" class="form-control">
													<option>Blood</option>
													<option>Brain Sample</option>
													<option>Cloacal Swab</option>
													<option>Ear Piece</option>
													<option>Fecal Sample</option>
													<option>Nasal Swab</option>
													<option>Impressions Smear</option>
													<option>Intestinal loop</option>
													<option>Post Mortem Sample</option>
													<option>Preputial wash</option>
													<option>Pus Sample</option>
													<option>Semen in Neat</option>
													<option>Semen in VTM</option>
													<option>Serum Sample</option>
													<option>Stomach Content</option>
													<option>Tissue</option>
													<option>Tissue - 10% Formulae</option>
													<option>Tongue Epithelium</option>
													<option>Trachel Swab</option>
													<option>Urine Sample</option>
													<option>Other</option>
													
												</select>
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
											<input name="animalAge[]" type="number" placeholder="Enter Age in numbers" class="form-control">
											</div>
											<label class="col-md-3 control-label">Sex</label>
											<div class="col-md-3">
												<select name="animalSex[]" value="Male" class="form-control">
													<option>Male</option>
													<option>Female</option>
												</select>
											</div>
									
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Tests Required</label>
											<div class="col-md-9"> 	
											<input name="testsRequired[]"  type="text" placeholder="Enter Tests requires with each test seperated with comma" class="form-control">
											</div>					
									
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Disease Suspected </label>
											<div class="col-md-9"> 	
											<input name="diseaseSuspect[]"  type="text" placeholder="Enter Disease Suspected" class="form-control">
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