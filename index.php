<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="" />
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
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
			I work as an Associate Software Engineer at
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
				echo $file . "\n";
			}
		?>
		<p> Lorem ipsum</p>
		<p> Dolor sit amet</p>
		<p> Lorem ipsum</p>
		<p> Dolor sit amet</p>
		<p> Lorem ipsum</p>
		<p> Dolor sit amet</p>
		<p> Lorem ipsum</p>
		<p> Dolor sit amet</p>
		<p> Lorem ipsum</p>
		<p> Dolor sit amet</p>
		<p> Lorem ipsum</p>
		<p> Dolor sit amet</p>
		<p> Lorem ipsum</p>
		<p> Dolor sit amet</p>
		<hr id="projects-end" />
		<h2 id="contact">Contact Me</h2>
		<p> Lorem ipsum</p>
		<p> Dolor sit amet</p><p> Lorem ipsum</p>
		<p> Dolor sit amet</p>
		<p> Lorem ipsum</p>
		<p> Dolor sit amet</p>
		<p> Lorem ipsum</p>
		<p> Dolor sit amet</p>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
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
			});
			$(".nav-button").mouseleave(function() {
				$(this).removeClass("semi-active");
			});

			var introBottom = $("#introduction-end").offset().top;
			var aboutBottom = $("#about-end").offset().top;
			var projectsBottom = $("#projects-end").offset().top;

			$(window).scroll(function() {
				var mid = Math.round($(window).scrollTop() + $(window).height() / 2);
				if (mid < introBottom) {
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
		});
	</script>
</body>