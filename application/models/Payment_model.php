<?php
use GroceryCrud\Core\Model;

use Zend\Db\Sql\Sql;

class Payment_model extends Model
{
	protected $ci;
    protected $db;

    function __construct($databaseConfig) {
        $this->setDatabaseConnection($databaseConfig);

        $this->ci = & get_instance();
        $this->db = $this->ci->db;
    }

	public function updateFieldsAfterCreate ($insertId)
	{
		if (!is_numeric($insertId)) {
            return false;
        }

        $sql = new Sql($this->adapter);
        $select = $sql->select();
        $select->where(['id = ?' => $insertId]);
        $select->from('payments');

        $row = $this->getRowFromSelect($select, $sql);

        if ($row === null) {
            return false;
        }

		$sql = new Sql($this->adapter);
		$update = $sql->update('payments');
		$update->where([
    	'id = ?' => $insertId,
		]);
		$update->set([
    	'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s'),
		'status' => 'Pending'
		]);

	$statement = $sql->prepareStatementForSqlObject($update);
	return $statement->execute();

	}
}
