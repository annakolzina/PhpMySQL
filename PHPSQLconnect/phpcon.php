<?php
class Users
{
    public $users = array();


    function conn(){
        $connection = mysqli_connect('127.0.0.1', 'mysql', 'mysql', 'test_db');
        if (!$connection)
        {
            die("Error connect");
            echo mysqli_error();
        }
        return $connection;
    }


    function get_login_password(){
        $connection = $this->conn();
        return mysqli_query($connection, 'SELECT login, password FROM users');
    }


    function insert_new_user(){
        $connection = $this->conn();

    }

    function set_log_pas(){
        $result = $this->get_login_password();
        $rows = mysqli_num_rows($result);

        for($i =0; $i < $rows; $i++){
            $row = mysqli_fetch_row();
            $this->users[$row[1]] = [$row[2]];
        }

        /*foreach (mysqli_fetch_all($result) as $key => $value) {
            $count = 0;
            foreach ($value as $item => $val) {
                if ($count % 2 == 0)
                    array_push($this->logins, $val);
                else
                    array_push($this->pass, $val);
                $count++;
            }
        }*/
        return true;
    }

    function get_users(){
        $this->set_log_pas();
        return $this->users;
    }

    /*function get_pass(){
        return $this->pass;
    }*/
}


