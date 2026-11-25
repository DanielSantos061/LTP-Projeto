<?php 
class Database {
    private static $ost= "localhost";
    private static $dbname= "testebd3"; //aluno altera aqui
    private static $user= "root";
    private static $pass= "";
    private static $conexao= null;
    public static function geConnection (){
        if (self:: $conexao === null) {
            try{
                self:: $conexao= new PDO (
                    "mysql : host=" . self:: $host .
                    ";dbname=" . self :: $dbname .
                    ";charset=utf8",
                    self::$user,
                    self::$pass,
                    [
                        PDO::ATTR_ERRMODE=>PDO::
                        ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE=> PDO
                        ::FETCH_ASSOC
                    ]
                    );
            } catch (PDOexception $e) {
                die ("Erro na conexão com o banco de dados:" . $e->getMessage () );
            }
        }
        return self::$conexao;
    }
}
