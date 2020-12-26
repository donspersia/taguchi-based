<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdComparator.com - Test Results</title>
<link rel="shortcut icon" href="images/logo-midnight.png" type="image/png">

<link href="css/RussianRailGPro.css" rel="stylesheet" type="text/css" />
<link href="css/Raleway-Light.css" rel="stylesheet" type="text/css" />
<link href="css/Raleway-Regular.css" rel="stylesheet" type="text/css" />
<link href="css/Raleway-Medium.css" rel="stylesheet" type="text/css" />
<link href="css/Raleway-Bold.css" rel="stylesheet" type="text/css" />
<link href="css/Raleway-Semibold.css" rel="stylesheet" type="text/css" />
<link href="css/Raleway-ExtraBold.css" rel="stylesheet" type="text/css" />
<link href="css/ProximaNova-Semibold.css" rel="stylesheet" type="text/css" />
<link href="css/ProximaNova-Bold.css" rel="stylesheet" type="text/css" />
<link href="css/ProximaNovaCond-Semibold.css" rel="stylesheet" type="text/css" />

<link href="css/menu-steps.css" rel="stylesheet" type="text/css" />
<link href="css/results.css" rel="stylesheet" type="text/css" />

<script src="js/jquery-1.8.1.min.js"></script>

</head>

<body>
<!------	MAIN ( MENU )	 ------>
<div style="position: relative; overflow: scroll;">
	<div class="main_header">
		<div class="header_menu">
			<div>
				<div class="header_logo">
					<a href="/taguchi-based">
						<div class="logo"><img src="images/logo-white.png" alt="image"/></div>
						<div class="logo"><p>Blair</br>Gorman's</p></div>
						<div class="logo-mobile"><img src="images/logo-mobile.png" alt="image"/></div>
						<div class="logo-mobile"><p>Blair</br>Gorman's</p></div>
					</a>
				</div>
				<div class="menu">
					<ul>
						<a href="/taguchi-based"><li class="disappearance">Home</li></a>
						<a href="/taguchi-based/#about-us"><li class="disappearance">About Us</li></a>
						<a href="/taguchi-based/step1.html"><li class="button_start start_color">Start Test</li></a>
					</ul>
				</div>
			</div>
		</div>
		<div class="header_img"><img src="images/Step-none.png" alt="image"/></div>
	</div>
</div>
<!------	END MAIN ( MENU )	 ------>
<table align="center" cellpadding="20" cellspacing="0">
  <tr>
    <td height="224" valign="top">
	<!------	STEPS	 ------>
		<div class="our_steps">
			<div class="steps">
				<div class="step_text"><h2 class="step1">Step 1</h2><p>Lorem ipsum dolor sit amet</p></div>
				<div class="step_text_mobile step1_mobile"><h2>1</h2></div>
				<div class="triangle triangle_step1"></div>
			</div>
			<div class="steps">
				<div class="step_text"><h2 class="step2">Step 2</h2><p>Lorem ipsum dolor sit amet</p></div>
				<div class="step_text_mobile step2_mobile"><h2>2</h2></div>
				<div class="triangle triangle_step2"></div>
			</div>
			<div class="steps">
				<div class="step_text"><h2 class="step3">Step 3</h2><p>Lorem ipsum dolor sit amet</p></div>
				<div class="step_text_mobile step3_mobile"><h2>3</h2></div>
				<div class="triangle triangle_step3"></div>
			</div>
			<div class="steps">
				<div class="step_text"><h2 class="step4">Step 4</h2><p>Lorem ipsum dolor sit amet</p></div>
				<div class="step_text_mobile step4_mobile"><h2>4</h2></div>
				<div class="triangle triangle_step4"></div>
			</div>
			<div class="steps">
				<div class="step_text"><h2 class="step5">Step 5</h2><p>Lorem ipsum dolor sit amet</p></div>
				<div class="step_text_mobile step5_mobile"><h2>5</h2></div>
				<div class="triangle triangle_step5"></div>
			</div>
		</div>
<!------	END STEPS	 ------>

      <p class="style1"><span class="style3" style="line-height:50px;">TEST RESULTS </span></p>
	  <div class="p_style">
		<p style="margin:45px 0 25px;">Enter the response rates from the 4 test advertisements.</p>
		<p>The numbers below are just dummy data to illustrate how this software works ... please <br/>over-write these fictitious numbers with your actual test ad results</p>
	  </div>
  
<?php
 $numElements = $_POST["numElements"];
 $trials = $numElements + 1;
 $el = array();
 $labelA = array();
 $labelB = array();
 $results = array();
 
 for( $i=0; $i < $numElements; $i++ )
 {
 	$el[] = $_POST["el".$i ];
	$labelA[] = $_POST["label".$i."A" ];
	$labelB[] = $_POST["label".$i."B" ];
 }

 for( $i=0; $i < $trials; $i++ )
	$results[] = $_POST["response".$i ];

// for( $i=0; $i < $trials; $i++ )
//	printf( "Y%d = %f<br>", $i+1, $results[ $i ] );
//  printf("<br>");

  require_once("OA.php");
  if( $trials == 4 ) $oa = $OA4;
  if( $trials == 8 ) $oa = $OA8;
  if( $trials == 12 ) $oa = $OA12;
  if( $trials == 16 ) $oa = $OA16;


for( $i=0; $i < $numElements; $i++ )
{
	$ones = 0;
	$twos = 0;
	$n1=0;
	$n2=0;
	for( $j=0; $j < $trials; $j++ )
	{
		if( $oa[ $j ][ $i ] == 1 )
		{
			$r = $results[ $j ];
			$ones += $r;
			$n1++;
		}
		else
		{
			$r = $results[ $j ];
		    $twos += $r;
		    $n2++;
		}
	}

	if( $twos == $ones )
	    $optimum[] = 0;
	else
		$optimum[] = $twos > $ones ? 2 : 1;
/*
	if( $ones > $twos )
	 $optimium[] = 1;
	elseif( $twos > $ones )
	 $optimium[] = 2;
	else
	 $optimum[] = 0;
*/

//	$sumOfSquares = (( $ones * $ones ) / 2 ) + (( $twos * $twos ) / 2 ) - ((($ones+$twos)*($ones+$twos))/4);
//	$sumOfSquares = (pow( $ones, 2 ) / $n1 ) + (pow( $twos,2 ) / $n2 ) - (pow($ones+$twos,2)/ $trials );
//	printf( "ones : $ones | twos $twos | SofSQ $sumOfSquares<br>" );
	$s[ $i ] = abs($ones-$twos);
}


$sosTotal = 0;
for( $i=0; $i < $numElements; $i++ )
	$sosTotal += $s[ $i ];

$contributions = array();
$indexes = array();

 
for( $i=0; $i < $numElements; $i++ )
{
	if( $sosTotal != 0 )
		$contribution = $s[ $i ] / $sosTotal;
	else
	    $contribution = 0;
	    
	$contributions[ $i ] = $contribution;
//	printf( "contribution '%c':  %-2.2f<br>", 65+$i, $contribution * 100 );
}
/*
printf( "<Br>Optimum : ");
for($i=0; $i<$numElements;$i++)
{
	printf("%c%d ", 65+$i, $optimum[$i] );
}
printf("<br>");
*/
for( $i=0; $i < $numElements; $i++ )
 $indexes[] = $i;
/*
printf("BEFORE<Br>");
for( $i=0; $i < $numElements; $i++ )
  printf("$i : " . $indexes[ $i ] . "; opt= " . $optimum[ $i ] . "; cont=".$contributions[ $i ] . "<br>");
*/
array_multisort( $contributions, SORT_DESC, $indexes, $optimum );
/*
printf("<br>AFTER<Br>");
for( $i=0; $i < $numElements; $i++ )
  printf("$i : " . $indexes[ $i ] . "; opt= " . $optimum[ $i ] . "; cont=".$contributions[ $i ] . "<br>");
*/	
?>

<div class="style2">
	<div class="my-float mobile-none">
		<div style="font-family: 'Raleway-ExtraBold';"><strong>RANK</strong></div>
		<ul>
			<?php
			 for( $i=0; $i < $numElements; $i++ )
			 {	
				printf("<li>%d</li>", $i + 1);
			 }
			?>
		</ul>

	</div>
	<div class="my-float">
		<div style="font-family: 'Raleway-ExtraBold';"><strong>ELEMENT</strong></div>
		<ul>
			<?php
			 for( $i=0; $i < $numElements; $i++ )
			 {	
				printf("<li>%s</li>", $el[ $indexes[ $i ]]);
			 }
			?>
		</ul>
	</div>
	<div class="my-float">
		<div style="font-family: 'Raleway-ExtraBold';"><strong>BEST OPTION </strong></div>
		<ul>
			<?php
			 for( $i=0; $i < $numElements; $i++ )
			 {	
				if( $optimum[ $i ] == 1 )
					$opt = $labelA[ $indexes[ $i ] ];
				elseif( $optimum[ $i ] == 2 )
					$opt = $labelB[ $indexes[ $i ] ];
				else    //equal
					$opt = "</b>(Both options equal)<b>";
					
				printf("<li><b><font color='%s'>%s</font></b></li>", $optimum[ $i ] == 1 ? "#000000" : "#00bfe1", $opt);
			 }
			?>
		</ul>
	</div>
	<div class="my-float">
		<div style="font-family: 'Raleway-ExtraBold';"><strong>INFLUENCE</strong></div>
		<ul>
			<?php
			 for( $i=0; $i < $numElements; $i++ )
			 {	
				printf("<li>%.2f</li>", 100*$contributions[ $i ] );
			 }
			?>
		</ul>
	</div>
</div>

<br>
<br>

<TABLE width="90%" align="center" cellPadding="20" cellSpacing="0" >
  <TBODY>
    <TR>
      <TD align=middle>
		<p class="wish text_color"><FONT>I wish you well with your testing!</FONT></p>
        <p class="wish text_color"><font>Cheers</font></p>
		<p class="wish_end text_color"><font size="4"> Blair Gorman.</font></p>
	</TD>
    </TR>
  </TBODY>
</TABLE>

</td>
  </tr>
</table>
<!------	FOOTER	 ------>
<div style="background: #f8f8f8; overflow: hidden;">
	<div class="ad">
		<div class="ad_hd">Ad Optimazer Can Help<br/>You to Improve Your:</div>
		<div class="ad_box_main">
			<div class="ad_box">
				<a href="#"><img src="images/lorem-commucation.png" /><p>Lorem ipsum Dolor</p></a>
			</div>
			<div class="ad_box">
				<a href="#"><img src="images/lorem-message.png" /><p>Lorem ipsum Dolor</p></a>
			</div>
			<div class="ad_box">
				<a href="#"><img src="images/lorem-chat.png" /><p>Lorem ipsum Dolor</p></a>
			</div>
			<div class="ad_box">
				<a href="#"><img src="images/lorem-blocnote.png" /><p>Lorem ipsum Dolor</p></a>
			</div>
		</div>
	</div>
</div>
	
	<div style="background: #173841;">
		<div class="footer">
			<div class="footer_textinf">
				<div class="footer_logo">
					<a href="/taguchi-based">
						<div class="footer-logo"><img src="images/logo-white.png" alt="image"/></div>
						<div class="footer-logo"><p>Blair</br>Gorman's</p></div>
					</a>
				</div>
				
				<div class="footer_text">
					<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi-<br/>dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita-<br/>tion ullamco laboris nisi ut aliquip ex ea commodo consequat<br/>. Duis aute irure dolor <br/>in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</span>
					<p>accusantium doloremque laudantium, totam rem aperiam,</p>
				</div>

				<div class="footer_our_menu">
					<div class="footer_menu">
						<ul>
							<h3>Information</h3>
							<li><a href="#">Goverment funding</a></li>
							<li><a href="#">Enrol Now</a></li>
							<li><a href="#">Why Us</a></li>
							<li><a href="#">Student Info</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">Contact Us</a></li>
						</ul>
					</div>
				
					<div class="footer_menu2">
						<ul>
							<h3>Contact Us</h3>
							<li>Phone <a href="tel:1300555555">1300 555 555</a></li>
							<li>Fax <a href="tel:0396145555">03 9614 5555</a></li>
							<li>Email <a href="mailto:admin@youremail.com">admin@youremail.com</a></li>
							<p>
								<li><a href="#">Postal Address</a></li>
								<li><a href="#">28 Postal Street</a></li>
								<li><a href="#">Suburb, Melbourne</a></li>
								<li><a href="#">Australia</a></li>
							</p>
						</ul>
					</div>
				</div>
				<div style="margin:6% 0 4%; clear:both; overflow:hidden;">
					<div class="footer_info">
						<span style="color:#d9ede4; font-family:'Raleway-Regular';">Copyright &#169; 2016 </span>
						<span style="font-family:'Raleway-Bold';">Blair Gorman's &#160;&#160;</span>
					</div>
					<div class="footer_symbol">
						<span>|</span>
						&#160;&#160; Privacy Policy &#160;&#160;|&#160;&#160; About &#160;&#160;|&#160;&#160; FAQ &#160;&#160;
					</div>
					<div class="footer_symbol footer_symbol-2"><span>|</span>&#160;&#160; Contact Support</div>
				</div>
			</div>
		</div>
	</div>
<!------	END FOOTER	 ------>
</body>
</html>
