<?php

require_once 'ConnectionDB.php';



class SingIn
{
    private $email;
    private $password;
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function verifyUser()
    {
        $conns = new Connection();
        $conn = $conns->db();

        if ($conn->connect_errno) {
            echo "Failed to connect to MySQL: " . $conn->connect_error();
        }

        $query = "SELECT * FROM usuario where email = '$this->email' AND senha = '$this->password'";

        $result = $conn->query($query);
        echo $conn->error;


        session_start();

        if ($result) {
            while ($row = $result->fetch_assoc()) {

                $_SESSION['idUser'] = $row['idUsuario'];
                $_SESSION['name'] = $row['nome'];
                $_SESSION['sexo'] = $row['sexo'];
                $_SESSION['email'] = $row['email'];


                if ($row['tipo'] == "funcionario") {
                    $_SESSION['isFuncionario'] = 'true';
                    $this->getMedic($conn, $row['idUsuario']);
                } else {
                    $_SESSION['isFuncionario'] = 'false';
                    $this->getPacient($conn, $row['idUsuario']);
                }

                //print_r($row);

                echo "true";
            }
        }
        
        $conn->close();


        //header("Location: /Web");
    }

    private function getFunc($conn, $id)
    {
        $query = "SELECT * FROM funcionario where idUsuario = '$id'";

        $result = $conn->query($query);
        echo $conn->error;



        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['crm'] = $row['crm'];
                //print_r($row);
            }
        }
    }
    private function getadm($conn, $id)
    {
        $query = "SELECT * FROM Administrador where idUsuario = '$id'";

        $result = $conn->query($query);
        echo $conn->error;

        // echo mysqli_num_rows($result);


        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['cpf'] = $row['cpfPaciente'];
                $_SESSION['dataNasc'] = $row['dataNascimento'];
            }
        }
    }
}
