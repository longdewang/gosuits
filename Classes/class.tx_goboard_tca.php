<?php

class tx_goboard_tca {
	public function tx_getInfosWizard($PA, $fObj) {
		$PA['item'] = '<div style="background-color:red;padding:4px;">'.$PA['item'].'</div>';
		$output='<div><a href="#">Test</a></div>';
		var_dump($output);
		return $output;
	}
}
?>
