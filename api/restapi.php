<?php
    require_once "koneksi.php";

    if(function_exists($_GET['function'])){
        $_GET['function']();
    }

    function get_user()
    {
        global $connect;
        $query = $connect->query("SELECT * FROM tb_pengguna");
        while($row=mysqli_fetch_object($query))
        {
            $data[] = $row;
        }
        $response=array(
                        'status' => 1,
                        'message' => 'success',
                        'data' => $data
                    );
        header('Content-Type: application/json');
        echo json_encode($response); 
    }


    function insert_user()
    {
        global $connect;   
        $check = array('nama' => '', 'username' => '', 'password' => '', 'level' => '');
        $check_match = count(array_intersect_key($_POST, $check));
        if($check_match == count($check)){
            $result = mysqli_query($connect, "INSERT INTO tb_pengguna  SET
            nama = '$_POST[nama]',
            username = '$_POST[username]',
            password = '$_POST[password]',
	        level = '$_POST[level]'");
            
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Insert Success'
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Insert Failed.'
               );
            }
        }else{
         $response=array(
                  'status' => 0,
                  'message' =>'Wrong Parameter'
               );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function update_user()
    {
        global $connect;
        if (!empty($_GET["id_pengguna"])) {
            $id_pengguna = $_GET["id_pengguna"];      
        }   
        $check = array('nama' => '', 'username' => '', 'password' => '');
        $check_match = count(array_intersect_key($_POST, $check));         
        if($check_match == count($check)){
      
        $result = mysqli_query($connect, "UPDATE tb_pengguna SET               
        nama = '$_POST[nama]',
	username = '$_POST[username]',
        password = '$_POST[password]' WHERE id_pengguna = $id_pengguna");
    
        if($result)
        {
            $response=array(
            'status' => 1,
            'message' =>'Update Success'                  
            );
        }
        else
        {
            $response=array(
            'status' => 0,
            'message' =>'Update Failed'                  
            );
        }
        }else{
            $response=array(
                'status' => 0,
                'message' =>'Wrong Parameter',
                'data'=> $id
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function delete_user()
    {
        global $connect;
        $id_pengguna = $_GET['id_pengguna'];
        $query = "DELETE FROM tb_pengguna WHERE id_pengguna=".$id_pengguna;
        if(mysqli_query($connect, $query))
        {
            $response=array(
                'status' => 1,
                'message' =>'Delete Success'
            );
        }
        else
        {
            $response=array(
                'status' => 0,
                'message' =>'Delete Fail.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }


?>