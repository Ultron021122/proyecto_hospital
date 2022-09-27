<?php
    require('connection.php');

    class reception extends Connection {
        
        protected $CURP;
        protected $Nombre;
        protected $First_name;
        protected $Domicilio;
        protected $Telefono_contacto;
        protected $Fecha_contratación;
        protected $Sexo;
        protected $Edad;
        protected $Email;
        protected $Password;

        public function __construct(){
            parent::__construct();
        }

        public function get_registro(){
            $registros = 6;
            @$pagina = $_GET['pagina'];
            if (!isset($pagina)){
                $pagina = 1;
                $inicio = 0;
            } else {
                $inicio = ($pagina-1) * $registros;
            }
            $total_registros = $this->paginacion();
            $total_paginas = ceil($total_registros / $registros);

            $sql = "SELECT * FROM Recepcionista ORDER BY First_name ASC LIMIT ".$inicio.", ".$registros." ";

            $resultado = $this->_db->query($sql);
            $recepcionista = $resultado->fetch_all(MYSQLI_ASSOC);

            if($recepcionista){
                return $recepcionista;
                $recepcionista->close();
                $this->_db->close();
            }
        }
        
        public function delete_registro($CURP){
            $sql = "DELETE FROM Recepcionista WHERE CURP= '$CURP'";
            $elimina = $this->_db->query($sql);

            $consultElim = "DELETE FROM Sesion WHERE Nombre_usuario='$CURP'";
            $eliminacion = $this->_db->query($consultElim);

            if(!$elimina) {
                echo "Fallo la eliminación de los datos";
            } else {
                return $elimina;
                $elimina->close();
                $eliminacion->close();
                $this->_db->close();
            }
        }

        public function search_registro($CURP){
            $sql = "SELECT * FROM Recepcionista WHERE Nombre LIKE '%$CURP' OR CURP LIKE '%$CURP%' OR First_name LIKE '%$CURP%'";

            $busqueda = $this->_db->query($sql);
            $resultado = $busqueda->fetch_all(MYSQLI_ASSOC);

            if($resultado) {
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function paginacion(){
            $sql = "SELECT * FROM Recepcionista";
            $resultado = $this->_db->query($sql);

            $respuesta = $resultado->num_rows;
            return $respuesta;
            $respuesta->close();
            $this->_db->close();
        }

        public function modificar_registro($CURP, $Nombre, $First_name, $Domicilio, $Telefono_contacto, $Fecha_contratacion, $Sexo, $Edad, $Email){
            $sql = "UPDATE Recepcionista SET Nombre='$Nombre', First_name='$First_name', Domicilio='$Domicilio', Telefono_contacto='$Telefono_contacto',
                                      Fecha_contratacion='$Fecha_contratacion', Sexo='$Sexo', Edad='$Edad', Email='$Email'
                                      WHERE CURP='$CURP'";
            $modificacion = $this->_db->query($sql);
            if(!$modificacion) {
                echo "Fallo la modificación de los datos";
            } else {
                return $modificacion;
                $modificacion->close();
                $this->_db->close();
            }
        }

        public function set_registro($CURP, $Nombre, $First_name, $Domicilio, $Telefono_contacto, $Fecha_contratacion, $Sexo, $Edad, $Email, $Password){
            $Password_Hash = password_hash($Password, PASSWORD_BCRYPT);

            $consultaID = "SELECT * FROM Recepcionista WHERE CURP='$CURP'";
            $resultado = $this->_db->query($consultaID);
            $recepcionista = $resultado->fetch_all(MYSQLI_ASSOC);

            if(!$recepcionista){
                $sql = "INSERT INTO Recepcionista 
                        VALUES ('$CURP','$Nombre', '$First_name', '$Domicilio', '$Telefono_contacto',
                                '$Fecha_contratacion', '$Sexo', '$Edad', '$Email')";
                $session = "INSERT INTO Sesion VALUES (NULL, '$CURP', '$Password_Hash', '2')";
                
                $add = $this->_db->query($sql);
                $addSession = $this->_db->query($session);
                if ($add) {
                    if (!$addSession) {
                        echo "Fallo al ingresar los datos";
                    } else {
                        return $add;
                        $add->close();
                        $addSession->close();
                        $this->_db->close();
                    }
                } else {
                    echo "Fallo al ingresar los datos";
                }
            } else {
                echo "El medico ya existe dentro de la base de datos";
            }
        }
    }
?>