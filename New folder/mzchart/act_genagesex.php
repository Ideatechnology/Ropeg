<?php
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");
 	require ("./mzsetting.php");

	defined( '__MUZE__' ) or die( 'Direct access to this file is prohibited.' );

	$facttbl = "fact_agesex";
	$dim = array (
			1	=> array ( 0, 25),
			2	=> array (26, 30), 
			3	=> array (31, 35), 
			4	=> array (36, 40), 
			5	=> array (41, 45), 
			6	=> array (46, 50), 
			7	=> array (51, 55), 
			8	=> array (56, 56), 
			9	=> array (57, 59), 
			10	=> array (60, 60), 
			11	=> array (61, 64), 
			12	=> array (65, 99)
		);

	$thn = fldNumber($_GET ['yr']);
	
	if ($thn==0) $thn=date('Y');
	if ($thn>2100) $thn=date('Y');

	if ($thn > 2000) {
		$sqlDel = "delete from fact_agesex where thn=$thn";
		$res = $fLib->query ($sqlDel);
		if ($res == False) 
			;	// do nothing, just continue

		for ($age=1; $age<=12; $age++) {
			$sqlIns = "insert into $facttbl (thn, age, sex, jml) ".
				"select $thn, $age, 1, count(*) from v_peglist 
				 where TIMESTAMPDIFF(YEAR, tlahir, '$thn-12-31') between " .$dim[$age][0]. " and " .$dim[$age][1]. "
					and kjkel=1 and kstatus in(1,2) and kjpeg in(1,2)
						and ((kunkom >='01' and kunkom<='12') or kunkom='50')
				union
				select $thn, $age, 2, count(*) from v_peglist 
				 where TIMESTAMPDIFF(YEAR, tlahir, '$thn-12-31') between " .$dim[$age][0]. " and " .$dim[$age][1]. "
					and kjkel=2 and kstatus in(1,2) and kjpeg in(1,2)
						and ((kunkom >='01' and kunkom<='12') or kunkom='50')";
			//echo "<hr>$sqlIns<br />";
			
			$res = $fLib->query ($sqlIns);
			if ($res == False) 
				;	// do nothing, just continue
		}
	}
	
	//die;
	//$pgNav = 'mzmain.php?mode=browse';
	//header("location: $pgNav");
?>
