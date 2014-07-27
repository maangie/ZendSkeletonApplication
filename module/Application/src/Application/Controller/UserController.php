<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{
    public function addAction()
    {
        // ビューへ渡す値を連想配列にて定義
        $values = array(
            'key1' => 'value1',
            'key2' => 'value2',
        );

        $view = new ViewModel($values);

        $this->layout('layout/layout.phtml'); // 使用するレイアウトを指定

        return $view;
    }
}
