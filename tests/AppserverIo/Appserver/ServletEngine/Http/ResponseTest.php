<?php

/**
 * AppserverIo\Appserver\ServletEngine\Http\ResponseTest
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/appserver
 * @link      http://www.appserver.io
 */

namespace AppserverIo\Appserver\ServletEngine\Http;

use AppserverIo\Http\HttpProtocol;

/**
 * Test for the response implementation.
 *
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/appserver
 * @link      http://www.appserver.io
 */
class ResponseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The response instance to test.
     *
     * @var \AppserverIo\Appserver\ServletEngine\Http\Response
     */
    protected $response;

    /**
     * Initializes the response instance to test.
     *
     * @return void
     */
    public function setUp()
    {
        $this->response = new Response();
    }

    /**
     * Tests the redirect method with default status code.
     *
     * @return void
     */
    public function testRedirectWithDefaultStatusCode()
    {
        $this->response->redirect($url = 'http://test.local');
        $this->assertSame($url, $this->response->getHeader(HttpProtocol::HEADER_LOCATION));
        $this->assertSame(301, $this->response->getStatusCode());
    }

    /**
     * Tests the redirect method with custom status code.
     *
     * @return void
     */
    public function testRedirectWithCustomStatusCode()
    {
        $this->response->redirect($url = 'http://test.local', $code = 302);
        $this->assertSame($url, $this->response->getHeader(HttpProtocol::HEADER_LOCATION));
        $this->assertSame($code, $this->response->getStatusCode());
    }
}
