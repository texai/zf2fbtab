<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {

    public function indexAction() {
        return new ViewModel();
    }

    public function fbAction() {

        include_once 'vendor/facebook-php-sdk/facebook.php';

        $config = array(
            'appId' => '74934377537',
            'secret' => 'c4040a2ecd2739921493816a9edc2e46',
            'fileUpload' => false, // optional
            'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
        );

        $facebook = new \Facebook($config);
        $u = $facebook->getLoginUrl();

        $view = new ViewModel();
        $view->fb = $facebook;
        $view->u = $u;
        
        return $view;
    }

}
