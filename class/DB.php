<?php

class DB
{

    private $db_user;
    private $db_host;
    private $db_name;
    private $db_pass;
    private $tableName;

    public function __construct($table)
    {
        $this->db_user = 'homestead';
        $this->db_name = 'dashboard_oop';
        $this->db_pass = 'secret';
        $this->db_host = 'localhost';
        $this->tableName = $table;
    }

    protected function connect()
    {
        return new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
    }

    protected function insert($data)
    {
        $keys = [];
        $values = [];
        foreach ($data as $index => $value) {
            $keys[] = $index;
            $values[] = $index === 'password' ? "sha('$value')" : "'$value'";

        }
        $keys = implode(',', $keys);
        $values = implode(',', $values);

        $sql = "INSERT INTO $this->tableName ($keys) VALUES ($values)";




        $mysqli = self::connect();

        if ($mysqli->query($sql)) {

            return $mysqli->insert_id;
        }

        return mysqli_error(self::connect());


    }

    protected function get($id)
    {
        $sql = "SELECT * FROM $this->tableName WHERE id=$id";

        $mysqli = self::connect();
        $result = $mysqli->query($sql);
        return mysqli_fetch_assoc($result);
    }

    protected function all()
    {
        $sql = "SELECT * FROM $this->tableName";
        $mysqli = self::connect();
        $results = $mysqli->query($sql);

        $rows = [];
        while($row = mysqli_fetch_assoc($results))
        {
            $rows[] = $row;
        }

        return $rows;
    }

    protected function update($data, $id)
    {
        $condition = '';
        foreach ($data as $index => $value) {

            $condition .= " $index = '$value',";
        }

        $condition = substr($condition, 0, -1);

        $sql = "UPDATE $this->tableName SET $condition WHERE id='$id'";
        $mysqli = self::connect();
        $result = $mysqli->query($sql);
        return $result;
    }

    protected function delete($id)
    {
        $sql = "DELETE FROM $this->tableName WHERE id='$id'";
        $mysqli = self::connect();
        $result = $mysqli->query($sql);
        return $result;
    }
}