<?php

require_once('./core/Database.php');

class Model
{
    protected $dbConnection;

    protected $table;

    //Allow fields in fillable
    protected $fillable = [];

    protected $primaryKey = "id";

    public function __construct()
    {
        $this->dbConnection = DatabaseConnection::getInstance();
        $this->checkRequiredProperties();
    }

    /**
     * Check required properties in child Model class.
     *
     * @return void
     */
    public function checkRequiredProperties()
    {
        if (!property_exists($this, 'table')) {
            throw new Exception('Please add property table to class ' . get_class($this));
        }

        if (!property_exists($this, 'fillable')) {
            throw new Exception("Please add property fillable with fields from database to class " . get_class($this));
        }
    }

    /**
     * Begin querying
     *
     * @param array $columns
     * @return void
     */
    public function findAll($columns = ['*'])
    {
        $columns = implode(',', $columns);
        $sql = "SELECT $columns FROM {$this->table}";
        $result = $this->dbConnection->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    //========= XỬ LÍ SQL CHO SẴN ============
    public function getFirst($sql)
    {
        $result = $this->dbConnection->query($sql);
        $data = $result->fetch_assoc();
        return $data;
    }

    public function getAll($sql)
    {
        $result = $this->dbConnection->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    //============= CRUD ==============

    public function create($data)
    {
        if (count($data) > 0) {
            $data = array_filter($data, function ($key) {
                return in_array($key, $this->fillable);
            }, ARRAY_FILTER_USE_KEY);

            $keys = array_keys($data);
            $values = array_map(function ($item) {
                return "'$item'";
            }, array_values($data));

            $fields = implode(',', $keys);
            $values = implode(',', $values);
            $sql = "INSERT INTO {$this->table}({$fields}) VALUES ($values)";
            $res = $this->dbConnection->query($sql);
            if ($res) {
                $pk = $this->primaryKey;
                return array_merge($data, [$pk => $this->dbConnection->insert_id]);
            }
        }

        return false;
    }

    /**
     * GET first record
     *
     * @param [type] $id
     */
    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} where {$this->primaryKey} = {$id}";
        $result = $this->dbConnection->query($sql);
        $data = $result->fetch_assoc();
        return $data;
    }

    /**
     * Update
     *
     * @param [type] $data
     * @param [type] $id
     * @return void
     */
    public function update($data, $id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = $id";
        $foundRecord = $this->getFirst($sql);
        if (count($foundRecord) != 0) {
            if (count($data) > 0) {
                $data = array_filter($data, function ($key) {
                    return in_array($key, $this->fillable);
                }, ARRAY_FILTER_USE_KEY);

                $updateDataString = implode(',', array_map(function ($key, $value) {
                    return "$key = '$value'";
                }, array_keys($data), array_values($data)));

                $sql = "UPDATE {$this->table} SET $updateDataString WHERE {$this->primaryKey} = $id";
                $result = $this->dbConnection->query($sql);
                if ($result) {
                    return array_merge($foundRecord, $data);
                }
            }
        }
        return false;
    }

    /**
     * DELETE
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = $id";
        $result = $this->dbConnection->query($sql);
        if ($result) {
            return true;
        }

        return false;
    }
}
