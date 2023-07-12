<?php
/**
 * YArticle Module
 *
 * @author Brandon J. Yaniz (brandon@yaniz.co)
 * @copyright 2016-2019 Yaniz Corporation, All Rights Reserved.
 * @license BSD 2-Clause; See LICENSE.txt
 */

defined('_JEXEC') or die;

$images = new JRegistry($item->images);

echo '<div class="image"><img';

if ($params->get('showImage') == 'intro' && !empty($images['image_intro'])) {
  echo ' src="' . $images['image_intro'] . '"';
  echo ' alt="' . $images['image_intro_alt'] . '"';
} else if ($params->get('showImage') == 'full' && !empty($images['image_fulltext'])) {
  echo ' src="' . $images['image_fulltext'] . '"';
  echo ' alt="' . $images['image_fulltext_alt'] . '"';
}

echo ' /></div>';
