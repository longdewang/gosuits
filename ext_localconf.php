<?php
	if (!defined('TYPO3_MODE')) die ('Access denied.');

	
	Tx_Extbase_Utility_Extension::configurePlugin(
		$_EXTKEY,
		'Pi1',
		array('Games' => 'list,show,new,create'),
		array('Games' => 'new,create')
	);

	//
	$TYPO3_CONF_VARS['SC_OPTIONS']['tce']['formevals']['tx_goboard_sgftexteval'] = 'EXT:goboard/Classes/Utility/class.tx_goboard_sgftexteval.php';
?>
