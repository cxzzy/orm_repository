<?php

interface IQuery
{
    public function select(array $fields);
    public function delete();
    public function all();
    public function where(array $where);
    public function orderBy(array $order);
    public function limit(array $limit);
    public function run();
    public function final();
}
