<?php
/**
 * Part of the Phrame
 *
 * @package    Activerecord
 * @version    0.4.0
 * @author     Phrame Development Team
 * @license    MIT License
 * @copyright  2012 Phrame Development Team
 * @link       http://phrame.itworks.in.ua/
 */

namespace Phrame\Activerecord;

class Model extends \ActiveRecord\Model
{
    /**
     * Escapes and sets data
     * 
     * @param   $name   string  Field name
     * @param   $value  string  Field value
     * @return  void
     */
    public function __set($name, $value)
    {
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        parent::__set($name, $value);
    }

}
