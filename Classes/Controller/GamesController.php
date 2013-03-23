<?php
	class Tx_Goboard_Controller_GamesController
		extends Tx_Extbase_MVC_Controller_ActionController {

		/**
		 * @var Tx_Goboard_Domain_Repository_GoBoardRepository
		 */
		protected $gamesRepository;

		public function initializeAction() {
			$this->gamesRepository = t3lib_div::makeInstance(
				'Tx_Goboard_Domain_Repository_GoBoardRepository');
		}
		
		public function listAction() {
			$games = $this->gamesRepository->findAll();
			$this->view->assign('games', $games);
		}

		public function showAction(Tx_Goboard_Domain_Model_GoBoard $game = NULL) {
			$GLOBALS['TSFE']->getPageRenderer()->addJsFile('typo3conf/ext/goboard/Resources/Public/JavaScript/Contrib/player/js/all.compressed.js');
			$this->view->assign('game', $game);
		}

		public function newAction(Tx_Goboard_Domain_Model_GoBoard $newGame = NULL) {
			$this->view->assign('newGame', $newGame);
		}
		/**
		 *@dontverifyrequesthash
		 */
		public function createAction(Tx_Goboard_Domain_Model_GoBoard $newGame) {
			
			$ffunc = t3lib_div::makeInstance('t3lib_basicFileFunctions');
			$path = $ffunc->getUniqueName($_FILES['tx_goboard_pi1']['name']['newGame']['sgffile'], t3lib_div::getFileAbsFileName('uploads/tx_goboard/'));
			t3lib_div::upload_copy_move($_FILES['tx_goboard_pi1']['tmp_name']['newGame']['sgffile'], $path);
			$newGame->setSgfFile(basename($path));
			//$newGame->setWhite($path);
			//print_r($_FILES);
			$newGame->setBlack($newGame->getPlayDate());
			$this->gamesRepository->add($newGame);
			//$newGame->setBlack($newGame->getBlack());
			$this->redirect('list', 'Games');     //, NULL, array('game' => $newGame));
		}

	}
?>
