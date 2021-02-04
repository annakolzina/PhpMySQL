<?php
    include 'phpcon.php';


    function get_key($result, $array){
        $count = 0;
        foreach ($array as $item) {
            if(strcasecmp($item, $result)==0)
                return $count;
            $count++;
        }
        return -1;
    }


    function get_value_bool($result, $element){
        if(strcasecmp($element, $result)==0)
            return true;
        else
            return false;
    }


    echo <<<_END
            <html>
        <head>
            <title>Авторизация</title>
        </head>
        <form method="post" action="post.php" enctype="multipart/form-data">
            Введите логин:
            <input type="text" name="login" size = '20'/>
            Введите пароль:
            <input type="password" name="password" /> 
                <input type="submit" value="Продолжить">>
        </form>
_END;

    $obj = new Users();

    $arr_users = $obj->get_users();



        if($_POST){

            if(get_key($_POST["login"], $arr_users)!=-1)
            {
                $index = get_key($_POST["login"], $arr_users);

                if(get_value_bool($_POST["password"], $arr_pass[$index])==true)
                {
                    echo 'Добро пожаловать, '.$_POST["login"]."!";
                }else{
                    echo 'Введен неверный пароль, попробуйте снова';
                }
            }else{
                echo 'Введен неверный логин';
            }
            echo<<<_END
        <form method="post" action="post.php" enctype="multipart/form-data">
            Hello
        </form>
_END;
        }


    echo "</body></html>";