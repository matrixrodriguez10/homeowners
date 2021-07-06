<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <title>SAN ANTONIO VALLEY 2 SUBDIVISION</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style_home.css" rel="stylesheet" type="text/css"> 
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css"> 
    <link href="css/animate.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header id="header_wrapper">
    <div class="container">
       <div class="header_box">
           <div class="logo">San Antonio Valley 2</div>
	      <nav class="navbar navbar-inverse" role="navigation">
          <div class="navbar-header">
             <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
            </button>
          </div>
	        <div id="main-nav" class="collapse navbar-collapse navStyle">
		      	<ul class="nav navbar-nav" id="mainNav">
		    	     <li><a href="index.php" class="scroll-link">Home</a></li>
		    	     <li><a href="about us.php" class="scroll-link">About</a></li>
		    	     <li><a href="announcement.php" class="scroll-link">Announcement </a></li>
		    	     <li class="active"><a href="FAQs.php" class="scroll-link">FAQs</a></li>
               <li><a href="officers.php" class="scroll-link">Officers</a></li>
		    	     <li><a href="login.php" class="scroll-link">Login</a></li>
		    	 </ul>
          </div>
	      </nav>
      </div>
    </div>
</header>

<div class="jumbotron jum" style=" background-image: url(img/small.jpg)"> 
  <div class="text"><h4>San Antonio Valley 2 Subdivision Homeowners Association</h4> FAQs </div>
</div>

<div class="con_a">
    <button class="accordion">Q: Why choose San Antonio Valley 2 Subdivision?</button>
    <div class="panel">
      <p>We are a neighborhood located in Paranaque City with lots to offer, whether you are a present homeowner or looking to join our community. San Antonio Valley 2 is the perfect spot to call home if you're seeking for a safe, calm, and attractive neighborhood. We've established ourselves as a solid neighborhood for families looking to settle down.<br><br> We've created a place where everyone can feel supported and connected to one another, thanks to a foundation founded on a strong feeling of community. The community offers year-round opportunities to socialize, and the friendships formed here last a lifetime. Our community has chosen this path in order for its members to have sole influence over the community's future. We are pleased to have you as a member of our community. We are excited to welcome you to our San Antonio Valley 2 Subdivision as a homeowner.</p>
    </div>

    <button class="accordion">Q: How San Antonio Valley 2 Subdivision manage?</button>
    <div class="panel">
      <p>Our neighborhood is well-established, with a Home Owners Association in place to provide a high standard of living for its inhabitants. The management board of directors oversees the operation of the HOA. The Association's major goal is to service the homeowners and keep the common areas in good working condition. The ordinances also aim to encourage community unity through social events. New ideas and volunteerism are both welcome!  </p>
    </div>


    <button class="accordion">Q: What type of things can homeowners association regulate?</button>
    <div class="panel">
      <p>A community association is in charge of collecting and managing assessment fees, as well as enforcing deed restrictions and maintaining common area property. Elected officials must manage the property according to best practices and manage the funds they generate.Elected officials must strike a balance between the needs/goals of homeowners and the needs/goals of individual members. The amount of the fees and the services provided by the organization are decided by the Board and the members.</p>
    </div>


    <button class="accordion">Q: Why do I pay monthly dues?</button>
    <div class="panel">
      <p>Fees that is being collected help to fund the community's budget and pay for things like street-sweepers,  common area landscape maintenance, and repair, . Assessments also cover any community upgrades as well as the replacement of  damaged common space items. The collected fees also pay for the association's administration and administrative costs, such as managing the community's financial affairs, managing the community's legal issues, and enforcing the rules through site inspections and notices.</p>
    </div>

    <button class="accordion">Q: How can I know that the fees collected are being utilized?</button>
    <div class="panel">
      <p>This information is available from our community association administrator. Our  community has an annual members meeting where the board of directors meets with the homeowners to discuss the community's concerns, including the financial components of the association.</p>
    </div>

</div>
<footer>
    <div class="footer_bottom"><span>San Antonio Valley 2 Subdivision<br>Contact Us: 091234435 </span> 
          <ul class="social">
            <li><a href="javascript:void(0)" class="fa fa-twitter"></a></li>
            <li><a href="javascript:void(0)" class="fa fa-facebook"></a></li>
            <li><a href="javascript:void(0)" class="fa fa-instagram"></a></li>
            <li><a href="javascript:void(0)" class="fa fa-google-plus"></a></li>
          </ul>
    </div>
</footer>

  
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="js/jquery.nav.js"></script> 
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/wow.js"></script> 
<script type="text/javascript" src="js/custom.js"></script>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active_a");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
</body>
</html>