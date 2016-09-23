<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17.02.2016
 * Time: 10:37
 */
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Class that adds the wizard icon.
 */
class AsYahooFinanceWizicon {

    /**
     * Processing the wizard items array
     *
     * @param array $wizardItems : The wizard items
     * @return Modified array with wizard items
     */
    function proc( $wizardItems ) {

        $wizardItems['plugins_tx_asyahoofinance_yahooplugin'] = array(
            'icon' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('as_yahoofinance') . 'Resources/Public/Icons/wizard_icon.png',
            'title' => LocalizationUtility::translate('plugin_label', 'as_yahoofinance'),
            'description' => LocalizationUtility::translate('plugin_value', 'as_yahoofinance'),
            'params' => '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=asyahoofinance_yahooplugin'
        );

        return $wizardItems;
    }

}