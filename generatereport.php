<?php
require_once('core.php');
require_once('header.php');
	?>
	<div class="row">
	    <div id="breadcrumb" class="col-md-12">
	        <ol class="breadcrumb">
	            <li><a href="index.php">Home</a></li>
	            <li><a href="#">Report Generator</a></li>
	        </ol>
	    </div>
	</div>
	<div class="row">
	    <div class="col-xs-12">
				<form id="reportForm" method="post" action="finalreport.php"  target="_blank">
				    <div class="section">
				    	<label class="control-label col-sm-2">Patient Name:</label> <input type="text" id="patientname" name="patientname" required="true">
				    </div>

				    <div class="section" data-basename='sect1food'>
				    	<div class='section-select'>
				        <label class="col-sm-2 control-label">Section 1:</label>
				        <select required="true" id="sect1food" name="sect1food" style="width: 35%;">
				          <option value="" selectable="false">-None-</option>
				          <?php //create menu selections
				          $query = mysqli_query($dbc, "SELECT foodInfoID, foodTitle FROM foodinfo WHERE foodSection=1 and foodInfoStatus = 'a'") or die(mysql_error());
				          while ($row = mysqli_fetch_array($query)){
				              echo "<option value='".$row['foodInfoID']."'>".$row['foodTitle']."</option>";
				          } ?>
				        </select>
				        <i class='addFoodSelectBtn fa fa-plus-circle'></i>
				      </div>
				    </div>

				    <div class="section" data-basename='sect2food'>
				    	<div class='section-select'>
					      <label class="col-sm-2 control-label">Section 2:</label>
					      <select name="sect2food" id="sect2food" style="width: 35%;">
					         	<option value="" selectable="false">-None-</option>
										<?php //create menu selections
										$query = mysqli_query($dbc, "SELECT foodInfoID, foodTitle FROM foodinfo WHERE foodSection=2 and foodInfoStatus = 'a'") or die(mysql_error());
										while ($row = mysqli_fetch_array($query)){
											echo "<option value='".$row['foodInfoID']."'>".$row['foodTitle']."</option>";
										} ?>
					      </select>
				        <i class='addFoodSelectBtn fa fa-plus-circle'></i>
					    </div>
				    </div>

				    <div class="section" data-basename='sect3food'>
				    	<div class='section-select'>
					  		<label class="col-sm-2 control-label">Section 3:</label>
					      <select required="true" name="sect3food" id="sect3food" style="width: 35%;">
					      	<option value="" selectable="false">-None-</option>
					        <?php //create menu selections
					        $query = mysqli_query($dbc, "SELECT foodInfoID, foodTitle FROM foodinfo WHERE foodSection=3 and foodInfoStatus = 'a'") or die(mysql_error());
					        while ($row = mysqli_fetch_array($query)){
					            echo "<option value='".$row['foodInfoID']."'>".$row['foodTitle']."</option>";
					        } ?>
					      </select>
				        <i class='addFoodSelectBtn fa fa-plus-circle'></i>
					    </div>
				    </div>

				    <div class="section" data-basename='sect4food'>
				    	<div class='section-select'>
					      <label class="col-sm-2 control-label">Section 4:</label>
					      <select name="sect4food" id="sect4food" style="width: 35%;">
					         	<option value="" selectable="false">-None-</option>
										<?php //create menu selections
										$query = mysqli_query($dbc, "SELECT foodInfoID, foodTitle FROM foodinfo WHERE foodSection=4 and foodInfoStatus = 'a'") or die(mysql_error());
										while ($row = mysqli_fetch_array($query)){
											echo "<option value='".$row['foodInfoID']."'>".$row['foodTitle']."</option>";
										} ?>
					      </select>
				        <i class='addFoodSelectBtn fa fa-plus-circle'></i>
					    </div>
				    </div>
				    <input type="submit" value="Generate Report"  class="btn btn-primary" />
				    <p>Report will open in a new tab. Once it is loaded, right-click on the page and select Print, then set the Destination (or Location) to "Save as PDF".</p>
				</form>
	    </div>
	</div>
	<script type="text/javascript">

		function cloneSelectDiv(evt) {
			var $sectionParent = $(this).closest(".section");
    		var baseName = $sectionParent.attr("data-basename");
    		var totalSelects = $sectionParent.find("select").length;
    		$newSelectDiv = $(this).parent().clone();
    		var newName = baseName+"-"+totalSelects;
    		$newSelectDiv.find("select").attr("id",newName).attr("name",newName);
    		$newSelectDiv.find("label").empty();
    		$newSelectDiv.find(".addFoodSelectBtn").click(cloneSelectDiv);
    		$sectionParent.append($newSelectDiv);
    	}

	    $(document).ready(function() {
	    	$(".addFoodSelectBtn").click(cloneSelectDiv);

	    });
	</script>
	<?php
	require_once("footer.php");
?>