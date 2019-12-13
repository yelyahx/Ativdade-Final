<?php

$sexo = $_POST['sexo'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$funcionario = $_POST['funcionario'];



$newRegister = new SingUp($name, $email, $password, $funcionario, $sexo);
$newRegister->register();



class SingUp
{
    private $nome;
    private $email;
    private $password;
    private $isFuncionario;
    private $sexo;

    public function __construct($nome, $email, $password, $isFuncionario, $sexo)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->password = $password;
        $this->isFuncionario = $isFuncionario;
        $this->sexo = $sexo;
    }

    public function register()
    {
        if ($this->isFuncionario == "true") {
            
            new InsertFuncionario($this->nome, $this->sexo, $this->password, $this->email, 'Funcionario');
        } else {
            $newPat = new Funcionario();
            $newPat->inserir($this->nome,  $this->sexo, $this->password, $this->email, 'Funcionario' ,$this->dataNasc);
        }
    }
}
