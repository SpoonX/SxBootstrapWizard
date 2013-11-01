<?php

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
                'css/bootstrap-wizard.css'   => __DIR__ . '/../assets/css/bootstrap-wizard.css',
                'js/bootstrap-wizard.js'     => __DIR__ . '/../assets/js/bootstrap-wizard.js',
            ),
        ),
    ),
);
