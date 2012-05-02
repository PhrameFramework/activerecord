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

use Phrame\Core;

class Bootstrap
{
    /**
     * Loads and initializes package
     * 
     * @param   string  $app_name  Application name
     * @return  void
     */
    public static function init($app_name = null)
    {
        include_once 'vendor/ActiveRecord.php';

        $config = new Core\Config('activerecord', $app_name, 'phrame/activerecord');
        $connection_string = $config->connection;

        if ( ! empty($connection_string))
        {
            $cfg = \ActiveRecord\Config::instance();
            $cfg->set_model_directory(APPLICATIONS_PATH.'/'.$app_name.'/models');
            $cfg->set_connections(
                array(
                    $app_name => $connection_string
                ),
                $app_name
            );
        }        
    }

}
