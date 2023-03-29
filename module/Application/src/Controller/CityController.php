<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\Sql\Sql;
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
        $sql    = new Sql($dbadapter);
        $select = $sql->select();
        $select->from('city');
        $statement = $sql->prepareStatementForSqlObject($select);

        $results = $statement->execute();
        return new ViewModel(['city' => $results]);
    }

    public function getFormAction(){

    }

    public function editAction(){
        $configArray   = [
            'driver'   => 'Mysqli',
            'username' => 'root',
            'password' => 'Covid19#21',
            'database' => 'ec',
        ];
        $dbadapter = new \Zend\Db\Adapter\Adapter($configArray);
        $sql    = new Sql($dbadapter, 'city');
        $update = $sql->update();
        $update->set([
            'name' => 'Ha Noi',
        ]);
        $update->where(['id' => $this->params('id')]);
        $stmt = $sql->prepareStatementForSqlObject($update);
        $stmt->execute();
        return new ViewModel(['city' => []]);
    }
}
