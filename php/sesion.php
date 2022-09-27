<?php
    require_once('connection.php');

    class session extends Connection {

        protected $username;
        protected $password;

        public function __construct(){
            parent::__construct();
        }

        public function start($username, $password){
            session_start();
            $_SESSION['login'] = false;

            $sql = "SELECT * FROM Sesion WHERE Nombre_usuario = '$username'";
            
            $consulta = $this->_db->query($sql);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
            if ($resultado) {
                if (password_verify($password, $resultado[0]['Password']) or $password == $resultado[0]['Password']) {
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $resultado[0]['Nombre_usuario'];
                    $_SESSION['rol'] = $resultado[0]['rol_id'];
                    switch ($_SESSION['rol']) {
                        case 1:
                            header('Location: ../menu_admin.php');
                            break;
                            case 2:
                                header('Location: ../menu_recepcionista.php');
                                break;
                                case 3:
                                    header('Location: ../menu_medico.php');
                                    break;
                        
                        default:
                            # code...
                            break;
                    }
                } else {
                    header('Location: ../index.php');
                }
            } else {
                header('Location: ../index.php');
            }
        }

        public function check() {
            session_start(); //Inicia nueva sesion
            $login = $_SESSION['login'];

            if(!$login) {
                header('Location: index.php');
            } else {
                $username = $_SESSION['username']; //no es estrictamente necesario, pero puede ser de gran
                //Ayuda más adelante
                return $username;
            }
        }

        public function finish() {
            session_start();

            //Destruir todas las variables de sesión
            $_SESSION = array();

            //Destruir la sesión completamente, borra tambien las cookies de sesión.
            if(ini_get("session.use_cookies")){
                $params = session_get_cookie_params();
                setcookie(session_name(),'',time()-42000,
                $params["path"],$params["domain"],
                $params["secure"], $params["httponly"]);
            }
            //Finalmente, destruir la sesión
            session_destroy();
            header('Location: ../index.php');
        }
        
    }
?>