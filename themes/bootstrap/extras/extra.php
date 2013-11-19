<?php 
class Extra {
	public static function  getNewLanguageMenu() {
		global $SEARCH_SPIDER;
		$html='';
		if ($SEARCH_SPIDER) {
			return null;
		} else {
			$menu=new WT_Menu(WT_I18N::translate('Language'), '#', 'menu-language');

			foreach (WT_I18N::installed_languages() as $lang=>$name) {
				$submenu=new WT_Menu($name, get_query_url(array('lang'=>$lang), '&amp;'), 'menu-language-'.$lang);
				if (WT_LOCALE == $lang) {$submenu->addClass('','','btn disabled');} // future implementation
				$html.=$submenu->getMenuAsList();
			}
			return $html;
		}
	}
}
	?>