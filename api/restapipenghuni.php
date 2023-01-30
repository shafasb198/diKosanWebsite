<?php
    require_once "koneksi.php";

    if(function_exists($_GET['function'])){
        $_GET['function']();
    }

    function get_penghuni()
    {
        global $connect;
        $query = $connect->query("SELECT * FROM tb_penghuni WHERE status='Terdaftar' ");
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


    function insert_penghuni()
    {
        global $connect;   
        $check = array('id_kos' => '', 'id_pengguna' => '', 'nama' => ''
                        , 'asal' => '', 'tgl_lahir' => '', 'no_telp' => ''
                        , 'kampus' => '', 'no_rek' => '', 'nik' => ''
                        , 'jenkel' => '', 'status' => '');
        $check_match = count(array_intersect_key($_POST, $check));
        if($check_match == count($check)){
            $result = mysqli_query($connect, "INSERT INTO tb_penghuni  SET
            id_kos = '$_POST[id_kos]',
            id_pengguna = '$_POST[id_pengguna]',
            nama = '$_POST[nama]',
            asal = '$_POST[asal]',
            tgl_lahir = '$_POST[tgl_lahir]',
            no_telp = '$_POST[no_telp]',
            kampus = '$_POST[kampus]',
            no_rek = '$_POST[no_rek]',
            nik = '$_POST[nik]',
            jenkel = '$_POST[jenkel]',
	        status = '$_POST[status]'");
            
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

    /*
    function update_penghuni()
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
    */
?>