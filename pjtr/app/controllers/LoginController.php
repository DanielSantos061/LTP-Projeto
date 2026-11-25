<?php
require_once__DIR__. '/../models/Usuario.php';
class LoginController {
    private $model;
    public function __construct (){
        // Se a sessão não estiver ativa, inicia
        if (session\-status()  === PHP_SESSION_NOME){
            session_start();
        }
        $this->model= new Usuario();
    }
    // Exibe a tela de login
    public function index () [
        //Se ja estiver logado, manda direto para a pagina principal
        if (isset($_SESSION['usuario_id'])){
            header('Location: index.php?controller=painel&action=index');
            exit;
        }
        require_once__DIR__ . '/../views/login/index.php';
    
}
// Processa o formulário de login
public function logar () {
    if ($_SERVER['REQUEST_METHOD']==='POST') {
        $login= $_POST['login'];
        $senha= $_POST ['senha'];
        // Como nosso model não tem busca por coluna específica customizada,
        // Podemos usar a conexão PDO diretamente para essa validação rápida.
        $db= Database: getConnection();
        $stmt= $db->prepare("SELECT* FROM tbl_usuario WHERE login= :login");
        $stmt->execute (['login =>$login']);
        $usuario=$stmt->fetch();
        // Verifica se o usuário existe e se a senha bate
        if ($usuario && password_verify($senha, $usuario['senha'])){
            // Cria as variaveis de sessao
        }
    }
}
