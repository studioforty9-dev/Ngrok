<?php

/**
 * @author https://github.com/EObukhovsky
 */
class Studioforty9_Ngrok_Model_Session extends Mage_Core_Model_Session
{
    /**
     * Skip form key validation on adminhtml login
     *
     * @param null|string $formKey
     * @return bool
     */
    public function validateFormKey($formKey)
    {
        if (false === strpos($_SERVER['HTTP_X_ORIGINAL_HOST'], 'ngrok.io')
            && debug_backtrace()[1]['function'] == 'actionPreDispatchAdmin') {
            return true;
        }
        return parent::validateFormKey($formKey);
    }
}
