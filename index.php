<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="" />
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

	<link href="photo.jpg" type="image/jpeg" rel="icon" />
	<title>Neeraj J. DeLima</title>

	<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
	<?php
		if (isset($_POST['name']) && isset($_POST['message'])) {

			if (isset($_POST['email']) && $_POST['email'] == '') {

				if (!isset($_SESSION['last_form_submission']) || (time() - $_SESSION['last_form_submission'] > 60)) {
					$_SESSION['last_form_submission'] = time();

					require_once 'login.php';
					$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

					if ($connection -> connect_error) {
                        			die($connection -> connect_error);
                			}

					$remote_addr = $_SERVER['REMOTE_ADDR'];
					$fwd_addr    = $_SERVER['HTTP_X_FORWARDED_FOR'];

					$query = "SELECT last_submit FROM rate_limit WHERE FWD_ADDR='$fwd_addr'";
					$result = $connection -> query($query);

					if (!result) {
						die($connection -> error);
					}

					$rows = $result -> num_rows;
					if ($rows != 0) {
						$result -> data_seek(0);
						$row = $result -> fetch_array(MYSQLI_ASSOC);
						$db_time = $row['last_submit'];
						//echo time() -$db_time;
						if (time() - $db_time < 60) {
							die("Post limit exceeded. Please wait at least 60 seconds.");
						} else {
							$query = "UPDATE rate_limit SET last_submit=".time()." WHERE FWD_ADDR='$fwd_addr'";
							$result = $connection -> query($query);
							if (!$result) die($connection->error);
						}
					} else {
						$query = "INSERT INTO rate_limit(FWD_ADDR, REMOTE_ADDR, last_submit) VALUES('$fwd_addr', '$remote_addr',".time().")";
						$result = $connection -> query($query);
						if (!$result) {
							die($connection->error);
						}
					}

					$name = sanitizeString($_POST['name']);
					$message = sanitizeString($_POST['message']);

					mail('neeraj.delima@gmail.com', $name, $message);
				} else {
			    		die("Post limit exceeded. Please wait at least 60 seconds");
				}
			}
			echo "<script>alert('Thanks! Will get back to you shortly.');</script>";
		}
	?>
	<div class="navigation">
		<ul>
			<li id="introduction-nav" class="active nav-button"><a href="#introduction">| Introduction</a></li>
			<li id="about-nav" class="nav-button"><a href="#about">| About Me</a></li>
			<li id="projects-nav" class="nav-button"><a href="#projects">| Projects</a></li>
			<li id="contact-nav" class="nav-button"><a href="#contact">| Contact Me</a></li>
		</ul>
	</div>
	
	<div class="main-container">
		<h1 id="introduction">Neeraj J. DeLima</h1>
		<div class="external-links">
			<a class="resume-link" href="./neeraj_delima_resume.pdf">resume</a>
				| <a class="github-link" href="https://github.com/njdelima">github</a>
		</div>
		<hr />
		<img src="photo.jpg" alt="Neeraj DeLima headshot" class="main-photo" />
		<p>
			Hello! My name's Neeraj DeLima and I'm a young, aspiring software developer trying to disrupt
			the status quo. I have a certain curiosity about most things in the universe, from astronomy to
			politics, and I learn a lot every day from the things that I do and the people around me. I'm 
			constantly trying to develop myself — intellectually, physically and socially — because I
			believe that is the only path to success.
		</p>
		<p>
			Thanks for visiting my website! Keep scrolling to check out the rest of it and feel free to shoot
			me a message below.
		</p>
		<!--<p>
			Hello! My name's Neeraj DeLima and I'm a young, aspiring software developer, entrepreneur and dreamer whose
			aim in life is to disrupt the status quo. I grew up in Mumbai, India but my experiences and good fortune have taken me
			far away, to Atlanta, GA where I'm currently based. I have a certain curiosity about most things in the universe, from
			astronomy to politics, which is something I cherish. I'm not one to turn down an opportunity to learn something new, no
			matter what it is.
		</p>
		<p>
			I'm enrolled at the Georgia Institute of Technology studying Computer Science, and expected to graduate in 2018.
			My hobbies include playing and following sports, learning Mandarin Chinese, teaching myself jazz piano and attempting
			to watch every film made between 1967 and 1975. I'm a huge fan of the Atlanta Hawks and Georgia Tech basketball.
		</p>
		<p>
			Thanks for visiting my website! Keep scrolling to check out the rest of it and shoot me a message below.
		</p> -->
		<hr id="introduction-end" />
		<h2 id="about">About Me</h2>
		<p class="about">
			I was born in Mumbai, India.
		</p>
		<p class="about">
			I'm currently based in Atlanta, GA.
		</p>
		<p class="about">
			I'm enrolled at the Georgia Institute of Technology studying Computer Science and graduating
			in 2018.
		</p>
		<p class="about">
			I work as an Software Developer Intern at
			<a target="_blank" href="http://www.singletracks.com/">
				Singletracks
			</a>
		</p>
		<p class="about">
			I have worked as an Software Engineer Co-op at
			<a target="_blank" href="http://www.codemettle.com/">
				CodeMettle, LLC.
			</a>
		</p>
		<p class="about">
			I work as a System Administrator for a number of websites and organizations, most notably
			<a target="_blank" href="https://furnex.ca">
				Furnex
			</a>
			in Toronto.
		</p>
		<p class="about">
 			I support the 
			<a target="_blank" href="http://espn.go.com/nba/team/_/name/atl/atlanta-hawks">
				Atlanta Hawks
			</a> and the 
			<a target="_blank" href="http://www.ramblinwreck.com">
				Georgia Tech Yellow Jackets.
			</a>
		</p>
		<p class="about">
			I'm obsessed with American New Wave cinema (1967 — 1982) and 
			<a target="_blank" href="https://en.wikipedia.org/wiki/New_Hollywood#List_of_notable_films">
				this
			</a>
			is the list of films I'm working on watching.
		</p>
		<p class="about">
			I'm learning Mandarin Chinese and aim to be fluent by the end of 2016.
		</p>
		<p class="about">
			I use
			<a target="_blank" href="http://positivesharing.com/2014/09/natural-and-synthetic-happiness-at-work/">
				synthetic happiness
			</a>
			to stay happy even when things don't go my way.<br />
		</p>

		<hr id="about-end" />
		<h2 id="projects">Projects</h2>
		<?php
			if (!($dh = opendir("projects"))) {
				echo "Error: can't open \".\"";
				exit();
			}
			$folders = array();
			while(($file = readdir($dh)) !== false) {
				// only directories
				if (is_dir("./projects/" . $file)) {
					// not . or ..
					if ($file[0] == '.') {
						continue;
					}
					$folders[] = $file;
				}
			}
			closedir($dh);
			sort($folders);

			foreach ($folders as $folder) {
				if (!($dh = opendir("./projects/" . $folder))) {
					echo "Error: can't open " . $folder;
					exit();
				}

				$files = array();

				while (($file = readdir($dh)) !== false) {
					if ($file[0] == '.') {
						continue;
					}
					$files[] = $file;
				}
				echo "<div class='project-thumbnail'>";
				echo "<img alt='project thumbnail' src='./projects/" . $folder . "/" . $files[0] . "' />";
				echo "<div class='thumbnail-overlay'>" . $folder . "</div>";
				echo "</div>";

				echo "<div class='project-expansion'>";
				echo file_get_contents("./projects/" . $folder . "/description.txt");

				echo "</div>";
		 		/*
				while (($file = readdir($dh)) !== false) {
					if ($file[0] == '.') {
						continue;
					}
					if ($file === "description.txt") {
						echo "<p class='project-description'>" . file_get_contents("./projects/" . $folder . "/" . $file) . "</p>";
					}
				}*/
			}
		?>
		<hr id="projects-end" />
		<h2 id="contact">Contact Me</h2>
		<form action="index.php" method="post">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" id="name" value="" name="name" autocomplete="off" />
			</div>
			<div class="form-group antispam">
				<label for="email">Please leave this empty!:</label>
				<input type="text" name="email" />
			</div>
			<div class="form-group">
				<label for="message">Message:</label>
				<textarea name="message" rows="5" id="message" value=""
					placeholder="Please leave your contact details so I can get back to you!"></textarea>
			</div>
			<input type="submit" value="Send" />
		</form>
		<?php
			function sanitizeString($var) {
				$var = stripslashes($var);
				$var = htmlentities($var);
				$var = strip_tags($var);
				return $var;
			}
		?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(window).resize(function() {
				console.log("Current window width = " + $(window).width());
			});
			$("#introduction-nav").click(function() {
				$("html, body").animate({
					scrollTop: $("#introduction").offset().top
				}, 1000);
			});
			$("#about-nav").click(function() {
				$("html, body").animate({
					scrollTop: $("#about").offset().top
				}, 1000);
			});
			$("#projects-nav").click(function() {
				$("html, body").animate({
					scrollTop: $("#projects").offset().top
				}, 1000);
			});
			$("#contact-nav").click(function() {
				$("html, body").animate({
					scrollTop: $("#contact").offset().top
				}, 1000);

			});
			$(".nav-button").click(function() {
				$(".nav-button").removeClass("active");
				$(this).addClass("active");
			});

			$(".nav-button").mouseenter(function() {
				$(this).addClass("semi-active");
			}).mouseleave(function() {
				$(this).removeClass("semi-active");
			});

			var introBottom = $("#introduction-end").offset().top;
			var aboutBottom = $("#about-end").offset().top;
			var projectsBottom = $("#projects-end").offset().top;

			$(window).scroll(function() {
				var mid = Math.round($(window).scrollTop() + $(window).height() / 2);
				if ($(window).scrollTop() + $(window).height() == $(document).height()) {
					$(".nav-button").removeClass("active");
					$("#contact-nav").addClass("active");
				} else if (mid < introBottom) {
					$(".nav-button").removeClass("active");
					$("#introduction-nav").addClass("active");
				} else if (mid > introBottom && mid < aboutBottom) {
					$(".nav-button").removeClass("active");
					$("#about-nav").addClass("active");
				} else if (mid > aboutBottom && mid < projectsBottom) {
					$(".nav-button").removeClass("active");
					$("#projects-nav").addClass("active");
				} else {
					$(".nav-button").removeClass("active");
					$("#contact-nav").addClass("active");
				}

			});
			$(".project-thumbnail").mouseenter(function() {
				$(this).children(".thumbnail-overlay").fadeIn(200);
			}).mouseleave(function() {
				$(this).children(".thumbnail-overlay").fadeOut(200);
			});

			function collapse_project(project) {
				var width = $(".main-container").width();

				if (project.hasClass("expanded")) {
					var expansionText = find_last_of_row(project).nextAll(".project-expansion").eq(0).detach();

					project.after(expansionText);

					project.removeClass("expanded");
					project.nextAll(".project-expansion").eq(0).removeClass("expanded");
				}
			}

			function find_last_of_row(project) {
		//		alert("project = " + project.html());
				if (project.nextAll(".project-thumbnail").length == 0) {
		//			alert("Last thumbnail of section");
					return project;
				}

				var width = $(".main-container").width();

				if (width >= 639) {
		//			alert("width > 639");
					if (project.prevAll(".project-thumbnail").length == 0) {
		//				alert("First thumbnail of section");
						return project.nextAll(".project-thumbnail").eq(1);
					} else if (project.prevAll(".project-thumbnail").length == 1) {
						return project.nextAll(".project-thumbnail").eq(0);
					}

					var prevTop = project.prevAll(".project-thumbnail").eq(0).offset().top;
					var nextTop = project.nextAll(".project-thumbnail").eq(0).offset().top;
					var curTop = project.offset().top;

		//			alert("prevTop = " + prevTop);
		//			alert("nextTop = " + nextTop);
		//			alert("curTop = " + curTop);

					if (curTop === prevTop && curTop === nextTop) {
		//				alert("ALL EQUAL");
					}

					if (project.offset().top === project.prevAll(".project-thumbnail").eq(0).offset().top &&
						project.offset().top === project.prevAll(".project-thumbnail").eq(1).offset().top) {

		//				alert("Last thumbnail of row");
					
						return project;
					} else if (curTop === prevTop && curTop === nextTop) {
					// else if (project.offset().top === project.prevAll(".project-thumbnail").eq(0).offset().top &&
							//   project.offset().top === project.nextAll(".project-thumbnail").eq(0).offset().top) {

		//				alert("Middle thumbnail of row");
						return project.nextAll(".project-thumbnail").eq(0);
					} else {
		//				alert("First thumbnail of row");
						return project.nextAll(".project-thumbnail").eq(1);
					}
				} else if (width >= 417 && width <= 638) {
					if (project.prevAll(".project-thumbnail").length == 0) {
						return project.nextAll(".project-thumbnail").eq(0);
					}
					if (project.prevAll(".project-thumbnail").eq(0).offset().top === project.offset().top) {
						return project;
					} else {
						return project.nextAll(".project-thumbnail").eq(0);
					}
				} else if (width <= 416) {
					return project;
				}				
			}

			$(".project-thumbnail").click(function() {
		//		alert("Started click function.");

				if ($(this).hasClass("expanded")) {

		//			alert("$(this) already has expanded class");

					collapse_project($(this));
				} else {
		//			alert("$(this) doesn't have expanded class... expanding...");

					collapse_project($(".project-thumbnail.expanded"));

		//			alert("Finished collapsing other thumbnails.");

					var expansionText = $(this).next(".project-expansion").detach();

		//			alert("Detached expansionText = " + expansionText.html());
					


					find_last_of_row($(this)).after(expansionText);

		//			alert("Found last of row and inserted expansionText");

					$(this).toggleClass("expanded");
		//			alert("toggle class for thumbnail");
					expansionText.toggleClass("expanded");

		//			alert("toggle class for expansion");
				}
			});


		});
	</script>
</body>
