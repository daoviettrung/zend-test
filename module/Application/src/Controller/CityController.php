<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CityController extends AbstractActionController
{
    public function indexAction()
    {
        $configArray   = [
            'driver'   => 'Mysqli',
            'username' => 'root',
            'password' => 'Covid19#21',
            'database' => 'ec',
        ];
        $dbadapter = new \Zend\Db\Adapter\Adapter($configArray);
        $query = "select * from city";
        $results = $dbadapter->query($query,
            \Zend\Db\Adapter\Adapter::QUERY_MODE_EXECUTE);
        $city = [];
        foreach ($results as $item) {
            $city[] = $item;
        }
        return new ViewModel(['city' => $city]);
    }

    public function editAction(){
        die($this->params('id'));
    }
}
