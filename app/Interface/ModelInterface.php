<?php

namespace App\Interface;

interface ModelInterface
{
    public function insert($table, $data);
    public function update($table, $data, $cond, $condValue);
    public function delete($table, $cond, $condValue);
    public function getAll($table);
    public function getOne($table, $cond, $condValue);
    public function join($table, $joinTable, $onCondition, $selectColumns = '*', $joinType = 'INNER');
    public function groupBy($table, $groupByColumn, $selectColumns = '*');
    public function orderBy($table, $orderByColumn, $order = 'ASC', $selectColumns = '*');
    public function limit($table, $limit, $offset = 0, $selectColumns = '*');
    public function whereLike($table, $column, $likeValue, $selectColumns = '*');
    public function whereBetween($table, $column, $startValue, $endValue, $selectColumns = '*');
    public function whereLikeLimit($table, $column, $likeValue, $limit, $selectColumns = '*');
    public function getJoinLimit($table, $joinTable, $onCondition, $limit, $selectColumns = '*', $joinType = 'INNER');
    public function getJoinLimitWhereLike($table, $joinTable, $onCondition, $likeColumn, $likeValue, $limit, $selectColumns = '*', $joinType = 'INNER');
    public function getJoinWhere($table, $joinTable, $onCondition, $whereCondition, $selectColumns = '*', $joinType = 'INNER');
    public function count($table, $column = '*', $nameCount = 'count', $where = null, $params = []);
}
