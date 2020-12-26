<?

require_once("OA.php");

SetFixedWidth();
printf("file %s<br>", __FILE__ );

$n1 = 10;
$n2 = 15;


$n1TOT = 100;
$n2TOT = 100;

$observed = array();

define( 'BUY', 0 );
define( 'NOBUY', 1 );


$observed[ 0 ][ BUY ] = $n1;
$observed[ 1 ][ BUY ] = $n2;

$observed[ 0 ][ NOBUY ] = $n1TOT - $n1;
$observed[ 1 ][ NOBUY ] = $n2TOT - $n2;

$outcomeFraction[ BUY ] = ( $observed[ 0 ][ BUY ] + $observed[ 1 ][ BUY ] ) / ($n1TOT+$n2TOT);
$outcomeFraction[ NOBUY ] = ( $observed[ 0 ][ NOBUY ] + $observed[ 1 ][ NOBUY ] ) / ($n1TOT+$n2TOT);


printf( "data: %f, %f %f<br>",$observed[ 0 ][ BUY ],$observed[ 1 ][ BUY ], $n1TOT);

printf( "Fractions: %f, %f<br>",$outcomeFraction[ BUY ], $outcomeFraction[ NOBUY ]);

$expected[ 0 ][ BUY ] = $outcomeFraction[ BUY ] * $n1TOT;
$expected[ 1 ][ BUY ] = $outcomeFraction[ BUY ] * $n2TOT;

$expected[ 0 ][ NOBUY ] = $outcomeFraction[ NOBUY ] * $n1TOT;
$expected[ 1 ][ NOBUY ] = $outcomeFraction[ NOBUY ] * $n2TOT;

$a = $expected;
printf( "expected: %f, %f | %f, %f<br>",$a[0][0],$a[0][1], $a[1][0],$a[1][1] );

$OminusE[0][0] = $observed[0][0] - $expected[0][0];
$OminusE[0][1] = $observed[0][1] - $expected[0][1];
$OminusE[1][0] = $observed[1][0] - $expected[1][0];
$OminusE[1][1] = $observed[1][1] - $expected[1][1];

$a = $OminusE;
printf( "OE: %f, %f | %f, %f<br>",$a[0][0],$a[0][1], $a[1][0],$a[1][1] );

$comp[0][0] =  pow( $OminusE[0][0], 2) / $expected[0][0];
$comp[0][1] =  pow( $OminusE[0][1], 2) / $expected[0][1];
$comp[1][0] =  pow( $OminusE[1][0], 2) / $expected[1][0];
$comp[1][1] =  pow( $OminusE[1][1], 2) / $expected[1][1];

$a = $comp;
printf( "comp: %f, %f | %f, %f<br>",$a[0][0],$a[0][1], $a[1][0],$a[1][1] );

$sum = $a[0][0] + $a[0][1] + $a[1][0] + $a[1][1];

printf( "sum: %f<br>",$sum );

function SetFixedWidth()
{
	print('<style type="text/css">
	<!--
	.style2 {font-family: "Courier New", Courier, mono}
	-->
	</style>
	<p class="style2">');
}

?>
