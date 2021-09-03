<?php

interface SQLQueryBuilder
{
    public function select(string $table, array $fields): SQLQueryBuilder;

    public function where(string $field, string $value, string $operator = '='): SQLQueryBuilder;

    public function limit(int $start, int $offset): SQLQueryBuilder;

    public function getSQL(): string;
}

class MySQLQueryBuilder implements SQLQueryBuilder{

}

class PGQueryBuilder extends  MySQLQueryBuilder{

}



$mysql = new PGQueryBuilder();

$query = $mysql->select("users",["id","name"])
			  ->where("email","y.skrzypczyk@gmail.com","=")
			  ->limit(10,10)
			  ->getSql();


var_dump($mysql);
echo $query;


