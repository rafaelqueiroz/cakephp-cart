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

namespace Cart\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * @author Rafael Queiroz <rafaelfqf@gmail.com>
 */
class CartHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * @var array
     */
    public $helpers = ['Form'];

    /**
     * @param $entity
     * @param string $title
     * @return string
     */
    public function buy($entity, $title = "Buy")
    {
        $form  = $this->Form->create(null, ['url' => ['controller' => 'Cart', 'action' => 'add'], 'type' => 'post']);
        $form .= $this->Form->controll('quantity', ['value' => 1]);
        $form .= $this->Form->controll('id', ['value' => $entity->id, 'type' => 'hidden']);
        $form .= $this->Form->button(__($title));
        $form .= $this->Form->end();

        return $form;
    }

}