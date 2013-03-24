<?php
	if (!defined ('TYPO3_MODE')) die ('Access denied.');

	include_once(t3lib_extMgm::extPath('gosuits').'Classes/class.tx_gosuits_tca.php');
	//var_dump(tx_gosuits_tca);
	t3lib_extMgm::allowTableOnStandardPages('tx_gosuits_domain_model_gogame');
	$ll = 'LLL:EXT:gosuits/Resources/Private/Language/locallang_db.xml:';
	$TCA['tx_gosuits_domain_model_gogame'] = array (
		'ctrl' => array (
			'title' => $ll.'tx_gosuits_domain_model_gogame',
			'label' => 'title',
			'tstamp' => 'tstamp',
			'crdate' => 'crdate',
			'cruser_id' => 'cruser_id',
			'dividers2tabs' => TRUE,
			'languageField' => 'sys_language_uid',
			'transOrigPointerField' => 'l10n_parent',
			'transOrigDiffSourceField' => 'l10n_diffsource',
			'delete' => 'deleted',
			'type' => 'type',
			'enablecolumns' => array(
				'disabled' => 'hidden',
				'starttime' => 'starttime',
				'endtime' => 'endtime',
				'fe_group' => 'fe_group',
			),
		),
		'interface' => array(
			'showRecordFieldList' => 'cruser_id,pid,sys_language_uid,l10n_parent,l10n_diffsource,hidden,starttime,endtime,fe_group,type,title,white,black,playdate,sgffile,sgftext',
		),
		'columns' => array (
			'sys_language_uid' => array(
				'exclude' => 1,
				'label' => 'LLL:EXT:cms/locallang_ttc.xml:sys_language_uid_formlabel',
				'config' => array(
					'type' => 'select',
					'foreign_table' => 'sys_language',
					'foreign_table_where' => 'ORDER BY sys_language.title',
					'items' => array(
						array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
						array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
					)
				)
			),
			'l10n_parent' => array(
				'displayCond' => 'FIELD:sys_language_uid:>:0',
				'exclude'     => 1,
				'label'       => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
				'config'      => array(
					'type'  => 'select',
					'items' => array(
						array('', 0),
					),
					'foreign_table'       => 'tx_gosuits_domain_model_gogame',
					'foreign_table_where' => 'AND tx_gosuits_domain_model_gogame.pid=###CURRENT_PID### AND tx_gosuits_domain_model_gogame.sys_language_uid IN (-1,0)',
				)
			),
			'l10n_diffsource' => array(
				'config' => array(
					'type' => 'passthrough'
				)
			),
			'hidden' => array(
				'exclude' => 1,
				'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
				'config'  => array(
					'type'    => 'check',
					'default' => 0
				)
			),
			'cruser_id' => array(
				'label'   => 'cruser_id',
				'config'  => array(
					'type'    => 'passthrough'
				)
			),
			'pid' => array(
				'label'   => 'pid',
				'config'  => array(
					'type'    => 'passthrough'
				)
			),
			'crdate' => array(
				'label'   => 'crdate',
				'config'  => array(
					'type'     => 'passthrough',
				)
			),
			'tstamp' => array(
				'label'   => 'crdate',
				'config'  => array(
					'type'     => 'passthrough',
				)
			),
			'starttime' => array(
				'exclude' => 1,
				'l10n_mode' => 'mergeIfNotBlank',
				'label'   => 'LLL:EXT:cms/locallang_ttc.xml:starttime_formlabel',
				'config'  => array(
					'type'     => 'input',
					'size'     => 8,
					'max'      => 20,
					'eval'     => 'date',
					'default'  => 0,
				)
			),
			'endtime' => array(
				'exclude' => 1,
				'l10n_mode' => 'mergeIfNotBlank',
				'label'   => 'LLL:EXT:cms/locallang_ttc.xml:endtime_formlabel',
				'config'  => array(
					'type'     => 'input',
					'size'     => 8,
					'max'      => 20,
					'eval'     => 'date',
					'default'  => 0,
				)
			),
			'fe_group' => array(
				'exclude' => 1,
				'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.fe_group',
				'config' => array(
					'type' => 'select',
					'size' => 5,
					'maxitems' => 20,
					'items' => array(
						array(
							'LLL:EXT:lang/locallang_general.xml:LGL.hide_at_login',
							-1,
						),
						array(
							'LLL:EXT:lang/locallang_general.xml:LGL.any_login',
							-2,
						),
						array(
							'LLL:EXT:lang/locallang_general.xml:LGL.usergroups',
							'--div--',
						),
					),
					'exclusiveKeys' => '-1,-2',
					'foreign_table' => 'fe_groups',
					'foreign_table_where' => 'ORDER BY fe_groups.title',
				),
			),

		'type' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:cms/locallang_tca.xml:pages.doktype_formlabel',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array($ll.'tx_gosuits_domain_model_gogame.type.I.0', 0),
					array($ll.'tx_gosuits_domain_model_gogame.type.I.1', 1),
				),
				'size' => 1,
				'maxitems' => 1,
			)
		),
		'sgffile' => array(
			'exclude' => 0,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => $ll.'tx_suits_domain_model_gogame.sgffile',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => 'sgf',
				'disallowed' => 'php,php3',
				'uploadfolder' => 'uploads/tx_gosuits',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),

			'title' => array (
				'exclude' => 0,
				'label' => $ll.'tx_suits_domain_model_gogame.title',
				'config' => array (
					'type' => 'input',
					'size' => '20',
					'eval' => 'required,trim',
				),
			),

			'sgftext' => array (
				'exclude' => 0,
				'label' => $ll.'tx_suits_domain_model_gogame.sgftext',
				'config' => array (
					'type' => 'text',
					'eval' => 'required,trim'
				)
			),
			'white' => array(
				'label' => $ll.'tx_suits_domain_model_gogame.white',
				'config' => array(
					'type' => 'input',
					'size' => '20',
					'eval' => 'trim'
				)
			),
			'black' => array(
				'label' => $ll.'tx_suits_domain_model_gogame.black',
				'config' => array(
					'type' => 'input',
					'size' => '20',
					'eval' => 'trim'
				)
			),
			'playdate' => array(
				'label' => $ll.'tx_suits_domain_model_gogame.playdate',
				'config' => array(
					'type' => 'input',
					'size' => '20',
					'eval' => 'date',
				)
			),

		),

		'types' => array (
			//Sgf File
			'0' => array('showitem' => 'l10n_parent, l10n_diffsource,
					title;;paletteCore,sgffile;;;;2-2-2,;;;;3-3-3,playtime;;paletteArchive,
					--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;paletteAccess,

				--div--;LLL:EXT:cms/locallang_tca.xml:pages.tabs.options,white,black,playdate
				'
			),
			//Sgf Text
			'1' => array('showitem' => 'l10n_parent, l10n_diffsource,
					title;;paletteCore,sgftext;;;;2-2-2,;;;;3-3-3,playtime;;paletteArchive,
					--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;paletteAccess,

				--div--;LLL:EXT:cms/locallang_tca.xml:pages.tabs.options,white,black,playdate
				'
			)
		),
		'palettes' => array(
			'paletteAuthor' => array(
				'showitem' => 'author_email,',
				'canNotCollapse' => TRUE
			),
			'paletteArchive' => array(
				'showitem' => 'archive,',
				'canNotCollapse' => TRUE
			),
			'paletteCore' => array(
				'showitem' => 'type,sys_language_uid,hidden',
				'canNotCollapse' => FALSE
			),
			'paletteNavtitle' => array(
				'showitem' => 'alternative_title,path_segment',
				'canNotCollapse' => FALSE
			),
			'paletteAccess' => array(
				'showitem' => 'starttime;LLL:EXT:cms/locallang_ttc.xml:starttime_formlabel,
						endtime;LLL:EXT:cms/locallang_ttc.xml:endtime_formlabel,
						--linebreak--, fe_group;LLL:EXT:cms/locallang_ttc.xml:fe_group_formlabel,
						--linebreak--,editlock',
				'canNotCollapse' => TRUE,
			),
		),
	);

	Tx_Extbase_Utility_Extension::registerPlugin(
		$_EXTKEY,
		'Pi1',
		'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_be.xml:pi1_title'
	);
?>
