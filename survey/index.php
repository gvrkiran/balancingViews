<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="description" content="Balancing Opposing Views : Project to connect people on Twitter with content which is opposite to what they believe.">

    <link rel="stylesheet" type="text/css" media="screen" href="stylesheets/stylesheet.css">

    <title>Balancing Opposing Views</title>
  </head>

  <body>

    <!-- HEADER -->
    <div id="header_wrap" class="outer">
        <header class="inner">

          <h1 id="project_title">Balancing Opposing Views</h1>
          <h2 id="project_tagline">Connecting people on Twitter with content which challenges their viewpoint.</h2>

        </header>
    </div>

    <!-- MAIN CONTENT -->
    <div id="main_content_wrap" class="outer">
      <section id="main_content" class="inner">
<!--h3>
<a id="creating-pages-manually" class="anchor" href="#creating-pages-manually" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>Survey</h3-->
<h2>Survey</h2>

<p>Thank you for visiting the survey page. You can learn more about the project <a href="#about">here</a>.</p>
<p>Below are two recommended links, based on your twitter activity. Please click on the two links and answer the questions that follow.
</p>
<hr>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $question1Err = $question2Err = $websiteErr = "";
$question1 = $question2 = $gender = $comment = $website = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["question1"])) {
    $question1Err = "This choice is required";
  } else {
    $question1 = test_input($_POST["question1"]);
  }

  if (empty($_POST["question2"])) {
    $question2Err = "This choice is required";
  } else {
    $question2 = test_input($_POST["question2"]);
  }

	$servername = "localhost";
	$username = "newuser";
	$password = "password";
	$dbname = "balancingviews";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$timestamp = time();
	$filename = __FILE__;

	$sql = "INSERT INTO surveydata (filename, question1, question2, comments, timestamp) VALUES ('$filename','$question1', '$question2', '$comment', '$timestamp')";

	// $conn->query($sql);

	if($question1 !== '' and $question2 !== '') {
		if ($conn->query($sql) === TRUE) { // and $question1 !== '' and $question2 !== '') {
	  		echo "<h3 style='color:red'>Thank you for your time! Your responses have been recorded.</h3>";
			$conn->close();
//		header("Location: thankyou.php");
		} else {
	//	    echo "Error: " . $sql . "<br>" . $conn->error;
	//		echo "ERROR. "
		}
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<section id="urls">
    <div id="one">
    	<h5>Recommendation1</h5>
    	<p><a href="http://www.igberetvnews.com/264682">BREAKING!!! Onitsha Agog as Pro Trump Celebration Breaks Out (Happening now) ?~@~S IgbereTV News</a></p>
    </div>
    <div id="two">
    	<h5>Recommendation2</h5>
    	<p><a href="http://www.igberetvnews.com/264682">BREAKING!!! Onitsha Agog as Pro Trump Celebration Breaks Out (Happening now) ?~@~S IgbereTV News</a></p>
    </div>
</section>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 Do you find Recommendation1 helpful?:
  <input type="radio" name="question1" <?php if (isset($question1) && $question1=="yes") echo "checked";?> value="yes">Yes
  <input type="radio" name="question1" <?php if (isset($question1) && $question1=="no") echo "checked";?> value="no">No
  <span class="error">* <?php echo $question1Err;?></span>

  <br><br>
 Do you find Recommendation2 helpful?:
  <input type="radio" name="question2" <?php if (isset($question2) && $question2=="yes") echo "checked";?> value="yes">Yes
  <input type="radio" name="question2" <?php if (isset($question2) && $question2=="no") echo "checked";?> value="no">No
  <span class="error">* <?php echo $question2Err;?></span>

  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
<p><span class="error">* required fields.</span></p>

<hr>

<h3>
<a name="about" id="connecting-people-with-opposing-views" class="anchor" href="#connecting-people-with-opposing-views" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>About the project</h3>

<p>
In this project, we try to connect people with opposing views on Twitter. 
The way we do this is to suggest content we automatically identify as being of the 'opposite' side.
Our main aim is to achieve an open world where everyone is willing to listen and communicate ideas with the other side.
</p>

<p>
For more details, about the project, visit the project <a href="https://gvrkiran.github.io/balancingViews">website</a>. If you have any questions/comments, please reach out to Kiran Garimella (<a href="mailto:kiran.garimella@aalto.fi">email</a>).
</p>

<hr>

<h3>
<a id="support-or-contact" class="anchor" href="#support-or-contact" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>Data Collection Policy</h3>

<p>
All data collected in this project will be used solely for aggregate analyis. No individual information is shared or disseminated. All data will be destroyed after the completion of the project.
All recommendations are machine generated. We do not hand curate links for any specific account.
The project is Open source and our code is available on request.
</p>
     </section>
    </div>

    <!-- FOOTER  -->
    <div id="footer_wrap" class="outer">
      <footer class="inner">
        <p class="copyright">Balancing Opposing Views maintained by <a href="https://github.com/gvrkiran">gvrkiran</a></p>
      </footer>
    </div>

    

  </body>
</html>
