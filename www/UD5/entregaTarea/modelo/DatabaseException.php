<?php 
class DatabaseException extends Exception {

    private string $method;
    private string $sql;

    public function setMethod($method){
        $this->method = $method;
    }

    public function getMethod(){
        return $this->method;
    }

    public function setSql($sql){
        $this->sql = $sql;
    }

    public function getSql(){
        return $this->sql;
    }

    public function __construct($message, string $method, string $sql, $code = 0, Throwable $previous = null){
        parent::__construct($message, $code, $previous);
        $this->method = $method;
        $this->sql = $sql;
    }

}
?>