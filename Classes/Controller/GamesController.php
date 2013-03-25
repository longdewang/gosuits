<?php
	class Tx_Gosuits_Controller_GamesController
		extends Tx_Extbase_MVC_Controller_ActionController {

		/**
		 * @var Tx_Gosuits_Domain_Repository_GoGameRepository
		 */
		protected $gamesRepository;

		public function initializeAction() {
			$this->gamesRepository = t3lib_div::makeInstance(
				'Tx_Gosuits_Domain_Repository_GoGameRepository');
		}
		
		public function listAction() {
			$games = $this->gamesRepository->findAll();
			$this->view->assign('games', $games);
		}

		public function showAction(Tx_Gosuits_Domain_Model_GoGame $game = NULL) {
			$GLOBALS['TSFE']->getPageRenderer()->addJsFile('typo3conf/ext/gosuits/Resources/Public/JavaScript/Contrib/player/js/all.compressed.js');
			$this->view->assign('game', $game);
		}

		public function newAction(Tx_Gosuits_Domain_Model_GoGame $newGame = NULL) {
			$this->view->assign('newGame', $newGame);
		}
		/**
		 *@dontverifyrequesthash
		 */
		public function createAction(Tx_Gosuits_Domain_Model_GoGame $newGame) {
			
			$ffunc = t3lib_div::makeInstance('t3lib_basicFileFunctions');
			$path = $ffunc->getUniqueName($_FILES['tx_gosuits_pi1']['name']['newGame']['sgffile'], t3lib_div::getFileAbsFileName('uploads/tx_gosuits/'));
			t3lib_div::upload_copy_move($_FILES['tx_gosuits_pi1']['tmp_name']['newGame']['sgffile'], $path);
			$newGame->setSgfFile(basename($path));
			$playdate = $newGame->getPlayDate()->getTimestamp();
			$newGame->setPlayDate($playdate);
			$this->gamesRepository->add($newGame);
			//$newGame->setBlack($newGame->getBlack());
			$this->redirect('list', 'Games');     //, NULL, array('game' => $newGame));
		}

	}
?>
