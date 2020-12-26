<?

require_once("OA.php");

SetFixedWidth();
printf("file %s<br>", __FILE__ );

$trials = 12;
$nfactors = $trials - 1;

$results = array( 8,6,11,4,  13,9,8,10,  11,12,11,5);
$sampleSize = 100;

printf("Experiment One results (only 1 expt just now)<br>" );
for( $i=0; $i < $trials; $i++ )
	printf( "Y%d = %d<br>", $i+1, $results[ $i ] );
printf("<br>");
/*
for( $i=0; $i < $nfactors; $i++ )
{
	$nOnes = 0;
	$nTwos = 0;
	for( $j=0; $j < $trials; $j++ )
	{
		if( $OA16[ $j ][ $i ] == 1 )
		{
			$nOnes++;
			printf("1-");
		}
		elseif( $OA16[ $j ][ $i ] == 2 )
		{
		    $nTwos ++;
			printf("2-");
		}
		else
		  exit("CRAP");
	}
	printf(" [1:$nOnes][2:$nTwos]<br>");
}
*/
$s = array();
$optimum = array();
$contributions = array();
$indexes = array();

for( $i=0; $i < $nfactors; $i++ )
{
	$ones = 0;
	$twos = 0;
	$n1=0;
	$n2=0;
	for( $j=0; $j < $trials; $j++ )
	{
		if( $OA12[ $j ][ $i ] == 1 )
		{
			$r = $results[ $j ];
			$ones += $r;
			printf("<B>$r</b>-");
			$n1++;
		}
		else
		{
			$r = $results[ $j ];
		    $twos += $r;
			printf("$r-");
			$n2++;
		}
	}
	printf(" Average:  %c1=%.1f, %c2=%.1f ", 65+$i, $ones/2, 65+$i, $twos/2);
	
	$optimum[] = $twos > $ones ? 2 : 1;

	$sumOfSquares = (pow( $ones, 2 ) / $n1 ) + (pow( $twos,2 ) / $n2 ) - (pow($ones+$twos,2)/ $trials );
	printf( "ones : $ones ($n1) | twos $twos ($n2) | SofSQ $sumOfSquares<br>" );
	$s[ $i ] = $sumOfSquares;
	$s[ $i ] = abs( $ones - $twos );
}

printf("<br>Computation of average performance:<br>");

$sosTotal = 0;
for( $i=0; $i < $nfactors; $i++ )
	$sosTotal += $s[ $i ];


 
for( $i=0; $i < $nfactors; $i++ )
{
	$contribution = $s[ $i ] / $sosTotal;
	$contributions[ $i ] = $contribution;
	printf( "contribution '%c':  %-2.2f<br>", 65+$i, $contribution * 100 );

}

printf( "<Br>Optimum : ");
for($i=0; $i<$nfactors;$i++)
{
	printf("%c%d ", 65+$i, $optimum[$i] );
}
printf("<br>");

for( $i=0; $i < $nfactors; $i++ )
 $indexes[] = $i;

printf("BEFORE<Br>");

for( $i=0; $i < $nfactors; $i++ )
  printf("$i : " . $indexes[ $i ] . "; opt= " . $optimum[ $i ] . "; cont=".$contributions[ $i ] . "<br>");

array_multisort( $contributions, SORT_DESC, $indexes, $optimum );

printf("<br>AFTER<Br>");

for( $i=0; $i < $nfactors; $i++ )
  printf("$i : " . $indexes[ $i ] . "; opt= " . $optimum[ $i ] . "; cont=".$contributions[ $i ] . "<br>");


// build up contrived results ...

function SetFixedWidth()
{
	print('<style type="text/css">
	<!--
	.style2 {font-family: "Courier New", Courier, mono}
	-->
	</style>
	<p class="style2">');
}


if(0)
  for( $j=0; $j < $trials; $j++ )
  {
    if( $OA12[$j][0] == 1 ) // 0 =~= headline
	 $results[$j] += 1;
	else
	 $results[$j] += 2;

    if( $OA12[$j][1] == 1 ) // 1 =~= opening paragraph
	 $results[$j] += 2;
	else
	 $results[$j] += 4;

    if( $OA12[$j][2] == 1 ) // 2 =~= font
	 $results[$j] += 2;
	else
	 $results[$j] += 3;
  }

?>
