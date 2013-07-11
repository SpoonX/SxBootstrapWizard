<?php

$wizardPath = 'vendor/amoffat/bootstrap-application-wizard';

return array(
    'view_helpers'  => array(
        'invokables' => array(
            'sxbWizardAssets' => 'SxBootstrapWizard\View\Helper\WizardAssets',
        ),
        'factories'  => array(
            'sxbWizard' => 'SxBootstrapWizard\View\Helper\WizardFactory',
        ),
    ),
    'asset_manager' => array(
        'resolver_configs' => array(
            'map' => array(
                'css/bootstrap-wizard.css'   => $wizardPath . '/src/bootstrap-wizard.css',
                'js/bootstrap-wizard.js'     => $wizardPath . '/src/bootstrap-wizard.js',
                'js/bootstrap-wizard.min.js' => $wizardPath . '/src/bootstrap-wizard.min.js',
            ),
        ),
    ),
);
