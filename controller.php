<?php defined('C5_EXECUTE') or die(_("Access Denied."));

class C5BootstrapAutonavPackage extends Package {

	protected $pkgHandle = 'c5-bootstrap-autonav';
	protected $pkgName = 'C5 Bootstrap Autonav';
	protected $pkgDescription = 'Adds a Bootstrap template for the core autonav block.';
	protected $appVersionRequired = '5.6.1'; //requires 5.6.1 due to copious use of the "h()" function
	protected $pkgVersion = '0.1';


	public function install() {
		$pkg = parent::install(); //this will automatically install our package-level db.xml schema for us (among other things)

		$this->installOrUpgrade($pkg);
	}

	public function upgrade() {
		$this->installOrUpgrade($this);
		parent::upgrade();
	}

	//Put most installation tasks here -- makes development easier
	// (just make sure the actions you perform are "non-destructive",
	//  for example, check if a page exists before adding it).
	private function installOrUpgrade($pkg) {
		//Frontend Blocktype:
		$this->getOrInstallBlockType($pkg, 'autonav');
	}


/*** UTILITY FUNCTIONS ***/

	private function getOrInstallBlockType($pkg, $btHandle) {
		$bt = BlockType::getByHandle($btHandle);
		if (empty($bt)) {
			BlockType::installBlockTypeFromPackage($btHandle, $pkg);
			$bt = BlockType::getByHandle($btHandle);
		}
		return $bt;
	}

}
