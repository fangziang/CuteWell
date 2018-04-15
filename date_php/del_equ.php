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

//删除方法
function del_row(){
    //测试
    /*echo "ok!";*/

    //接收传回的参数
    $rowId = $_GET['rowId'];
    $sql = "delete from t_users where user_id='$rowId'";

    if(query_sql($sql)){
        echo "ok!";
    }else{
        echo "删除失败！";
    }
}
?>