<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\User;

class UserController extends AbstractActionController
{
    protected $userTable;

    public function addAction()
    {
        // 新規ユーザの追加
        $user = new User();
        $user->name = 'testName';
        $user->email = 'testEmail';
        $this->getUserTable()->saveUser($user);

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

    /* ユーザテーブルを取得 */
    public function getUserTable()
    {
        if (!$this->userTable) {
            $sm = $this->getServiceLocator();
            $this->UserTable = $sm->get('Application\Model\UserTable');
        }

        return $this->UserTable;
    }
}
