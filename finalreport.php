
<?php
require_once('core.php');

$eliminateList = "";
$detailedItems = "";

// collecting information and numbering the list for display
function getFoodInfoContent ($id) {
	global $dbc, $eliminateList, $detailedItems;
	$id = (int)$id;
	if ($id > 0) {
		$result = mysqli_query($dbc, "SELECT foodTitle, foodDescrip FROM foodinfo WHERE foodInfoID=$id");
		while ($row = mysqli_fetch_assoc($result)) {
			$title = $row['foodTitle'];
			$desc = $row['foodDescrip'];

			$eliminateList .= sprintf("<li>%s</li>",$title);

			$detailedItems .= sprintf("<h3>%s</h3>", $title);
			$detailedItems .= sprintf("<p>%s</p>", $desc);
		}
	}
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$name = trim($_POST['patientname']);

	$hasSect1 = false;
	$hasSect3 = false;
	foreach ($_POST as $key => $value) {
		// work with sect1food items
		if (stripos($key, "sect1food") !== false) {
			if ($value != "") $hasSect1 = true;
			getFoodInfoContent($value);
		}

		// work with sect2food items
		if (stripos($key, "sect2food") !== false) {
			getFoodInfoContent($value);
		}

		// work with sect3food items
		if (stripos($key, "sect3food") !== false) {
			if ($value != "") $hasSect3 = true;
			getFoodInfoContent($value);
		}

		// work with sect4food items
		if (stripos($key, "sect4food") !== false) {
			getFoodInfoContent($value);
		}
	}


	//check that all values have been input before connecting
	if(!empty($name) && $hasSect1 && $hasSect3){
		?>
		<!DOCTYPE html>
			<html lang="en">
				<head>
					<meta charset="utf-8">
					<title>Food Intolerance Report For <?php echo $name; ?></title>
					<meta name="description" content="description">
					<meta name="author" content="Evgeniya">
					<meta name="keyword" content="keywords">
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<link href="theme/devoops/plugins/bootstrap/bootstrap.css" rel="stylesheet">
					<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
					<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
					<link href="theme/devoops/css/reportstyle.css" rel="stylesheet">
					<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
					<!--[if lt IE 9]>
							<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
							<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
					<![endif]-->
				</head>
			<body style='-webkit-print-color-adjust:exact;'>
				<div id="intro">
					<img src="<?php echo THEME_URL; ?>/img/sun-logo.png" alt="Dr. Lara sun logo" class="logo">
					<h2 class="title">Natural Health Clinic</h2>
					<p class="title"><b style="font-size: 20px;padding-bottom: 5px;display: block;">Dr. Lara Plecher, ND</b>Phone: 509-885-8825 &nbsp; &nbsp; Fax: 509-423-7917<br>1321 N Arbor Terrace, East Wenatchee, WA 98802</p>
					<br />
					<h1 class="title">Naturopathic Food Intolerance Evaluation</h1>
					<br />
					<h3>Getting Started</h3>
					<p>Read all of the information in this Food Intolerance Evaluation, over and over again.  For the best results, read it each day, for a week, then at least once a week, for a month. For parents, know you child’s Food Intolerances, inside and out, so that you can effectively communicate their needs to caregivers.<br /><br />
					<strong>WARNING:</strong> If you have a known or suspected anaphylactic response to a food or foods.  Avoid foods that produce an anaphylactic response (even if what you react to does not appear on your Food Intolerance Evaluation).  Always carry an Epi Pen, with you, at all times.  If you suspect anaphylaxis (symptoms include: trouble breathing, hives, tightness of throat, nausea dizziness, low blood pressure, etc.) please consult your physician immediately.  First reactions may be mild; future reactions may be more severe.
					</p><br />
					<h3>Make a List</h3>
					<p>It can be shocking to find out that foods we have been enjoying our whole lives have been causing harm and would best be avoided.  A great way to get started is to write a list of favorite foods, eaten on a regular basis (Foods identified as Intolerances).  Then make a list of possible replacements.  For Example, if peanut is a food intolerance, and peanut butter was eaten, on a regular basis…almond butter can be a go-to replacement food…and you can try the other nut butters (cashew butter, sunflower seed butter, macadamia nut butter, walnut butter, pistachio butter, etc.).  Similarly, if potato is a food intolerance and potato chips are something you used to eat, then you can replace them with corn chips, almond or rice crackers, etc.  Once you find replacement foods that you love, stock them in your kitchen so that you have them on the ready.<br /><br />
					You can find great recipes to get started at www.MyDrLara.com, we regularly update the recipe section.
					</p> <br />
					<h3>Remove all Food Intolerance Foods</h3>
					<p>Get rid of the foods that are causing the problems!  In order to find out what benefits will come of following your Food Intolerance Evaluation, as soon as possible, remove all identified foods 100%.  Read all labels…it is surprising how many “food intolerances” you may find in a single processed food.  Go through your kitchen and remove all of the identified foods…or label the foods that do not work for you, so that you will not accidentally consume them.  In the beginning, eat at home as much as possible, so you can control, as best as possible what you are actually eating.
					</p><br />
					<h3>Heal Your Gut</h3>
					<p>The first step is removing the foods identified on the Food Intolerance Evaluation.  The second step is to heal your gut.<br /><br />
					One of the best ways to get probiotics and prebiotics every day is to eat them as food. Eat probiotics and prebiotics every day and at every meal when possible.<br /><br />
					Probiotics are live microorganisms that are good for our health.  Our bodies are full of bacteria: the good, the bad and the ugly.  When we consume probiotics our goal is to increase the good, helpful bacteria in our guts.  When we increase the good bacteria, they can outnumber the bad bacteria.  Foods that contain probiotics: Fermented Vegetables, Sauerkraut, Kombucha Tea, Yogurt, Kefir, Dark Chocolate, Microalgae, Miso Soup, Pickles, Tempeh, Kim chi, cultured condiments, etc.  Try the probiotic foods that work with your Food Intolerance Evaluation.  Consume the ones you love.  If you don’t like the taste of any of the probiotics that work with your Food Intolerance Evaluation, you can still benefit from probiotics by taking probiotic capsules.  Visit www.MyDrLara.com to get a deeper understanding of what type of Probiotic Capsules work best for your needs.<br /><br />
					Prebiotics are the food that the good bacteria want to eat.  So, another way to increase the amount of good bacteria in our guts…is to eat the foods that the good bacteria want to eat…Prebiotics.  Best Prebiotics include raw garlic, raw and cooked onion, raw asparagus, Microalgae, acacia gum (gum Arabic), raw chicory root, raw Jerusalem artichoke, raw dandelion greens, raw leeks, etc. In general when you think Prebiotics... think Vegetables!<br /><br />
					Probiotics and Prebiotics work together, the living bacteria and the food source they need to thrive (prebiotics), producing synergy.  Together Probiotics and Prebiotics benefit one another, in such a manner, that they can do more together than either one can do by itself.  Find exciting new combinations of Probiotics and Prebiotics that taste great together at www.MyDrLara.com Enjoy!
					</p><br />
					<h3>Great Choices for the Rest of Your Life</h3>
					<p>Make Great Choices for the Rest of Your life…for the Best of Your Life.  Something as simple as eating Probiotics and Prebiotics can change the lives, of the people, you love.  Did you know that consuming probiotics can reduce the risk of ADHD and Autism?  <br /><br />
					In the United States, there are more than 6 million children with an ADHD diagnosis.  Some estimates confirm that 1 in 40 male children will be diagnosed on the Autism spectrum.  A recent study in the journal Pediatric Research evaluated 75 infants in a Randomized, Placebo controlled study.  Half of the children were given Probiotics and half of the children received a Placebo.  The study followed the children for 13 years.<br /><br />
					17.1 % of the children in the Placebo group were diagnosed with ADHD or Autism Spectrum.  None of the children, in the group, that received Probiotics were diagnosed with ADHD or Autism.  This is a ground breaking study.  I wish for all the children, of the world, to have access to Probiotics, Prebiotics and everything else that creates Healthy, Happy, Inspiring Lives.
					</p><br />
					<p class="closing">
						Blessings to one and all!
					</p>
				</div>
				<div class="page-break"></div>

				<div id="food-list">
					<h2>These foods were tested for this evaluation:</h2>
					<table id="food-list-graphic">
						<tr>
							<th width='180'>Foods</th>
							<th width='32'>Avoid</th>
							<th width='32'>Enjoy</th>
						</tr>
						<!-- creating a graphic to display all foods tested, and if they were on the eliminate list  -->
						<?php
				          $result = mysqli_query($dbc, "SELECT * FROM foodinfo WHERE foodInfoStatus = 'a' ORDER BY foodInfoID") or die(mysql_error());
				          while ($row = mysqli_fetch_array($result)) {
				          	if (strpos($eliminateList, $row['foodTitle'])) {
				              echo "<tr style='height:32px'><td style='color:darkred;'>".$row['foodTitle']."</td>";
		            				echo "<td class='avoid' style='width:105;height:32px;padding:0;margin:0;-webkit-print-color-adjust:exact;'><img src='". THEME_URL ."/img/redbox.png' alt='avoid' width='100%'></td>";
		            				echo "<td> &nbsp; </td></tr>";
		            			} else {
		            				echo "<tr><td>".$row['foodTitle']."</td>";
		            				echo "<td> &nbsp; </td>";
		            				echo "<td class='enjoy' style='width:105;height:32px;padding:0;margin:0;-webkit-print-color-adjust:exact;'><img src='". THEME_URL ."/img/greenbox.png' alt='enjoy' width='100%'></td>";
		            			}
				          } ?>
					</table>
				</div>
				<div class="page-break"></div>

				<div id="food-details">
					<h2><?php echo $name; ?>, it is my recommendation that you eliminate:</h2>
					<ul>
						<?php echo $eliminateList; ?>
					</ul>
					<p>Please see below for more detailed information on each of these.</p><br />

					<?php echo $detailedItems; ?>
				</div>




			</body>
			</html>
	<?php
	} else {
		echo "<p>Please enter a patient name and at least two section directives.</p>";
	}
}
?>