# SxBootstrapWizard
A module that implements [this wizard plugin](https://github.com/amoffat/bootstrap-application-wizard).

Installation
------------
1. Add the following repository to your composer.json file:

    ```json
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

    ```bash
    composer require spoonx/sxbootstrapwizard
    # When asked for a version, type 1.*
    ```
