<?php

 /**
 * Plugin FBComments
 *
 * @package FBComments
 * @version	1.0
 * @date	18/10/2016
 * @author	Cyril Frausti
 * @url		http://cfdev.fr
 * @license GPLV3
 
  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program. If not, see <http://www.gnu.org/licenses/>.
  
  facebook : https://developers.facebook.com/docs/plugins/comments/
  
 **/
 
class FBComments extends plxPlugin {
	private $moderatorID = ""; 
	private $numposts = "5";
	private $lang;

	/**
	 * Constructeur de la classe
	 *
	 * @param	default_lang	langue par défaut
	 * @return	stdio
	 * @author	cfdev
	 **/
	public function __construct($default_lang) {

		# appel du constructeur de la classe plxPlugin (obligatoire)
		parent::__construct($default_lang);
		# Droits pour accèder à la page config.php du plugin
		$this->setConfigProfil(PROFIL_ADMIN);
		
		$this->lang = $default_lang;
		# init du plugin
		$this->initconfiguration();
		
		# déclaration des hooks
		$this->addHook('ThemeEndHead', 'ThemeEndHead');
		$this->addHook('showFBComments', 'showFBComments');
		$this->addHook('showFBCommentsStatic', 'showFBCommentsStatic');
	}

		/**
	 * Méthode qui initialise les variables
	 *
	 * @author	cfdev
	 **/
	public function initconfiguration() {
		# Utilisation des shortcodes
		$this->setParam('spxshortcodes_shortcode', '1', 'string');	//Shortcode
		# get config
		if (plxUtils::strCheck($this->getParam('moderatorID'))=="") $this->setParam('moderatorID','','string');
		$this->moderatorID = $this->getParam('moderatorID');
		if (plxUtils::strCheck($this->getParam('numposts'))=="") $this->setParam('numposts','5','string');
		$this->numposts = $this->getParam('numposts');
	}
	
	/**
	 * Méthode qui affiche les meta pour la modération
	 *
	 * @return	stdio
	 * @author	cfdev
	 **/
	public function ThemeEndHead() {
		// <meta property="fb:admins" content="{YOUR_FACEBOOK_USER_ID}"/>
		echo '<meta property="fb:admins" content="'.$this->moderatorID.'" />';
	
	}
	
	/**
	 * Méthode qui affiche les boutons sociaux sur une page statique
	 *
	 * @return	stdio
	 * @author	cfdev
	 **/
	public function showFBComments() {
		global $plxShow;
		$mlang = $this->lang.'_'.strtoupper($this->lang);
		# Get plxShow return var
		ob_start();
		$plxShow->artUrl();
		$artUrl = ob_get_clean();
		
		$s= "\n".'
		<!-- Load Facebook SDK and language for JavaScript -->
		<div id="fb-root"></div>
		<script>
		(function(d, s, id) {
		 var js, fjs = d.getElementsByTagName(s)[0];
		 if (d.getElementById(id)) return;
		 js = d.createElement(s); js.id = id;
		 js.src = "//connect.facebook.net/'.$mlang.'/sdk.js#xfbml=1&version=v2.8";
		 fjs.parentNode.insertBefore(js, fjs);
		}(document, \'script\', \'facebook-jssdk\'));
		</script>
		
		<!-- FB comments -->
		<div class="fb-comments" data-href="'.$artUrl.'" data-numposts="'.$this->numposts.'"  data-width="100%"> </div>';
		
		return $s;	
	}

	/**
	 * Méthode qui affiche les boutons sociaux
	 *
	 * @return	stdio
	 * @author	cfdev
	 **/
	public function showFBCommentsStatic() {
		global $plxShow;
		$mlang = $this->lang.'_'.strtoupper($this->lang);
		# Get plxShow return var
		ob_start();
		$plxShow->staticUrl();
		$staticUrl = ob_get_clean();
	
		$s= "\n".'
		<!-- Load Facebook SDK and language for JavaScript -->
		<div id="fb-root"></div>
		<script>
		(function(d, s, id) {
		 var js, fjs = d.getElementsByTagName(s)[0];
		 if (d.getElementById(id)) return;
		 js = d.createElement(s); js.id = id;
		 js.src = "//connect.facebook.net/'.$mlang.'/sdk.js#xfbml=1&version=v2.8";
		 fjs.parentNode.insertBefore(js, fjs);
		}(document, \'script\', \'facebook-jssdk\'));
		</script>
		
		<!-- FB comments -->
		<div class="fb-comments" data-href="'.$staticUrl.'" data-numposts="'.$this->numposts.'"  data-width="100%"> </div> ';
		
		return $s;	
	}
}
?>

