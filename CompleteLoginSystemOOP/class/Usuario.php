<?php
    require_once('Crud.php');

    class Usuario extends Crud{
        protected string $table = 'usuarios';

        function __construct(
            public string $name,  
            private string $email,
            private string $password,
            private string $repeat_password="",
            private string $recovery_password="",
            private string $token="",
            private string $confirmation_code="",
            private string $status="",
            public array $erro=[]
        ){}

        public function set_repeticao($repeat_password){
            $this->repeat_password = $repeat_password;
        }

        public function validar_cadastro(){

            // only letters and spaces in name => check name
            if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ'\s]+$/",$this->name)) {
            $this->erro["erro_nome"] = "Only letters and white spaces are allowed!";
            }

            // chek if email is valid
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $this->erro["erro_email"] = "Invalid email format!";
            }

            // chek if the password is bigger than 6 
            if(strlen($this->password) < 6){
                $this->erro["erro_senha"] = "Password must be bigger than 6!";
            }

            // chek if the repeat passoword is equal to the password
            if($this->password !== $this->repeat_password){
                $this->erro["erro_repete"] = "Repeat password is different from the password!";
            }

        }

        public function insert(){
            // check if this email is already in the database 
            $sql = "SELECT * FROM usuarios WHERE email=? LIMIT 1";
            $sql = DB::prepare($sql);
            $sql->execute(array($this->email));
            $usuario = $sql->fetch();

            // if the user isn't in the database => add in the database
            if (!$usuario){
                $data_cadastro = date('d/m/Y');
                $senha_cripto = sha1($this->password);
                $sql = "INSERT INTO $this->table VALUES (null,?,?,?,?,?,?,?,?)";
                $sql = DB::prepare($sql);
                return $sql->execute(array($this->name,$this->email,$senha_cripto,$this->recovery_password,$this->token,$this->confirmation_code,$this->status,$data_cadastro));
            }else{
                $this->erro["erro_geral"] = "User already in the system!";
            }
        }

        public function update($id){
            $sql = "UPDATE $this->table SET token=? WHERE id=?";
            $sql = DB::prepare($sql);
            return $sql->execute(array($token,$id));
        }

    }

?>