<?php
	$fLib->MZInit ( 'appl', 			// module
					'Application',		// title
					'tr_application', '' );		// master & detail table

	$fLib->addfld (new MZField ('appl_id', 	'T', true));
	$fLib->addfld (new MZField ('name', 		'T'));
	$fLib->addfld (new MZField ('segment', 		'I'));
	$fLib->addfld (new MZField ('position', 	'I'));
	$fLib->addfld (new MZField ('audit_level', 	'I'));
	$fLib->addfld (new MZField ('help_no', 		'I'));
	$fLib->addfld (new MZField ('descr', 		'T'));
?>