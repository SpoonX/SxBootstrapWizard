<?php
namespace SxBootstrapWizard\View\Helper;

use SxBootstrap\View\Helper\Bootstrap\AbstractElementHelper;
use SxCore\Html\HtmlElement;
use Zend\View\Model\ViewModel;
use Zend\View\Resolver\AggregateResolver;

/**
 * ViewHelper to add dependencies to the head.
 * This WILL use the headScript and headLink helpers.
 */
class Wizard extends AbstractElementHelper
{

    /**
     * @var array
     */
    protected $cards = array();

    /**
     * @var AggregateResolver
     */
    protected $resolver;

    /**
     * @param AggregateResolver $aggregateResolver
     *
     * @return $this
     */
    public function setResolver(AggregateResolver $aggregateResolver)
    {
        $this->resolver = $aggregateResolver;

        return $this;
    }

    /**
     * @param string $label
     * @param null   $identifier
     *
     * @return Wizard
     */
    public function __invoke($label, $identifier = null)
    {
        $this->setElement(new HtmlElement);

        $this->getElement()->addClass('wizard')->spawnChild('h1')->setContent($this->translate($label));

        if (null !== $identifier) {
            $this->getElement()->addAttribute('id', (string) $identifier);
        }

        return clone $this;
    }

    /**
     * @param null|string           $label
     * @param null|string|ViewModel $content null for no content, string for string content or path to view file.
     * @param null|string           $cardName
     *
     * @return $this
     */
    public function addCard($label = null, $content = null, $cardName = null)
    {
        if (null === $cardName) {
            $cardName = null === $label ? 'card' . count($this->getElement()->getChildren()) : $label;
        }

        $card                   = new HtmlElement;
        $this->cards[$cardName] = $card;

        if (null !== $content) {
            // Make sure that the content supplied, will be rendered after the h3 tag
            $card->setAppendContent()->setContent($this->renderContent($content));
        }

        if (null !== $label) {
            $card->spawnChild('h3')->setContent($this->translate($label));
        }

        $card->addAttribute('data-cardname', $cardName)->addClass('wizard-card');

        return $this;
    }

    /**
     * @param string $type
     * @param mixed  $content
     *
     * @return $this
     */
    public function addSubmitCard($type, $content)
    {
        $card          = new HtmlElement;
        $this->cards[] = $card;

        $card->addClass('wizard-' . $type)->setContent($this->renderContent($content));

        return $this;
    }

    /**
     * @param mixed $content
     *
     * @return $this
     */
    public function setLoadingCard($content)
    {
        return $this->addSubmitCard('loading', $content);
    }

    /**
     * @param mixed $content
     *
     * @return $this
     */
    public function setErrorCard($content)
    {
        return $this->addSubmitCard('error', $content);
    }

    /**
     * @param $content
     *
     * @return $this
     */
    public function setSuccessCard($content)
    {
        return $this->addSubmitCard('success', $content);
    }

    /**
     * @param mixed $content
     *
     * @return $this
     */
    public function setFailureCard($content)
    {
        return $this->addSubmitCard('failure', $content);
    }

    /**
     * @return string
     */
    public function render()
    {
        $this->getElement()->addChildren($this->cards);

        return parent::render();
    }

    /**
     * @param string $cardName
     *
     * @return HtmlElement|null
     */
    public function getCard($cardName)
    {
        return !empty($this->cards[$cardName]) ? $this->cards[$cardName] : null;
    }

    /**
     * @param string|ViewModel $content
     *
     * @return string
     */
    protected function renderContent($content)
    {
        if ($content instanceof ViewModel) {
            return $this->getView()->render($content);
        }

        $content = (string) $content;
        $path    = $this->resolver->resolve($content);

        if (false !== $path) {
            $partialPlugin = $this->getView()->plugin('partial');

            return $partialPlugin($content);
        }

        return $content;
    }
}
