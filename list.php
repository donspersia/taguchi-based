<?

//include("config/siteconfig.php");
//include("functions.php");

header("Pragma: no-cache");

$password	= $_POST[ "password" ];

if( $password != "coffeetime5" )
{
    print( "Incorrect password - go away<br>" );
    exit();
}


$err = "";


$link = mysql_connect( "mysql.neureal.com", "bgorman_askdba", "sima491" )
    or Fatal("Could not connect to database");

mysql_select_db( "bgorman_ask" )
    or Fatal( "Error selecting database : " . mysql_error() );

echo "<html><title>Pending Payment Order List Screen : ".SITENAME."</title>";
echo "</head><body>";

echo "<form method=\"post\" action=\"incomplete-ordersB.php\">";


echo "<table BORDER COLS=3 WIDTH=\"100%\" BGCOLOR=\"#FFFFFF\" NOSAVE >";

echo "<tr>";
echo "<td>Record #</td>";
echo "<td>Date</td>";
echo "<td>Question</td>";
echo "</tr>";

$pass = 0;
$querya = "SELECT rownum, date, question
    FROM taguchi
    ORDER BY rownum";

if( ( $resulta = mysql_query( $querya )) == false )
    {
    echo( $querya . " gives " . mysql_error() );
    exit();
    }

$num_rows = mysql_num_rows( $resulta );

if( $num_rows == 0 )
    {
    echo( "No questions found in the database" );
    exit;
    }

$count = 0;

while ($rowa = mysql_fetch_array( $resulta ))
    {


    $rownum = $rowa[ "rownum" ];

    $date = $rowa[ "date" ];
    $question = stripslashes( $rowa[ "question" ] );


    echo "<tr>";
    echo "<td>$rownum</td>";
    echo "<td>$date</td>";
    echo "<td>$question</td>";
    echo "</tr>";

    $count++;
    }
echo "</table>";

echo "</body></html>";

?>
