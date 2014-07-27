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

        // 使用するビューを指定
        $view->setTemplate('/application/index/index.phtml');

        $view->setTerminal(true); // レイアウト機能を無効

        return $this->getResponse(); // レスポンスを指定してビューの出力を無効
    }
}
