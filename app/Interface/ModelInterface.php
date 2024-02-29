<?php

namespace App\Interface;

interface ModelInterface
{
    public function insert($table, $data);
    public function update($table, $data, $cond, $condValue);
    public function delete($table, $cond, $condValue);
    public function getAll($table, $selectColumns = '*');
    public function getOne($table, $cond = null, $method = null, $condValue = null, $selectColumns = '*');
    public function whereLikeLimit($table, $column, $likeValue, $limit, $selectColumns = '*');
    public function getJoinLimit($table, $joinTable, $onCondition, $limit, $selectColumns = '*', $joinType = 'INNER');
    public function getJoinLimitWhereLike($table, $joinTable, $onCondition, $likeColumn, $likeValue, $limit, $selectColumns = '*', $joinType = 'INNER');
    public function count($table, $column = '*', $nameCount = 'count', $where = null, $params = []);
}
