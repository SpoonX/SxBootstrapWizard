<?php
namespace SxBootstrapWizard\View\Helper\Wizard;

class Card
{
    protected $cardName;

    public function __construct($cardName)
    {
        $this->cardName = $cardName;
    }
}
