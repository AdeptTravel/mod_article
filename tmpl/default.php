<?php

/**
 * Adept Article Module
 *
 * @author Brandon J. Yaniz (joomla@adept.travel)
 * @copyright 2016-2022 The Adept Traveler, Inc., All Rights Reserved.
 * @license BSD 2-Clause; See LICENSE.txt
 */

defined('_JEXEC') or die;

//\Joomla\CMS\Router\Route::_(ContentHelperRoute::getArticleRoute($item->id, $item->catid, $item->language, $params->get('article_layout', '')))
// ContentHelperRoute = \Joomla\Component\Content\Site\Helper\RouteHelper
// \Joomla\Component\Content\Site\Helper\RouteHelper

$link = \Joomla\CMS\Router\Route::_(
  \Joomla\Component\Content\Site\Helper\RouteHelper::getArticleRoute($item->id, $item->catid, $item->language)
);

echo '<article';
if (!empty($css = htmlspecialchars($params->get('cssClassSfx'), ENT_COMPAT, 'UTF-8'))) {
  echo 'class="yarticle' . $css . '">';
}
echo '>';


// Show article image
if ($params->get('showImage') !== 'off') {
  require \Joomla\CMS\Helper\ModuleHelper::getLayoutPath('mod_article', 'default_image');
}

// Show article informaiton
if ($params->get('showInfo')) {
  require \Joomla\CMS\Helper\ModuleHelper::getLayoutPath('mod_article', 'default_info');
}

// Show Title
if ($params->get('showTitle')) {
  echo '<' . $params->get('showTitleTag') . '>';

  if ($params->get('showTitleLink')) {
    echo '<a href="' . $link . '">';
  }

  echo $item->title;

  if ($params->get('showTitleLink')) {
    echo '</a>';
  }

  echo '</' . $params->get('showTitleTag') . '>';
}

// Show Content
if ($params->get('showContent') == 'intro') {
  // Show intro text
  echo '<div class="intro">' . $item->introtext . '</div>';

  // Show the readmore link
  if ($params->get('showReadMore', true)) {
    echo '<div class="readmore"><a href="' . $link . '">' . $params->get('textReadmore') . '</a></div>';
  }
} else if ($params->get('showContent') == 'full') {
  // Show full text
  echo '<div class="content">' . $item->fulltext . '</div>';
}

echo '</article>';
