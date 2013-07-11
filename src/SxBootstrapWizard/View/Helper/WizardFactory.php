<?php
namespace SxBootstrapWizard\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class WizardFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return Wizard
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $wizard = new Wizard();

        return $wizard->setResolver($serviceLocator->getServiceLocator()->get('Zend\View\Resolver\AggregateResolver'));
    }
}
