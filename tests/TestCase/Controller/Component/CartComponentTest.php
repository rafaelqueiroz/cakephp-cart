<?php
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

namespace Cart\Test\TestCase\Controller\Component;

use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;
use Cart\Controller\Component\CartComponent;

/**
 * @author Rafael Queiroz <rafaelfqf@gmail.com>
 */
class CartComponentTest extends TestCase
{

    /**
     * @var \Cart\Controller\Component\CartComponent
     */
    public $Cart;

    /**
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $controller = new \Cake\Controller\Controller();
        $registry = new ComponentRegistry($controller);
        $this->Cart = new CartComponent($registry);
    }

    /**
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cart);
        parent::tearDown();
    }

    /**
     * @return void
     */
    public function testInitialization()
    {

    }

    /**
     * @return void
     */
    public function testAddInvalidItem()
    {
        $this->setExpectedException(\Exception::class);
        $this->Cart->add(new \Cake\ORM\Entity());
    }

    /**
     * @return void
     */
    public function testAddInvalidQuantity()
    {
        $this->setExpectedException(\Exception::class);
        $this->Cart->add(new \Cart\Entity\Item(), 'two');
    }

    /**
     * @return void
     */
    public function testAddDuplicateItem()
    {
        $this->setExpectedException(\Exception::class);

        $item = new \Cart\Entity\Item();
        $this->Cart->add($item);
        $this->Cart->add($item);
    }

    /**
     * @return void
     */
    public function testAdd()
    {
        $this->assertTrue($this->Cart->add(new \Cart\Entity\Item()));
    }

    /**
     * @return void
     */
    public function testEditItemNotFound()
    {
        $this->setExpectedException(\Exception::class);
        $this->Cart->edit(new \Cart\Entity\Item());
    }

    /**
     * @return void
     */
    public function testEdit()
    {
        $item = new \Cart\Entity\Item();
        $this->Cart->add($item);
        $this->assertTrue($this->Cart->edit($item, 5));
    }

    /**
     * @return void
     */
    public function testDeleteItemNotFound()
    {
        $this->setExpectedException(\Exception::class);
        $this->Cart->delete(new \Cart\Entity\Item());
    }

    /**
     * @return void
     */
    public function testDelete()
    {
        $item = new \Cart\Entity\Item();
        $this->Cart->add($item);
        $this->assertTrue($this->Cart->delete($item));
    }

}
