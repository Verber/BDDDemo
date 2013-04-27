<?php
use Behat\Behat\Context\BehatContext;
use Behat\Gherkin\Node\PyStringNode;

use Behat\Mink\Mink,
    Behat\Mink\Session,
    Behat\Mink\Driver\Selenium2Driver,
    Behat\MinkExtension\Context\MinkContext;

//require_once 'PHPUnit/Autoload.php';
//require_once 'PHPUnit/Framework/Assert/Functions.php';

class GuiContext extends MinkContext
{

    /**
     * Waits n seconds
     * @When /^I wait (\d+) second(s)?$/
     */
    public function waitSeconds($seconds)
    {
        $this->getSession()->wait(1000*$seconds);
    }

    /**
     * @Given /^I click "([^"]*)" element$/
     */
    public function iClick($locator)
    {
        $element = $this->getSession()->getPage()->find('css', $locator);
        if (null === $element) {
            throw new ElementNotFoundException(
                $this->getSession(), 'css', $locator
            );
        }

        $element->click();
    }



}
