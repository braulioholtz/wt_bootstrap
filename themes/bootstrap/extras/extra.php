<?php 
class Extra {
	public static function  getOptionsMenu($type) {
		global $SEARCH_SPIDER;
		$html='';
		if ($type=="languages") {
			if ($SEARCH_SPIDER) {
				return null;
			} else {
				$menu=new WT_Menu(WT_I18N::translate('Language'), '#', 'menu-language');
	
				foreach (WT_I18N::installed_languages() as $lang=>$name) {
					$submenu=new WT_Menu($name, get_query_url(array('lang'=>$lang), '&amp;'), 'menu-language-'.$lang);
					if (WT_LOCALE == $lang) {$submenu->addClass('','','btn disabled');} // future implementation
					$html.=$submenu->getMenuAsList();
				}
			}
		}
		if ($type=="themes") {
			$menu=new WT_Menu(WT_I18N::translate('Theme'), '#', 'menu-theme');
			foreach (get_theme_names() as $themename=>$themedir) {
				$submenu=new WT_Menu($themename, get_query_url(array('theme'=>$themedir), '&amp;'), 'menu-theme-'.$themedir);
				if (WT_THEME_DIR == 'themes/'.$themedir.'/') {$submenu->addClass('','','btn disabled');}
				$html.=$submenu->getMenuAsList();
			}
		}
		return $html;
	}
}
	?>