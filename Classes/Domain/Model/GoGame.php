<?php
    class Tx_Gosuits_Domain_Model_GoGame extends Tx_Extbase_DomainObject_AbstractEntity {
/**
	 * @var DateTime
	 */
	protected $crdate;

	/**
	 * @var DateTime
	 */
	protected $tstamp;

	/**
	 * @var integer
	 */
	protected $sysLanguageUid;

	/**
	 * @var integer
	 */
	protected $l10nParent;

	/**
	 * @var DateTime
	 */
	protected $starttime;

	/**
	 * @var DateTime
	 */
	protected $endtime;

	/**
	 * keep it as string as it should be only used during imports
	 * @var string
	 */
	protected $feGroup;

	/**
	 * @var boolean
	 */
	protected $hidden;

	/**
	 * @var boolean
	 */
	protected $deleted;

	/**
	 * @var integer
	 */
	protected $cruserId;

        /**
	 * @var string
	 **/
	protected $title = '';

	/**
	 * @var string
	 */
	protected $type;

	/**
	 * @var DateTime
	 */
	protected $playDate;

	/**
	 * @var string
	 */
	protected $white;

	/**
	 * @var string
	 */
	protected $black;

	/**
	 * @var string
	 */
	protected $sgftext = '';
	
	/**
	 * @var string SGF File name 
	 */
	protected $sgffile;

	/*public function __construct($title = '', $sgftext= '') {
	    $this->setTitle($title);
	    $this->setSgfText($sgftext);
	}*/

	/**
	 * Get creation date
	 *
	 * @return DateTime
	 */
	public function getCrdate() {
		return $this->crdate;
	}

	/**
	 * Set Creation Date
	 *
	 * @param DateTime $crdate crdate
	 * @return void
	 */
	public function setCrdate($crdate) {
		$this->crdate = $crdate;
	}

	/**
	 * Get Tstamp
	 *
	 * @return DateTime
	 */
	public function getTstamp() {
		return $this->tstamp;
	}

	/**
	 * Set tstamp
	 *
	 * @param DateTime $tstamp tstamp
	 * @return void
	 */
	public function setTstamp($tstamp) {
		$this->tstamp = $tstamp;
	}

	/**
	 * Get starttime
	 *
	 * @return DateTime
	 */
	public function getStarttime() {
		return $this->starttime;
	}

	/**
	 * Set starttime
	 *
	 * @param DateTime $starttime starttime
	 * @return void
	 */
	public function setStarttime($starttime) {
		$this->starttime = $starttime;
	}

	/**
	 * Get Endtime
	 *
	 * @return DateTime
	 */
	public function getEndtime() {
		return $this->endtime;
	}

	/**
	 * Set Endtime
	 *
	 * @param DateTime $endtime endttime
	 * @return void
	 */
	public function setEndtime($endtime) {
		$this->endtime = $endtime;
	}

	/**
	 * Get Hidden
	 *
	 * @return integer
	 */
	public function getHidden() {
		return $this->hidden;
	}

	/**
	 * Set Hidden
	 *
	 * @param integer $hidden
	 * @return void
	 */
	public function setHidden($hidden) {
		$this->hidden = $hidden;
	}

	/**
	 * Get sys language
	 *
	 * @return integer
	 */
	public function getSysLanguageUid() {
		return $this->_languageUid;
	}

	/**
	 * Set sys language
	 *
	 * @param integer $sysLanguageUid language uid
	 * @return void
	 */
	public function setSysLanguageUid($sysLanguageUid) {
		$this->_languageUid = $sysLanguageUid;
	}

	/**
	 * Get language parent
	 *
	 * @return integer
	 */
	public function getL10nParent() {
		return $this->l10nParent;
	}

	/**
	 * Set language parent
	 *
	 * @param integer $l10nParent l10nparent
	 * @return void
	 */
	public function setL10nParent($l10nParent) {
		$this->l10nParent = $l10nParent;
	}

/**
	 * Get Sgf file
	 *
	 * @return string Sgf file
	 */
	public function getSgfFile() {
		return $this->sgffile;
	}

	/**
	 * Set SGF file
	 *
	 * @param string $file Sgffile
	 * @return void
	 */
	public function setSgfFile($file) {
		$this->sgffile = $file;
	}
	
/**
	 * Get fegroup
	 *
	 * @return string
	 */
	public function getFeGroup() {
		return $this->feGroup;
	}

	/**
	 * Get Fegroup
	 *
	 * @param string $feGroup fegroup
	 * @return void
	 */
	public function setFeGroup($feGroup) {
		$this->feGroup = $feGroup;
	}


	public function setTitle($title) {
	    $this->title = (string)$title;
	}

	public function setSgfText($sgftext) {
	    $this->sgftext = (string)$sgftext;
	}

	public function getTitle() {
	    return $this->title;
	}

	public function getSgfText() {
	    return $this->sgftext;
	}

	/**
	 * Get playDate
	 *
	 * @return DateTime
	 */
	public function getPlayDate() {
		return $this->playDate;
	}

	/**
	 * Set playDate
	 *
	 * @param DateTime $playdate playDate
	 * @return void
	 */
	public function setPlayDate($playdate) {
		$this->playDate = $playdate;
	}
	public function getWhite() {
		return $this->white;
	}

	public function setWhite($white) {
		$this->white = $white;
	}
	public function getBlack() {
		return $this->black;
	}

	public function setBlack($black) {
		$this->black = $black;
	}
	public function getType() {
		return $this->type;
	}

	public function setType($type) {
		$this->type = $type;
	}

    }
?>
