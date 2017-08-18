<?php
	require_once('core.php');
	require_once('header.php');

	$r = mysqli_query($dbc, "SELECT * FROM foodinfo where foodInfoStatus != 'd'");
?>
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="index.php">Welcome</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<h1>Welcome to F.I.R.G.Y</h1>
		<h2>(Food Intolerance Report Generator)</h2>
		<br>
		<a href="addeditentry.php"><button type="button" class="btn btn-primary">Add New Food Information Sheet</button></a>
		<br>
		<p>Below you can see all food intolerances that have been entered into the database. Click the food name to view and edit the entry.</p>
		<?php
		if ($message != "") {
			?><p class="<?php echo (($is_error)?'bg-danger':'bg-success') ?> firgy-message"><?php echo $message ?></p><?php
		} else echo "<br>";
		?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-cutlery"></i>
					<span>Food Intolerance InfoSheets</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding table-responsive">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="food-table">
					<thead>
						<tr>
							<th><label>ID</label></th>
							<th><label>Title</label></th>
							<th><label>Description</label></th>
							<th><label>Section</label></th>
							<th><label>Status</label></th>
						</tr>
					</thead>
					<tbody>
						<?php
						//returns each row as an array
						while($row = mysqli_fetch_array($r)){
							$desc = $row["foodDescrip"];
							if (strlen($desc) > 85) {
								$desc = substr($desc, 0, 100)."...";
							}

							//formatted for table presentation
							echo "<tr><td>".$row['foodInfoID']."</td>
								<td><a href='addeditentry.php?id=".$row['foodInfoID']."'>".$row['foodTitle']."</a></td>
								<td>".$desc."</td>
								<td>".$row['foodSection']."</td>
								<td>".strtoupper($row['foodInfoStatus'])."</td></tr>";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function initDataTable(){
	var asInitVals = [];
	var oTable = $('#food-table').dataTable( {
		"pageLength": 100,
		"aaSorting": [[ 0, "asc" ]],
		"sDom": "<'box-content'<'col-sm-6'f><'col-sm-6 text-right'l><'clearfix'>>rt<'box-content'<'col-sm-6'i><'col-sm-6 text-right'p><'clearfix'>>",
	});
}


// Run Datables plugin and create 3 variants of settings
function AllTables(){
	initDataTable();
}

$(document).ready(function() {
	// Load Datatables and run plugin on tables
	LoadDataTablesScripts(AllTables);
});
</script>
<?php
	require_once('footer.php');
?>