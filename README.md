# SxBootstrapWizard
A twitter   bootstrap wizard.

Installation
------------
1. Add the dependency to your composer.json file:

```bash
    "require": {
        "spoonx/sxbootstrapwizard": "0.1.*"
    }
```

## Usage

Here's a simple example:

### php (view)
```php
<?php

// Add the assets
$this->sxbWizardAssets()->add();

// The title to show. (Automatically translated, whenever a translator is available).
$title  = 'My dialog!';

// The ID needed to reference your wizard later on
$id = 'my-wizard';

// Create a new wizard instance
$wizard = $this->sxbWizard($title, $id);

/* Add a card.
 *
 * $label       The label for the card. (Automatically translated, whenever a translator is available).
 *
 * $content     The content for the card. Allowed types are:
 *                  - ViewModel
 *                  - /path/to/view (will be resolved, and loaded using partial helper)
 *                  - string
 *
 * $cardName    The name of the card (used in the front-end)
 */
$wizard->addCard($label, $viewModel, $cardName);

echo $wizard
```

### Javascript
```js
var options = {},
    wizard  = $("#my-wizard").wizard(options);

wizard.show();
```

## Questions / support
If you're having trouble with the module there are a couple of resources that might be of help.
* [RWOverdijk at irc.freenode.net #zftalk.dev](http://webchat.freenode.net?channels=zftalk.dev%2Czftalk&uio=MTE9MTAz8d)
* [Issue tracker](https://github.com/SpoonX/SxBootstrapWizard/issues). (Please try to not submit unrelated issues).
* By [mail](mailto:r.w.overdijk@gmail.com?Subject=SxBootstrapWizard%20help)
* The documentation (javascript) [found here](http://www.panopta.com/2013/02/06/bootstrap-application-wizard/#wizard-class.errorPopover)
