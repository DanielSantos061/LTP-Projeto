
<?php

require_once __DIR__ . '/../../config/Database.php';

abstract class Model
{
    protected $db;
    protected $table;
    protected $primaryKey = 'id';

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    
    public function all()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY {$this->primaryKey} DESC";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id";

        $stmt = $this->db->prepare($sql);

        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

   
    public function insert($data)
    {
        $fields = implode(', ', array_keys($data));

        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO {$this->table} ({$fields}) VALUES ({$placeholders})";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute($data);
    }

    
    public function update($id, $data)
    {
        $fields = '';

        foreach ($data as $key => $value) {
            $fields .= "{$key} = :{$key}, ";
        }

        $fields = rtrim($fields, ', ');

        $sql = "UPDATE {$this->table} SET {$fields} WHERE {$this->primaryKey} = :id";

        $data['id'] = $id;

        $stmt = $this->db->prepare($sql);

        return $stmt->execute($data);
    }

    
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute(['id' => $id]);
    }

    
    public function count()
    {
        $sql = "SELECT COUNT(*) FROM {$this->table}";

        $stmt = $this->db->query($sql);

        return $stmt->fetchColumn();
    }
}
