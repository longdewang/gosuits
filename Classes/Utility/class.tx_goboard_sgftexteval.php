<?php
	class tx_goboard_sgftexteval {
		public function returnFieldJS() {
			return '
				alert("Test!")
				return value + "[replace by JS]"
			';
		}
		public function evaluateFieldValue($value, $is_in, &$set) {
			$set = 1;
			return $value;
		}
	}

	if(defined('TYPO3_MODE') && isset($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/goboard/Classes/Utility/class.tx_goboard_sgftexteval.php'])) {
		include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/goboard/Classes/Utility/class.tx_goboard_sgftexteval.php']);
	}
?>