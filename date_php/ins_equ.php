<?php
//测试php是否可以拿到数据库中的数据
/*echo "44444";*/

//做个路由 action为url中的参数
$action = $_GET['action'];

switch($action) {
    case 'init_data_list':
        init_data_list();
        break;
    case 'add_row':
        add_row();
        break;
    case 'del_row':
        del_row();
        break;
    case 'edit_row':
        edit_row();
        break;
}

//新增方法
function add_row(){
    /*获取从客户端传过来的数据*/
    $userName = $_GET['user_name'];
    $userAge = $_GET['user_age'];
    $userSex = $_GET['user_sex'];
    //INSERT INTO 表名 （列名1，列名2，...）VALUES （'对应的数据1'，'对应的数据2'，...）
    // VALUES 的值全为字符串，因为表属性设置为字符串
    $sql = "INSERT INTO t_users (user_name,user_age,user_sex) VALUES ('$userName','$userAge','$userSex')";
    if(query_sql($sql)){
        echo "ok!";
    }else{
        echo "新增成功！";
    }
}

function query_sql(){
    $mysqli = new mysqli("127.0.0.1", "root", "root", "crud");
    $sqls = func_get_args();
    foreach($sqls as $s){
        $query = $mysqli->query($s);
    }
    $mysqli->close();
    return $query;
}
?>