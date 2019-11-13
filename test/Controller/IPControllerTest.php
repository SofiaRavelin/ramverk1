<?php

namespace Anax\Ipcheck;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class IPCheckControllerTest extends TestCase
{

        /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;
        // Set di as global variable
        $this->di = new DIFactoryConfig();
        $di = $this->di;
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Use different cache dir for unit test
        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // Setup controllerclass
        $this->controller = new IPCheckController();
        $this->controller->setDI($this->di);
        $di->set("request", "\Anax\Request\Request");
    }

    /**
     * Test the route "index".
     */
    public function testIndexAction()
    {
        $this->di->get("request");
        // testa action.
        $res = $this->controller->indexAction();
        $this->assertIsObject($res);
        $this->assertInstanceOf("\Anax\Response\Response", $res);
    }

    public function testIndexActionPost()
    {
        $this->di->get("request")->setPost("ip", "208.67.222.222");
        $res = $this->controller->indexActionPost();
        $this->assertIsObject($res);
        $this->assertInstanceOf("\Anax\Response\Response", $res);
    }
}
