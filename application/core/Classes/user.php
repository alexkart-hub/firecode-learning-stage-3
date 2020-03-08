<?php
class User
{

    static public function GetUser($login)
    {
        $db = DbMysqli::getInstance();
        $query = "SELECT * FROM users WHERE login = '$login'";
        $result = $db->ExecuteQuery($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            foreach ($row as $key => $vol) {
                $user_data[$key] = $vol;
            }
            $result->free();
            return $user_data;
        } else {
            return false;
        }
    }
    static public function GetUserById($user_id)
    {
        $db = DbMysqli::getInstance();
        $query = "SELECT * FROM users WHERE user_id = '$user_id'";
        $result = $db->ExecuteQuery($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            foreach ($row as $key => $vol) {
                $user_data[$key] = $vol;
            }
            $result->free();
            return $user_data;
        } else {
            return false;
        }
    }
    static public function GetAllUsers()
    {
        $db = DbMysqli::getInstance();
        $result = $db->ExecuteQuery("SELECT * FROM users");
        if ($result->num_rows > 0) {
            $num_row = 0;
            while ($row = $result->fetch_assoc()) {
                foreach ($row as $key => $vol) {
                    $users_data["user_".$num_row][$key] = $vol;
                }
                $num_row++;
            }
            $result->free();
            return $users_data;
        } else {
            return false;
        }
    }

    static public function IsUserExist($login)
    {
        $db = DbMysqli::getInstance();
        $login = $db->Connect()->real_escape_string($login);
        $query = "SELECT login FROM users WHERE login = '$login'";
        $result = $db->ExecuteQuery($query);
        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
    static public function CheckPassword($login, $password)
    {
        $db = DbMysqli::getInstance();
        $login = $db->Connect()->real_escape_string($login);
        $query = "SELECT login, password FROM users WHERE login = '$login'";
        $result = $db->ExecuteQuery($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // if (password_verify($password, password_hash($row['password'],PASSWORD_DEFAULT))) {
            if (password_verify($password, $row['password'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    static public function CreateUser($login,$password)
    {
        $db = DbMysqli::getInstance();
        $login = $db->Connect()->real_escape_string($login);
        $password = password_hash($password,PASSWORD_DEFAULT);
        $query = "INSERT INTO users (login, password) VALUES ('$login','$password')";
        if($db->ExecuteQuery($query)){
            return true;
        } else {
            return false;
        }
    }
    static public function UpdateUser($login,$password)
    {
        $db = DbMysqli::getInstance();
        $login = $db->Connect()->real_escape_string($login);
        $password = password_hash($password,PASSWORD_DEFAULT);
        $query = "UPDATE users SET  password = '$password' WHERE login = '$login'";
        if($db->ExecuteQuery($query)){
            return true;
        } else {
            return false;
        }
    }
    static public function DeleteUser($login)
    {
        $db = DbMysqli::getInstance();
        $login = $db->Connect()->real_escape_string($login);
        $query = "DELETE FROM users WHERE login = '$login'";
        if($db->ExecuteQuery($query)){
            return true;
        } else {
            return false;
        }
    }
    static public function SessionStart($login)
    {
        $user_data = User::GetUser($login);
        setcookie('user_id', $user_data['user_id'], time() + (60 * 60 * 24 * 30));
        setcookie('login', $user_data['login'], time() + (60 * 60 * 24 * 30));
        setcookie('admin', $user_data['password'], time() + (60 * 60 * 24 * 30));
    }
    static public function SessionStop()
    {
        unset($_COOKIE['user_id']);
        unset($_COOKIE['login']);
        unset($_COOKIE['admin']);
        setcookie('user_id', '', -1, '/');
        setcookie('login', '', -1, '/');
        setcookie('admin', '', -1, '/');
    }
}
