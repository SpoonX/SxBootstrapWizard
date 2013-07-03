# SxBootstrapWizard
A module that implements [this wizard plugin](https://github.com/amoffat/bootstrap-application-wizard).

Installation
------------
1. Add the following repository to your composer.json file:
    ```
    {
        "repositories": [
            {
                "type": "package",
                "package": {
                    "version": "dev-master",
                    "name": "amoffat/bootstrap-application-wizard",
                    "source": {
                        "url": "https://github.com/amoffat/bootstrap-application-wizard.git",
                        "type": "git",
                        "reference": "master"
                    }
                }
            }
        ]
    }
    ```
2. Add this module as a dependency through composer:
    `composer require spoonx/sxbootstrapwizard`
