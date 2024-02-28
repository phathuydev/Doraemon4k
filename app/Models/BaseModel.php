<?php

namespace App\Models;

use App\Interface\ModelInterface;
use Core\Database;
use PDO;

class BaseModel implements ModelInterface
{
    protected $conn;
    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }
    public function insert($table, $data)
    {
        $keys = implode(',', array_keys($data));
        $values = ':' . implode(',:', array_keys($data));

        $query = "INSERT INTO $table ($keys) VALUES ($values)";
        $stmt = $this->conn->prepare($query);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
    public function update($table, $data, $cond, $condValue)
    {
        $updateString = '';

        foreach ($data as $key => $value) {
            $updateString .= "$key=:$key,";
        }

        $updateString = rtrim($updateString, ',');

        $query = "UPDATE $table SET $updateString WHERE $cond = $condValue";
        $stmt = $this->conn->prepare($query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }
    public function delete($table, $cond, $condValue)
    {
        $query = "DELETE FROM $table WHERE $cond = :condValue";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':condValue', $condValue);
        return $stmt->execute();
    }
    public function getAll($table)
    {
        $query = "SELECT * FROM $table";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getOneViewer($table, $selectColumns = '*')
    {
        $query = "SELECT $selectColumns FROM $table";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getOne($table, $cond, $condValue, $selectColumns = '*')
    {
        $query = "SELECT $selectColumns FROM $table WHERE $cond = :condValue LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':condValue', $condValue);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function join($table, $joinTable, $onCondition, $selectColumns = '*', $joinType = 'INNER')
    {
        $query = "SELECT $selectColumns FROM $table $joinType JOIN $joinTable ON $onCondition";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function groupBy($table, $groupByColumn, $selectColumns = '*')
    {
        $query = "SELECT $selectColumns FROM $table GROUP BY $groupByColumn";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function orderBy($table, $orderByColumn, $order = 'ASC', $selectColumns = '*')
    {
        $query = "SELECT $selectColumns FROM $table ORDER BY $orderByColumn $order";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function limit($table, $limit, $offset = 0, $selectColumns = '*')
    {
        $query = "SELECT $selectColumns FROM $table LIMIT $limit OFFSET $offset";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function whereLike($table, $column, $likeValue, $selectColumns = '*')
    {
        $query = "SELECT $selectColumns FROM $table WHERE $column LIKE :likeValue";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':likeValue', '%' . $likeValue . '%');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function whereLikeLimit($table, $column, $likeValue, $limit, $selectColumns = '*')
    {
        $query = "SELECT $selectColumns FROM $table WHERE $column LIKE :likeValue LIMIT $limit";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':likeValue', '%' . $likeValue . '%');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function whereBetween($table, $column, $startValue, $endValue, $selectColumns = '*')
    {
        $query = "SELECT $selectColumns FROM $table WHERE $column BETWEEN :startValue AND :endValue";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':startValue', $startValue);
        $stmt->bindValue(':endValue', $endValue);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getJoinLimit($table, $joinTable, $onCondition, $limit, $selectColumns = '*', $joinType = 'INNER')
    {
        $query = "SELECT $selectColumns FROM $table $joinType JOIN $joinTable ON $onCondition LIMIT $limit";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getJoinWhere($table, $joinTable, $onCondition, $whereCondition, $selectColumns = '*', $joinType = 'INNER')
    {
        $query = "SELECT $selectColumns FROM $table $joinType JOIN $joinTable ON $onCondition WHERE $whereCondition";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getJoinLimitWhereLike($table, $joinTable, $onCondition, $likeColumn, $likeValue, $limit, $selectColumns = '*', $joinType = 'INNER')
    {
        $query = "SELECT $selectColumns FROM $table $joinType JOIN $joinTable ON $onCondition WHERE $likeColumn LIKE :likeValue LIMIT $limit";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':likeValue', '%' . $likeValue . '%');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function count($table, $column = '*', $nameCount = 'count', $where = null, $params = [])
    {
        $query = "SELECT COUNT($column) as $nameCount FROM $table";
        if ($where) {
            $query .= " WHERE $where";
        }
        $stmt = $this->conn->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return isset($result[$nameCount]) ? (int)$result[$nameCount] : 0;
    }
}
