<?php
class Logs {
    public function addLog($app, $type, $message){
        try {
            $pdo = new \PDO("mysql:host=localhost;dbname=logs;charset=utf8", "root", '');
            $sql = "INSERT INTO `log`( `app`, `type`, `message`, `time`) VALUES ( :app , :type , :message , NOW())";
            $req = $pdo->prepare($sql);
            $req->bindParam(':app', $app, PDO::PARAM_STR);
            $req->bindParam(':type', $type, PDO::PARAM_STR);
            $req->bindParam(':message', $message, PDO::PARAM_STR);
            $req->execute();
        } catch (Exception $e) {
            echo "An error occured : ".$e;
        }
        
    }
}

?>