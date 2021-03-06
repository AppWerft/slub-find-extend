<?php

namespace Slub\SlubFindExtend\ViewHelpers\Format;

class ReplaceViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper  {

	/**
	 * Replaces chars inside content
	 *
	 * @param string $content
	 * @param string $needle
	 * @param string $replace
	 * @return string
	 */
	public function render($content = NULL, $needle = NULL, $replace = NULL) {
		if ($content === NULL) {
			$content = $this->renderChildren();
		}

		if ($content && $needle && $replace && (strlen($content) > 0) && (strlen($needle) > 0) && (strlen($replace) > 0)){
			return str_replace($needle, $replace, $content);
		} else {
			return '';
		}
	}

}
