<?php
    require_once('connection.php');

    class paciente extends Connection {
        
        protected $Nombre;
        protected $Last_name;
        protected $CURP;
        protected $Domicilio;
        protected $Telefono_contacto;
        protected $Sexo;
        protected $Edad;
        protected $Email;

        public function __construct(){
            parent::__construct();
        }

        public function get_registro(){
            $registros = 6;
            @$pagina = $_GET['pagina'];
            if (!isset($pagina)) {
                $pagina = 1;
                $inicio = 0;
            } else {
                $inicio = ($pagina-1) * $registros;
            }
            $total_registros = $this->paginacion();
            $total_paginas = ceil($total_registros / $registros);

            $sql = "SELECT * FROM Paciente ORDER BY Last_name ASC LIMIT ".$inicio.", ".$registros." ";

            $resultado = $this->_db->query($sql);
            $paciente = $resultado->fetch_all(MYSQLI_ASSOC);

            if($paciente){
                return $paciente;
                $paciente->close();
                $this->_db->close();
            }
        }

        public function delete_registro($CURP){
            $sql = "DELETE FROM Paciente WHERE CURP='$CURP'";
            $elimina = $this->_db->query($sql);

            if(!$elimina){
                echo "Fallo la eliminación de los datos";
            } else {
                return $elimina;
                $elimina->close();
                $this->_db->close();
            }
        }

        public function search_registro($CURP){
            $sql = "SELECT * FROM Paciente WHERE CURP LIKE '%$CURP%' OR Nombre LIKE '%$CURP%' OR Last_name LIKE '%$CURP%'";

            $busqueda = $this->_db->query($sql);
            $resultado = $busqueda->fetch_all(MYSQLI_ASSOC);

            if($resultado) {
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function modificar_registro($Nombre, $Last_name, $CURP, $Domicilio, $Telefono_contacto, $Sexo, $Edad, $Email){
            $sql = "UPDATE Paciente SET Nombre='$Nombre', Last_name='$Last_name', Domicilio='$Domicilio', Telefono_contacto='$Telefono_contacto',
                                        Sexo='$Sexo', Edad='$Edad', Email='$Email' WHERE CURP='$CURP'";
            $modificacion = $this->_db->query($sql);
            if(!$modificacion) {
                echo "Fallo la modificación de los datos";
            } else {
                return $modificacion;
                $modificacion->close();
                $this->_db->close();
            }
        }

        public function set_registro($Nombre, $Last_name, $CURP, $Domicilio, $Telefono_contacto, $Sexo, $Edad, $Email){
            $consultaID = "SELECT * FROM Paciente WHERE CURP='$CURP'";
            $resultado = $this->_db->query($consultaID);
            $recepcionista = $resultado->fetch_all(MYSQLI_ASSOC);

            if(!$recepcionista){
                $sql = "INSERT INTO Paciente VALUES ('$Nombre', '$Last_name', '$CURP', '$Domicilio', '$Telefono_contacto', '$Sexo', '$Edad', '$Email')";
                $add = $this->_db->query($sql);

                if($add) {
                    return $add;
                    $add->close();
                    $this->_db->close();
                } else {
                    echo "Fallo al ingresar los datos";
                }
            } else {
                echo "El paciente ya existe dentro de la base de datos";
            }
        }

        public function paginacion(){
            $sql = "SELECT * FROM Paciente";
            $resultado = $this->_db->query($sql);

            $respuesta = $resultado->num_rows;
            return $respuesta;
            $respuesta->close();
            $this->_db->close();
        }
    }
?>