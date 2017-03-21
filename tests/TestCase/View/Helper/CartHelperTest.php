<?php
namespace Cart\Test\TestCase\View\Helper;
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Cart\View\Helper\CartHelper;

/**
 * @author Rafael Queiroz <rafaelfqf@gmail.com>
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
