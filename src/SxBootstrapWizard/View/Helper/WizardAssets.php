<?php
namespace SxBootstrapWizard\View\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * ViewHelper to add dependencies to the head.
 * This WILL use the headScript and headLink helpers.
 */
class WizardAssets extends AbstractHelper
{

    /**
     * @return $this
     */
    public function __invoke()
    {
        return $this;
    }

    /**
     * @param boolean $append
     *
     * @return $this
     */
    public function add($append = true)
    {
        $append = (bool) $append;

        $this->addCss($append);
        $this->addJs($append);

        return $this;
    }

    /**
     * @param boolean $append
     *
     * @return $this
     */
    public function addJs($append = true)
    {
        $scriptHelper = $this->getView()->plugin('head_script');
        $baseHelper   = $this->getView()->plugin('base_path');
        $method       = $append ? 'appendFile' : 'prependFile';

        $scriptHelper->$method($baseHelper('/js/bootstrap-wizard.js'));

        return $this;
    }

    /**
     * @param boolean $append
     *
     * @return $this
     */
    public function addCss($append = true)
    {
        $linkHelper = $this->getView()->plugin('head_link');
        $baseHelper = $this->getView()->plugin('base_path');
        $method     = $append ? 'appendStylesheet' : 'prependStylesheet';

        $linkHelper->$method($baseHelper('/css/bootstrap-wizard.css'));

        return $this;
    }
}
