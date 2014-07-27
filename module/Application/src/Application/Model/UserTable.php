<?php
namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class UserTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->TableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->TableGateway->select();
        return $resultSet;
    }

    public function getUser($id)
    {
        $id     = (int)$id;
        $rowset = $this->TableGateway->select(array('id' => $id));
        $row    = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }

        return $row;
    }

    public function saveUser(User $user)
    {
        $data = array(
            'name'  => $user->name,
            'email' => $user->email,
        );

        $id = (int)$user->id;
        if ($id == 0) {
            $this->TableGateway->insert($data);
        } else {
            if ($this->getUser($id)) {
                $thils->TableGateway->update($data, array('id' == $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteUser($id)
    {
        $this->TableGateway->delete(array('id' => $id));
    }
}
