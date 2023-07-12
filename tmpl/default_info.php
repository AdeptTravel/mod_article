<?php
/**
 * YArticle Module
 *
 * @author Brandon J. Yaniz (brandon@yaniz.co)
 * @copyright 2016-2019 Yaniz Corporation, All Rights Reserved.
 * @license BSD 2-Clause; See LICENSE.txt
 */

defined('_JEXEC') or die;

$info = array();

$dateFormat = $params->get('showInfoDateFormat');

if ($params->get('showInfoDateCreated', false)) {
  $info[] = array('css' => 'dateCreated',
                  'title' => 'Created',
                  'value' => date($dateFormat, strtotime($item->created)));
}

if ($params->get('showInfoDatePublished', false)) {
  $info[] = array('css' => 'datePublished',
                  'title' => 'Published',
                  'value' => date($dateFormat, strtotime($item->publish_up)));
}

if ($params->get('showInfoDateModified', false)) {
  $info[] = array('css' => 'dateModified',
                  'title' => 'Modified',
                  'value' => date($dateFormat, strtotime($item->modified)));
}

if ($params->get('showInfoCategoryParent', false)) {
  $info[] = array('css' => 'categoryParent',
                  'title' => 'Parent Category',
                  'value' => $item->parent_title);
}

if ($params->get('showInfoCategory', false)) {
  $info[] = array('css' => 'category',
                  'title' => 'Category',
                  'value' => $item->category_title);
}

if ($params->get('showInfoCategoryAuthor', false)) {
  $info[] = array('css' => 'author',
                  'title' => 'Author',
                  'value' => $item->author);
}

// Info tag
if ($params->get('showInfoContainer')) {
  echo "<" . $params->get('showInfoContainerTag');

  if (!empty($params->get('showInfoContainerCss'))) {
     echo ' class="' . $params->get('showInfoContainerCss') . '"';
  }

  echo '>';
}

$itemParentTag="";
$itemTag = "";

if ($params->get('showInfoAs') == 'ol') {
  $itemParentTag="ol";
  $itemTag = "li";
} else if ($params->get('showInfoAs') == 'ul') {
  $itemParentTag="ul";
  $itemTag = "li";
} else if ($params->get('showInfoAs') == 'dl') {
  $itemParentTag="dl";
  $itemTag = "dd";
} else if ($params->get('showInfoAs') == 'span') {
  $itemTag = "span";
} else if ($params->get('showInfoAs') == 'div') {
  $itemTag = "div";
}

$delimter = '';

if ( $itemTag == 'span') {
  $delimter = $params->get('showInfoAsDelimiter');
}

if (!empty($itemParentTag)) {
  echo '<' . $itemParentTag . '>';
}

for ($i = 0; $i < count($info); $i++) {
  if ($itemTag == 'dd') {
    echo '<dd class="' . $info[$i]['css'] . '">' . $info[$i]['title'] . '</dd>';
  }

  echo '<' . $itemTag . ' class="' . $info[$i]['css'] . '">' . $info[$i]['value'] . '</' . $itemTag . '>';

  if (!empty($delimter) && $i < count($info) - 1) {
    echo $delimter;
  }
}

unset($info);

if (!empty($itemParentTag)) {
  echo '</' . $itemParentTag . '>';
}

// Close info tag
if ($params->get('showInfoContainer')) {
  echo '</' . $params->get('showInfoContainerTag') . '>';
}
