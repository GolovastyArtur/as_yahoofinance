<?php

class asyahoofinance_itemsProcFunc
{


    /**
     * Get the defined styles by pagesetup
     * @param array $config
     * @param array $item
     */
    public function getStyle($config, $item) {
        $allStyles = array(
            array(
                $GLOBALS['LANG']->sL('LLL:EXT:as_yahoofinance/Configuration/FlexForms/locallang_db.xml:tt_content.as_yahoofinance.style.I.0'),
                'chart',
                'EXT:jfmulticontent/selicon_tt_content_tx_jfmulticontent_style_0.gif',
            ),
            array(
                $GLOBALS['LANG']->sL('LLL:EXT:as_yahoofinance/Configuration/FlexForms/locallang_db.xml:tt_content.as_yahoofinance.style.I.1'),
                'nochart',
                'EXT:jfmulticontent/selicon_tt_content_tx_jfmulticontent_style_3.gif',
            ),


        );
        $confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['as_yahoofinance']);
        $styles = $confArr['style.'];
        if (count($styles) > 0) {
            foreach ($styles as $key => $val) {
                if ($val) {
                    $availableStyles[] = $key;
                }
            }
        }

        if (count($availableStyles) < 1) {
            $availableStyles = array('chart','nochart');
        }

        $allowedStyles = array();
        foreach ($allStyles as $key => $style) {
            if (in_array(trim($style[1]), $availableStyles)) {
                $allowedStyles[] = $style;
            }
        }
        $pageTS = \TYPO3\CMS\Backend\Utility\BackendUtility::getPagesTSconfig($config['row']['pid']);
        $as_yahoofinance = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(",", $pageTS['mod.']['as_yahoofinance.']['availableStyles'], TRUE);
        $optionList = array();
        if (count($as_yahoofinance) > 0) {

            foreach ($allowedStyles as $key => $style) {
                if (in_array(trim($style[1]), $as_yahoofinance)) {
                    $optionList[] = $style;
                }
            }
        } else {

            $optionList = $allowedStyles;
        }
        $config['items'] = array_merge($config['items'], $optionList);

        return $config;
    }


}
