<?php
class User
{

    static public function GetUser($login)
    {
        $db = Db::getInstance();
        $query = "SELECT * FROM users WHERE login = '$login'";
        $result = $db->query($query);
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
        $db = Db::getInstance();
        $result = $db->query("SELECT * FROM users");
        if ($result->num_rows > 0) {
            $num_row = 0;
            while ($row = $result->fetch_assoc()) {
                foreach ($row as $key => $vol) {
                    $users_data[$num_row][$key] = $vol;
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
        $db = Db::getInstance();
        $login = $db->real_escape_string($login);
        $query = "SELECT login FROM users WHERE login = '$login'";
        $result = $db->query($query);
        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
    static public function CheckPassword($login, $password)
    {
        $db = Db::getInstance();
        $login = $db->real_escape_string($login);
        $query = "SELECT login, password FROM users WHERE login = '$login'";
        $result = $db->query($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, password_hash($row['password'], PASSWORD_DEFAULT))) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    static public function SessionStart($login)
    {
        $user_data = User::GetUser($login);
        // debug($user_data);
        setcookie('user_id', $user_data['user_id'], time() + (60 * 60 * 24 * 30));
        setcookie('login', $user_data['login'], time() + (60 * 60 * 24 * 30));
        setcookie('admin', $user_data['password'], time() + (60 * 60 * 24 * 30));

        // session_start();
        // $_SESSION['login'] = $user_data['login'];
        // $_SESSION['admin'] = $user_data['password'];
    }
    static public function SessionStop()
    {
        unset($_COOKIE['user_id']);
        unset($_COOKIE['login']);
        unset($_COOKIE['admin']);
        setcookie('user_id', '', -1, '/');
        setcookie('login', '', -1, '/');
        setcookie('admin', '', -1, '/');
        // session_start();
		// session_destroy();
    }
}
