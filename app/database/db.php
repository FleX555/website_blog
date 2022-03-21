<?php

session_start();
require('connect.php');

function test($value){
    echo '<pre>';
    print_r($value);
    echo '<pre>';
}

global $pdo;

/*function dbCheckError($query){
    if ($errorinfo[0] !== PDO::ERR_NONE){
        echo $errorinfo[2];
        exit();
    }
    return true;
}*/

//запрос на получение данных
function selectAll($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){

            if(!is_numeric($value)){
              $value = "'" . $value . "'";  
            }
            if($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;

        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    $errorinfo = $query->errorInfo();
    //dbCheckError($query);
    return $query->fetchAll();
}

//запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params = []){
    $sql = "SELECT * FROM $table";
    global $pdo;

    if(!empty($params)){

        //echo test($params);
        $i = 0;
        foreach($params as $key => $value){
            if(!is_numeric($value)){
              $value = "'" . $value . "'";  
            }
            if($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $sql = $sql . " LIMIT 1";

    $query = $pdo->prepare($sql);
    $query->execute();
    $errorinfo = $query->errorInfo();
    //dbCheckError($query);
    return $query->fetch();
}

// Функция добавления данных 
function insert($table, $params){
    global $pdo;

    $i = 0;
    $coll = '';
    $mask = '';
    foreach($params as $key => $value){
        if($i === 0){
            $coll = $coll . "$key";
            $mask = $mask . "'" . "$value" . "'";
        }else{
            $coll = $coll . ", $key";
            $mask = $mask . ", '". "$value" . "'";     
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
    //test($sql);

    $query = $pdo->prepare($sql);
    $query->execute($params);
    $errorinfo = $query->errorInfo();
    return $pdo->lastInsertId();
}

//функция редактирования 
function update($table, $id, $params){
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value){
        if($i == 0){
            $str = $str . $key . " = '" . $value . "'";
        }else{
            $str = $str . ", " . $key . " = '" . $value . "'"; 
        }
        $i++;
    }
    //UPDATE `users` SET admin = '1' WHERE id = 1

    $sql = "UPDATE $table SET $str WHERE id = $id";
    
    $query = $pdo->prepare($sql);
    $query->execute($params);
    $errorinfo = $query->errorInfo();
}

//функция удаления
function delete($table, $id){
    global $pdo;

    $sql = "DELETE FROM $table WHERE id = $id";
    
    $query = $pdo->prepare($sql);
    $query->execute();
    $errorinfo = $query->errorInfo();
}


$params = [
    'admin' => 0,
    'password' => '5345'
];

 $arrdata = [
        'admin' => '1',
        'name' => 'Petrik',
        'family' => 'Pdsaorosh',
        'email' => '57fgh554@mail.ru',
        'password' => '5345'
    ];

// выборка записей с авторами в админку
function selectAllFromPostsWithUsers($table1, $table2){
    global $pdo;
    $sql = "
    SELECT
    t1.id,
    t1.title,
    t1.img,
    t1.content,
    t1.status,
    t2.name,
    t2.family
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id
    ";

    $query = $pdo->prepare($sql);
    $query->execute();
    $errorinfo = $query->errorInfo();
    return $query->fetchAll();
}

//вывод записи с автором на главную страницу
function selectAllFromPostsWithUsersOnIndex($table1, $table2){
    global $pdo;
    $sql = "SELECT p.*, u.name, u.family FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status=1 ";
    $query = $pdo->prepare($sql);
    $query->execute();
    $errorinfo = $query->errorInfo();
    //dbCheckError($query);
    return $query->fetchAll();
}

//вывод записи с автором на singl страницу
function selectAllFromPostsWithUsersOnSingle($table1, $table2, $id){
    global $pdo;
    $sql = "SELECT p.*, u.name, u.family FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.id=$id ";
    $query = $pdo->prepare($sql);
    $query->execute();
    $errorinfo = $query->errorInfo();
    //dbCheckError($query);
    return $query->fetchAll();
}

//insert('users', $arrdata);
//update('users', 1, $params);
//delete('users', 7);
//test(selectAll('users'/*, $params*/));
//test(selectOne('users'));

