<?php

/**
 * Article Module
 *
 * @author Brandon J. Yaniz (joomla@adept.travel)
 * @copyright 2022 The Adept Traveler, Inc., All Rights Reserved.
 * @license BSD 2-Clause; See LICENSE.txt
 */

defined('_JEXEC') or die;

//\Joomla\Component\Content\Site\Helper\RouteHelper
//JLoader::register('ContentHelperRoute', JPATH_SITE . '/components/com_content/helpers/route.php');
//JLoader::register('modYArticleHelper', dirname(__FILE__) . '/helper.php');

if (!empty($id = $params->get('articleId'))) {
  //$model = \Joomla\CMS\Controller::getInstance('Content')->getModel('Article');
  //$model = \Joomla\CMS\MVC\Controller\BaseController::getInstance('Content')->getModel('Article');
  //$item = $model->getItem($id);
  $model = new \Joomla\Component\Content\Site\Model\ArticleModel();
  $item = $model->getItem($id);

  if (!empty($item)) {
    $cssClassSfx = htmlspecialchars($params->get('cssClassSfx'), ENT_COMPAT, 'UTF-8');
    require \Joomla\CMS\Helper\ModuleHelper::getLayoutPath('mod_article', $params->get('layout', 'default'));
  }
}
