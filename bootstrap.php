<?php
/**
 * Part of the Phrame
 *
 * @package    Activerecord
 * @version    0.3.0
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
     * @param   Core\Application  $app  Application object
     * @return  void
     */
    public static function init($app = null)
    {
        $app = $app ?: Core\Application::instance();

        include_once 'vendor/ActiveRecord.php';

        $config = new Core\Config('activerecord', $app, 'phrame/activerecord');
        $connection_string = $config->connection;

        if ( ! empty($connection_string))
        {
            $cfg = \ActiveRecord\Config::instance();
            $cfg->set_model_directory(APPLICATIONS_PATH.'/'.$app->name.'/models');
            $cfg->set_connections(
                array(
                    'development' => $connection_string
                )
            );
        }        
    }

}
