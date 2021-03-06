<?php

namespace Slub\SlubFindExtend\ViewHelpers\Data;


class OrderedArrayToKvViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper  {

    /**
     * Combines ordered Keys and values to kv. Possible to translate.
     *
     * @param array $array
     * @param boolean $translate
     * @param string $translatekey
     * @param string $translatekeyextension
     * @return array
     */
    public function render($array = NULL, $translate = FALSE, $translatekey = '', $translatekeyextension = '') {

		$result = [];

		if ($array === NULL) {
			$array = $this->renderChildren();
		}

		if(count($array) === 0) {
			return [];
		}

		foreach ($array as $key => $value) {

			$innerresult = [];
			$innerkey = '';
			$isKey = TRUE;

			$keyValue = ($translate) ?  \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($translatekey.$key, $translatekeyextension) : $key;
			if(strlen($keyValue) === 0) $keyValue = $key;

			foreach ($value as $innervalue) {

				if ($isKey === TRUE) {
					$innerkey = $innervalue;
					$isKey = FALSE;
				} elseif ($isKey === FALSE) {

					$innerkeyValue = ($translate) ?  \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($translatekey.$key.'.'.$innerkey, $translatekeyextension) : $innerkey;
					if(strlen($innerkeyValue) === 0) $innerkeyValue = $innerkey;
					$innerresult[$innerkeyValue] = $innervalue;
					$isKey = TRUE;
				}

			}

			$result[$keyValue] = $innerresult;

		}

		return $result;
    }

}
