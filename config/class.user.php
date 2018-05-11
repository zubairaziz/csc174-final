<?php
class USER
{
    private $db;

    public function __construct($connect)
    {
        $this->db = $connect;
    }

    public function register($uname, $umail, $upass)
    {
        try
        {
            $new_password = password_hash($upass, PASSWORD_DEFAULT);

            $stmt = $this->db->prepare("INSERT INTO users(username, email, password) VALUES(:uname, :umail, :upass)");

            $stmt->bindparam(":uname", $uname);
            $stmt->bindparam(":umail", $umail);
            $stmt->bindparam(":upass", $new_password);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function submitSurvey($name, $email, $helpful, $genre)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO survey(name, email, helpful, genre) VALUES(:name, :email, :helpful, :genre)");

            $stmt->bindparam(":name", $name);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":helpful", $helpful);
            $stmt->bindparam(":genre", $genre);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getData()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM survey ORDER BY surveyID DESC");

            $stmt->execute();

            $rows = $stmt->rowCount();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $stmt;
            return $rows;
            return $row;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insertData()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM survey ORDER BY id DESC");

            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteData()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM survey ORDER BY id DESC");

            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function editData()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM survey ORDER BY id DESC");

            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function login($uname, $umail, $upass)
    {
        try
        {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE username=:uname OR email=:umail LIMIT 1");
            $stmt->execute(array(':uname' => $uname, ':umail' => $umail));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                if (password_verify($upass, $userRow['password'])) {
                    $_SESSION['user_session'] = $userRow['userID'];
                    $_SESSION['username'] = $userRow['username'];
                    $_SESSION['email'] = $userRow['email'];
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function is_loggedin()
    {
        if (isset($_SESSION['user_session'])) {
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }
}
