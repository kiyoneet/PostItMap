<?php

/**
 * PostItMapApplication.
 *
 * @author y.takai
 */
class PostItMapApplication extends Application
{
    protected $login_action = array('account', 'signin');

    public function getRootDir()
    {
        return dirname(__FILE__);
    }

    protected function registerRoutes()
    {
        return array(
            '/'
                => array('controller' => 'menu', 'action' => 'index'),
            '/menu/post'
                => array('controller' => 'menu', 'action' => 'post'),
            '/user/:email_address'
                => array('controller' => 'menu', 'action' => 'user'),
            '/user/:email_address/menu/:id'
                => array('controller' => 'menu', 'action' => 'show'),
            '/account'
                => array('controller' => 'account', 'action' => 'index'),
            '/account/:action'
                => array('controller' => 'account'),
            '/follow'
                => array('controller' => 'account', 'action' => 'follow'),
        );
    }

    protected function configure()
    {
        $this->db_manager->connect('master', array(
            'dsn'      => 'mysql:dbname=postItMap;host=localhost',
            'user'     => 'root',
            'password' => '',
        ));
    }
}
