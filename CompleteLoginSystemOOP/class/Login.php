<?php
    require_once('DB.php');

    class Login {
        protected string $table = 'usuarios';
        public string $email;
        private string $password;
        public string $name;
        private string $token;
        public array $erro=[];

        public function auth($email,$password){

            // to encrypt the password
            $encrypt_password = sha1($password);

            // check if this user exists 
            $sql = "SELECT * FROM $this->table WHERE email=? AND senha=? LIMIT 1";
            $sql = DB::prepare($sql);
            $sql->execute(array($email,$encrypt_password));
            $user = $sql->fetch(PDO::FETCH_ASSOC);
            
            if ($user){    
                // create a token
                $this->token = sha1(uniqid().date('d-m-Y-H-i-s'));

                // to update this token
                $sql = "UPDATE $this->table SET token=? WHERE email=? AND senha=? LIMIT 1";
                $sql = DB::prepare($sql);

                if($sql->execute(array($this->token,$email,$encrypt_password))){
                    // put the token on the session
                    $_SESSION['TOKEN'] = $this->token;
                    // if auth is ok => go to the secret page
                    header('location: restrict/index.php');
                }else{
                    $this->erro["erro_geral"] = "Fail to communicate with the server!"; 
                }
                }else{
                    $this->erro["erro_geral"] = "The email or password is incorrect!"; 
            }
        }

        public function isAuth($token){
            $sql = "SELECT * FROM $this->table WHERE token=? LIMIT 1";
            $sql = DB::prepare($sql);
            $sql->execute(array($token));
            $user = $sql->fetch(PDO::FETCH_ASSOC);

            if($user){
                $this->name =  $user["nome"]; 
                $this->email =  $user["email"];
            }else{
                header('location: ../index.php');
            }
        }
    
    }

?>