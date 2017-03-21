<?php
namespace Cart\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Cart helper
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