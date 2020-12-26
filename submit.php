<?php

$table      = "taguchi";

/*

CREATE TABLE bowling (
  rownum        integer NOT NULL auto_increment,
  name 			varchar(50) NOT NULL default '',
  email 		varchar(50) NOT NULL default '',
  question 		text NOT NULL default '',
  ip_addr		varchar(50) NOT NULL default '',
  date          TIMESTAMP,
  PRIMARY KEY  (rownum)
) TYPE=MyISAM;

*/

$name		= addslashes ( $_POST[ "name" ] );
$email		= addslashes ( $_POST[ "email" ] );
$question	= addslashes ( $_POST[ "question" ] );

  
if ( $name == "" )
 Fatal( "Please enter your name" );
 
if ( $email == "" )
 Fatal( "Please enter your email" );

if ( $question == "" )
 Fatal( "Please enter your question" );

if (getenv("HTTP_CLIENT_IP")) {
  $ip_addr = getenv("HTTP_CLIENT_IP");
}
else
  $ip_addr = "Not set";


$link = mysql_connect( "mysql.neureal.com", "bgorman_askdba", "sima491" )
    or Fatal("Could not connect to database");

mysql_select_db( "bgorman_ask" )
    or Fatal( "Error selecting database : " . mysql_error() );

$query = "INSERT INTO $table SET
			name  = '$name',
			email = '$email',
			question = '$question',
			ip_addr = '$REMOTE_ADDR'";
			
//                order_id                = "' . $SiteVars['OrderNum'] . '",
//                birth_first_name =      "' . addslashes( $SiteVars['BirthFirstName']    ) . '",


if( mysql_query( $query ) == false )
{
    Fatal( "<b>Inserting into $table - " . mysql_error() . "</b><p>");
}

// print( "Query : $query " );
print( '<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Thank you</title>
</head>
<body>
<p><p><table width="500" border="2" cellpadding="8" align="center">
       <tr><td>
       <p align="center"><b><font size="4" face="Arial, Helvetica, sans-serif">Thank You</font></b></p>
	   <p>
	   <font size="3" face="Verdana, Arial, Helvetica, sans-serif">I\'ll keep you posted about any improvements, updates, and new releases of my testing software<br>(to '.$email.')<br><br>Sincerely,<br> - Blair Gorman.</font><p>
	   </td>
       </tr></table>

</body>
</html>' );



exit;


function Fatal( $msg )
{
    print( '<table width="500" border="5" cellpadding="8" align="center" bordercolor="#FF0000">
           <tr><td>
           <p align="center"><b><font size="3" face="Arial, Helvetica, sans-serif">Please note:</font></b></p>
           <p><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#FF0000">' . $msg . '</b></font></font></p>
		   <p>Please press the "back" button on your browser to return to the main page and try again.
		   </td></tr></table>' );

    exit();
}


?>
