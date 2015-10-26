<?php
require_once ("includes/global.php");
if(!isset($_SESSION)) {
	session_start(); 
}
//echo 'the Team ID is ', $_SESSION ['teamid'];
//echo '<br>the status is ', $_SESSION ['status'];
if (! isset ( $_SESSION ['teamid'] ))
	header ( "Location: login.php" ) && die ();
elseif ($_SESSION ['status'] == 2)
	header ( "Location: question.php" ) && die ();
elseif ($_SESSION ['status'] == 3)
	header ( "Location: done.php" ) && die ();
metadetails ();
?>
</head>
<body>
	<div id="main-content" class="box center">
  		<?php
				if ($_SESSION ['language'] == 1 || $_SESSION ['language'] == 2) {
					if ($_SESSION ['stage'] == '0'||$_SESSION ['stage'] == '1a' || $_SESSION ['stage'] == '1b') {
						if ($_SESSION ['language'] == 1) {
							echo ('<h2>printf("Hey C Coders!");</h2><br/>');
							$_SESSION ['stage'] = '1a';
						} else {
							echo ('<h2>cout<<"Howdy C++ Aficionados!";</h2><br/>');
							$_SESSION ['stage'] = '1b';
						}
						echo '
							<ul id="Rules">
							<li>The first round will be of 30 minutes.</li>
							<li>You will be given 4 questions with syntax errors.</li>
							<li>Your answer should not contain any <strong> errors or warnings </strong> when compiled with gcc/g++ compiler.</li>
							<li>Use of Compilers is prohibited.</li>
							<li>Marks will be provided based on the time of completion and correctness of solution.</li>
							<li>All Answers will be locked and cannot be altered after 30 minutes.</li>
							<li><strong>Do NOT refresh the page or hit the Back button at any time.</strong></li>
							<li>Any act of dishonesty will result in immediate disqualification.</li>
							<li>If any doubts, please ask the event managers before proceeding.</li>
							<li>The Decision of the Judges is final & beyond reproach.</li>
							</ul>';
						$queryString = "SELECT * FROM stages WHERE stageid = '{$_SESSION['stage']}' AND stageStart = 1;";
						$result = $mysqli->query ( $queryString );
						if ($result->num_rows) {
							echo "<button class=\"btn btn-large btn-primary centerh\" onclick=\"window.location.href = 'starttest.php'\" style=\"width: 150px;\" id=\"btn-start\">Lets Start!</button><br>";
						} else {
							echo "<button class=\"btn btn-large btn-primary centerh\" onclick=\"window.location.href = 'starttest.php'\" style=\"width: 150px;\" id=\"btn-start\" disabled>Lets Start!</button><br>";
						}
					} elseif ($_SESSION ['stage'] == '2a' || $_SESSION ['stage'] == '2b') {
						echo '<h2>Welcome to Stage 2!!</h2><br/>';
						echo '
							<ul id="Rules">
							<li>The second round will be an offline round of 30 minutes.</li>
							<li>You will be given 3 questions with logical errors.</li>
							<li>Use of Compilers is prohibited except the inline one provided.</li>
							<li>Marks will be provided based on the time of completion and correctness of solution.</li>
							<li>All Answers will be locked and cannot be altered after 30 minutes.</li>
							<li><strong>Do NOT refresh the page or hit the Back button.</strong></li>
							<li>Any act of dishonesty will result in immediate disqualification.</li>
							<li>The Decision of the Judges is final & beyond reproach.</li>
							</ul>';
						$queryString = "SELECT * FROM stages WHERE stageid = '{$_SESSION['stage']}' AND stageStart = 1;";
						$result = $mysqli->query ( $queryString );
						if ($result->num_rows) {
							echo "<button class=\"btn btn-large btn-primary centerh\" onclick=\"window.location.href = 'starttest.php'\" style=\"width: 150px;\" id=\"btn-start\">Lets Start!</button><br>";
						} else {
							echo "<button class=\"btn btn-large btn-primary centerh\" onclick=\"window.location.href = 'starttest.php'\" style=\"width: 150px;\" id=\"btn-start\" disabled>Lets Start!</button><br>";
						}
					} elseif ($_SESSION ['stage'] == '3a' || $_SESSION ['stage'] == '3b') {
						echo '<h2>Welcome to Stage 3!!</h2><br/>';
						echo '
							<ul id="Rules">
							<li>The Third round will be an offline round of 1 hour.</li>
							<li>You will be given 2 questions with no errors.</li>
							<li>Your task is to analyze the code & explain the working of the code.</li>
							<li>Marks will be provided based on the time of completion and correctness of explanation.</li>
							<li>All Answers will be locked and cannot be altered after 1 hour.</li>
							<li><strong>Do NOT refresh the page or hit the Back button.</strong></li>
							<li>Any act of dishonesty will result in immediate disqualification.</li>
							<li>The Decision of the Judges is final & beyond reproach.</li>
							</ul>';
						$queryString = "SELECT * FROM stages WHERE stageid = '{$_SESSION['stage']}' AND stageStart = 1;";
						$result = $mysqli->query ( $queryString );
						if ($result->num_rows) {
							echo "<button class=\"btn btn-large btn-primary centerh\" onclick=\"window.location.href = 'starttest.php'\" style=\"width: 150px;\" id=\"btn-start\">Lets Start!</button><br>";
						} else {
							echo "<button class=\"btn btn-large btn-primary centerh\" onclick=\"window.location.href = 'starttest.php'\" style=\"width: 150px;\" id=\"btn-start\" disabled>Lets Start!</button><br>";
						}
					}
				} else {
					?>
				<h2>Welcome to Debugger !!</h2>
		<br> <span style="font-size: 1.5em"> Are you ready to start ? Select
			your language of Choice and go through the Rules &#38; Instructions.</span>
		<div id="clang" onclick="AjaxGet('lang.php?lang=c', 'main-content');"></div>
		<div id="cpplang"
			onclick="AjaxGet('lang.php?lang=cpp', 'main-content');"></div>
	</div>

  	<?php
				}
				AjaxGet ();
				?>
    <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
