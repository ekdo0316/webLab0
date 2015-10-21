<!DOCTYPE html>
<html>
	<head>
		<title>Grade Store</title>
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2015/problems/pResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		
		
		<?php
		# Ex 4 : 
		# Check the existance of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		if (empty($_POST['Name']) || empty($_POST['ID']) || empty($_POST['Course']) || empty($_POST['Grade']) || empty($_POST['Credit']) || empty($_POST['cc'])) { ?>

		<!-- Ex 4 : Display the below error message : -->
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. <a href="gradestore.html">Try again?</a></p>

		<?php
		// Ex 5 : 
		// Check if the name is composed of alphabets, dash(-), ora single white space.
		} elseif (preg_match('/^[a-zA-Z]+(([-]|[\s]){1}[a-zA-Z]+$)*$/i', $_POST['Name']) == false) {  ?>

		<!-- Ex 5 : Display the below error message : -->
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. <a href="gradestore.html">Try again?</a></p>

		<?php
		# Ex 5 : 
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5. 
		} elseif (strlen($_POST['Credit']) != 16 || ($_POST['cc'] == "Visa" && $_POST['Credit'][0] != 4) || ($_POST['cc'] == "MasterCard" && $_POST['Credit'][0] != 5)) {
		?>

		<!-- Ex 5 : 
			Display the below error message : --> 
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. <a href = "gradestore.html"> Try again?</a></p>
		

		<?php
		# if all the validation and check are passed 
		} else {
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>
		
		<!-- Ex 2: display submitted data -->
		<ul> 
			<li>Name: <?= $_POST['Name'] ?></li>
			<li>ID: <?= $_POST['ID'] ?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course: <?= processCheckbox($Course) ?></li>
			<li>Grade: <?= $_POST['Grade'] ?></li>
			<li>Credit <?= $_POST['Credit'] ?></li>
		</ul>
		
		<!-- Ex 3 : 
			<p>Here are all the loosers who have submitted here:</p> -->
		<?php
			$filename = "loosers.txt";
			/* Ex 3: 
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */
			file_put_contents($filecredit, $Name.';'.$ID.';'.$Credit.';'.$cc."\n", FILE_APPEND);
		?>
		
		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->

		<pre><?= file_get_contents($filecredit) ?></pre>
		<?php
			}
		?>
		
		<?php
			/* Ex 2: 
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 * 
			 * The function checks whether the checkbox is selected or not and 
			 * collects all the selected checkboxes into a single string with comma seperation.
			 * For example, "cse326, cse603, cin870"
			 */
			function processCheckbox($names){
				$courses = '';
				foreach ($names as $course) {
					$courses = $courses.','.$course;
				}
				$courses = substr($courses, 1);
				return $courses; 
			}
		?>
		
	</body>
</html>
