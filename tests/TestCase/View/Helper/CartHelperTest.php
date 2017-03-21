<?php
namespace Cart\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Cart\View\Helper\CartHelper;

/**
 * Cart\View\Helper\CartHelper Test Case
 */
class CartHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Cart\View\Helper\CartHelper
     */
    public $Cart;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Cart = new CartHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cart);
        parent::tearDown();
    }

    public function testBuy()
    {
        $item = new \Cart\Entity\Item();
        $item->id = 4;

        $result = $this->Cart->buy($item);

        $this->assertContains('<form method="post" accept-charset="utf-8" action="/cart/add">', $result);
        $this->assertContains('<input type="hidden" name="id" value="4"/>', $result);
        $this->assertContains('</form>', $result);    
    }
}
