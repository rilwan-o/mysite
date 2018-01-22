<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>rilwan's website</title>
<link rel="stylesheet" href="http://localhost/mysite/style/main.css" >
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
 
<script type="text/javascript">google.load("jquery", "1.3.2");</script>
 
<script type="text/javascript">
 for(var i=0;i<100;i++){
	$(document).ready(function(){
 
		$("#side_news").fadeOut("slow");	
	$("#side_news").fadeIn("slow");
		$("#side_news").fadeOut("slow");	
	$("#side_news").fadeIn("slow");
		$("#side_news").fadeOut("slow");	
	$("#side_news").fadeIn("slow");
	});
 }
function validateForm(){
 var name=document.forms[0]["mname"].value;
 if(!(name.match(/^[A-Za-z ]+$/))){
 alert("use only letters");
 return false;
 }
  var email=document.forms[0]["memail"].value;
 if(!(email.match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))){
 alert("invalid email format");
 return false;
 }
 }
</script>
</head>
<body>
<div id="big_wrapper">
	<header id="top_header">
		<h1>FlicksBeat</h1>
	<img src="http://localhost/mysite/images/slider99.jpg" alt="dj image" width="1000" >	
	</header>
	<nav id="top_menu">
		<ul>
			<li><a href="http://localhost/mysite/">Home</a></li>
			<li><a href="http://localhost/mysite/index.php/mainController/beatscategory">Categories</a></li>
			<li><a href="http://localhost/mysite/index.php/mainController/aboutUs">About</a></li>
			<li><a href="http://localhost/mysite/index.php/mainController/contactUs">Contact Us</a></li>
		</ul>
	</nav>
	
	
	<div id="new_div">
	<section id="main_section">
	<article>
	<?php
	echo "<div id='error'>".validation_errors()."</div>";
		$this->load->helper("form");
	
	  $datas=array(
    "onsubmit"=>"return validateForm()"
    );
	
	echo form_open("http://localhost/mysite/index.php/mainController/sendMail",$datas);
	echo "Name*<br/>";
	$datas=array(
	 "name"=>"mname",
	 "id"=>"mname",
	 "value"=>""
	);
	echo form_input($datas)."<br/>";
	echo "email*<br/>";
	$datas=array(
	 "name"=>"memail",
	 "id"=>"memail",
	 "value"=>""
	);
	echo form_input($datas)."<br/>";
	echo "Message<br/>";
	$datas=array(
	 "name"=>"mcomments",
	 "id"=>"mcomments_area",
	 "value"=>""
	);
	echo form_textarea($datas)."<br/>";
	$datas=array(
	 "name"=>"msubmit",
	 "id"=>"mcomment_button",
	 "value"=>"Send Message" 
	);
	echo form_submit($datas);
	
	echo form_close();
	echo "<hr/>";
	echo "<p>".$messages."</p>";
	?>
	
    
	
	</article>
	
	</section>
	
	
	<div id="side_news">
		<h4>News</h4>
		rilwanas new laptop
	</div>
	</div>
	
	
	<footer id="the_footer">
	Copyright rea2safe (c)2015
	<footer>
	</div>
</body>
</html>