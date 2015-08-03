<?php
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");
 	require ("./mzsetting.php");

	defined( '__MUZE__' ) or die( 'Direct access to this file is prohibited.' );

	$facttbl = "fact_edu";
	$thn = fldNumber($_GET ['yr']);
	
	if ($thn==0) $thn=date('Y');
	if ($thn>2100) $thn=date('Y');

	if ($thn > 2000) {
		$sqlDel = "delete from $facttbl where thn=$thn";
		$res = $fLib->query ($sqlDel);
		if ($res == False) 
			;	// do nothing, just continue

		for ($edu=1; $edu<=10; $edu++) {
			$ktpu = $fLib->getValue ("select ktpu from dim_edu where edu=$edu");
			$sqlIns = "insert into fact_edu (thn, edu, sex, jml)
						select $thn, $edu, 1, count(*) from v_peglist p join peg_pdakhir pd on (p.nip=pd.nip)
						 where pd.ktpu in ($ktpu)
							and p.kjkel=1 and kstatus in(1,2) and kjpeg in(1,2)
								and ((kunkom >='01' and kunkom<='12') or kunkom='50')
						union
						select $thn, $edu, 2, count(*) from v_peglist p join peg_pdakhir pd on (p.nip=pd.nip)
						 where pd.ktpu in ($ktpu)
							and p.kjkel=2 and kstatus in(1,2) and kjpeg in(1,2)
								and ((kunkom >='01' and kunkom<='12') or kunkom='50')";
			//echo "<hr>$sqlIns<br />"; die;
			
			$res = $fLib->query ($sqlIns);
			if ($res == False) 
				;	// do nothing, just continue
		}
	}
	
	//die;
	//$pgNav = 'mzmain.php?mode=browse';
	//header("location: $pgNav");
?>
