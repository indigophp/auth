<?php
/**
 * @package    Fuel\Auth
 * @version    2.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2014 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Fuel\Auth\Persistence;

use Fuel\Session\Manager;
use Fuel\Auth\AuthException;

/**
 * Auth Persistence session driver class
 *
 * @package Fuel\Auth
 *
 * @since 2.0.0
 */
class Session extends Base
{
    /**
     * @var Manager
     */
    protected $manager;

    /**
     * @var string
     */
    protected $sessionKey;

    /**
     * @param Manager $manager
     * @param string  $sessionKey
     */
    public function __construct(Manager $manager, $sessionKey = 'auth')
    {
        $this->manager = $manager;
        $this->sessionKey = $sessionKey;
    }

    /**
     * {@inheritdoc}
     */
    public function get($key)
    {
        return $this->manager->get($this->sessionKey.'.'.$key);
    }

    /**
     * {@inheritdoc}
     */
    public function set($key, $value)
    {
        $this->manager->set($this->sessionKey.'.'.$key, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($key)
    {
        return $this->manager->delete($this->sessionKey.'.'.$key);
    }
}
