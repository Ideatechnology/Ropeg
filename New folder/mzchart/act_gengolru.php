<?php
require_once ("../MZSetup/MZconstDB.php");
require_once ("../MZLib/MZFungsi.php");
require ("./mzsetting.php");

defined( '__MUZE__' ) or die( 'Direct access to this file is prohibited.' );

$facttbl = "fact_golru";

$thn = fldNumber($_GET ['yr']);

if ($thn==0) $thn=date('Y');
if ($thn>2100) $thn=date('Y');

if ($thn > 2000) {
	$sqlDel = "delete from $facttbl where thn=$thn";
	$res = $fLib->query ($sqlDel);
	if ($res == False) 
		;	// do nothing, just continue

	for ($ix=1; $ix<=17; $ix++) {
		$gol  = 1 + (int)($ix / 4);
		$pang = $ix % 4;
		if ($pang==0) { $gol = $gol-1; $pang = 4; }
		if ($ix==17) { $gol=4; $pang = 5; }
		$golru = "1$gol$pang";
		echo "$ix ==> $gol, $pang<br />";
		$sqlIns = "insert into $facttbl (thn, gol, pangkat, sex, jml) ".
					"select $thn, $gol, $ix, p.kjkel, count(*) from v_peglist p join peg_pakhir g on (p.nip=g.nip)
					 where g.kgolru=$golru
						and kstatus in(1,2) and kjpeg in(1,2)
							and ((kunkom >='01' and kunkom<='12') or kunkom='50')
					  group by p.kjkel ";
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
