<?php
// Header for bootstrap theme
//
// webtrees: Web based Family History software
// Copyright (C) 2014 webtrees development team.
//
// This program is free software; you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
use WT\Auth;

if (!defined('WT_WEBTREES')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

// This theme uses the jQuery “colorbox” plugin to display images
$this
	->addExternalJavascript(WT_JQUERY_COLORBOX_URL)
	->addExternalJavascript(WT_JQUERY_WHEELZOOM_URL)
	->addExternalJavascript(WT_JQUERY_BOOTSTRAP)
	->addInlineJavascript('activate_colorbox();')
	->addInlineJavascript('jQuery.extend(jQuery.colorbox.settings, { width:"70%", height:"70%", transition:"none", slideshowStart:"'. WT_I18N::translate('Play').'", slideshowStop:"'. WT_I18N::translate('Stop').'", title: function() { var img_title = jQuery(this).data("title"); return img_title; } } );');

global $WT_IMAGES;
include "extras/extra.php";
?>
<!DOCTYPE html>
<html <?php echo WT_I18N::html_markup(); ?>>
<head>
	<meta charset="UTF-8"> 
	<title><?php echo WT_Filter::escapeHtml($title); ?></title> 
	<?php echo header_links($META_DESCRIPTION, $META_ROBOTS, $META_GENERATOR, $LINK_CANONICAL); ?> 
	<link rel="icon" href="<?php echo WT_CSS_URL; ?>favicon.png" type="image/png"> 
	
	<link href="<?php echo WT_THEME_URL; ?>dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo WT_THEME_URL; ?>dist/css/bootstrap-theme.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo WT_CSS_URL; ?>style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo WT_THEME_URL; ?>jquery-ui-1.10.3/jquery-ui-1.10.3.custom.css">
	
	
	<!--[if IE]> 
	<link rel="stylesheet" type="text/css" href="<?php echo WT_CSS_URL; ?>msie.css"> 
	<![endif]--> 
</head>
<body id="body">
	<?php if ($view!='simple') { ?>
	<header class="navbar navbar-fixed-top">
		<div class="navbar-inner">
    		<div class="container-fluid">
	        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		        </button>
		        <div class="navbar-header">
		          <h1><a href="index.php" class="navbar-brand"><?php echo WT_TREE_TITLE; ?></a></h1>
		        </div>
		        
	          	<div class="navbar-collapse collapse">
		          	<div class="div_search lfloat">
				        <form action="search.php" method="post" role="search">
				            <input type="hidden" name="action" value="general" />
				            <input type="hidden" name="topsearch" value="yes" />
				            <input type="search" name="query" id="searc-basic" placeholder="<?php echo WT_I18N::translate('Search'); ?>" dir="auto" />
				            <button type="submit" class="btn btn-primary" style="margin-top:-7px;"><span class="glyphicon glyphicon-search"></span></button>
				        </form>
				    </div>
			    
			            <div class="navbar-right">
			            	<?php
			            	if (WT_GED_ID && !$SEARCH_SPIDER && $WT_TREE->getPreference('ALLOW_THEME_DROPDOWN') ) {
			            	?>
				            	<div class="btn-group">
			                		<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><?php echo WT_I18N::translate('Theme'); ?><span class="caret"></span></button>
			          				<ul class="dropdown-menu">
			                			<?php echo Extra::getOptionsMenu("themes"); ?>
									</ul>
								</div>
							<?php 
							}
							?>
			            	<div class="btn-group">
		                		<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><?php echo WT_I18N::translate('Language'); ?><span class="caret"></span></button>
		          				<ul class="dropdown-menu">
		                			<?php echo Extra::getOptionsMenu("languages"); ?>
								</ul>
							</div>
					        <?php if (Auth::check()) { ?>
								<div class="btn-group">
									<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><?php echo WT_I18N::translate('User'); ?><span class="caret"></span></button>
					          		<ul class="dropdown-menu">
										<li><a href="edituser.php"><?php echo WT_I18N::translate('My account'); ?></a></li>
										<li><?php echo logout_link(); ?></li>
									</ul>
								</div>
							<?php } else { ?>
								<a href="login.php" class="btn btn-primary" style="color:white;">Login</a>
							<?php } ?>	   
			            </div>
        		</div><!--/.nav-collapse -->
    		</div>
		</div>
	</header>
	<div class="navbar">
		<div class="navbar-text">
			<div class="container">
				<nav id="topMenu">
					<ul id="main-menu" role="menubar">
						<?php 
						echo WT_MenuBar::getGedcomMenu();
						echo WT_MenuBar::getMyPageMenu();
						echo WT_MenuBar::getChartsMenu();
						echo WT_MenuBar::getListsMenu();
						echo WT_MenuBar::getCalendarMenu();
						echo WT_MenuBar::getReportsMenu();
						echo WT_MenuBar::getSearchMenu();
						echo implode('', WT_MenuBar::getModuleMenus()); ?>
					</ul>
				</nav>
	    	</div>
	    </div>
	</div><!-- /.navbar -->
	<?php }
	echo WT_FlashMessages::getHtmlMessages(); ?>
	<main id="content">
