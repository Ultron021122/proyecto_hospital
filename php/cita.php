<?php
    require_once('connection.php');

    class citas extends Connection {

        protected $CURP_paciente;
        protected $CURP_medico;
        protected $fecha;
        protected $hora;
        protected $Codigo_cita;
        protected $dia;
        protected $hour;
        protected $minute;

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

            $sql = "SELECT * FROM Citas ORDER BY Codigo_cita ASC LIMIT ".$inicio." , ".$registros."";

            $resultado = $this->_db->query($sql);
            $citas = $resultado->fetch_all(MYSQLI_ASSOC);

            if($citas) {
                return $citas;
                $citas->close();
                $this->_db->close();
            }
        }

        public function delete_registro($Codigo_cita){
            $sql = "DELETE FROM Citas WHERE Codigo_cita='$Codigo_cita'";
            $elimina = $this->_db->query($sql);

            if(!$elimina) {
                echo "Fallo la eliminación de los datos";
            } else {
                return $elimina;
                $elimina->close();
                $this->_db->close();
            }
        }

        public function search_registro($Codigo_cita){
            $sql = "SELECT * FROM Citas WHERE Codigo_cita LIKE '%$Codigo_cita%'";

            $busqueda = $this->_db->query($sql);
            $resultado = $busqueda->fetch_all(MYSQLI_ASSOC);

            if($resultado) {
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function modificar_registro($CURP_paciente, $CURP_medico, $fecha, $hora, $Codigo_cita){
            $sql = "UPDATE Citas SET CURP_paciente='$CURP_paciente', CURP_medico='$CURP_medico',
                                     fecha='$fecha', hora='$hora' WHERE Codigo_cita='$Codigo_cita'";
            $modificacion = $this->_db->query($sql);
            if (!$modificacion) {
                echo "Fallo la modificación de los datos";
            } else {
                return $modificacion;
                $modificacion->close();
                $this->_db->close();
            }
        }

        public function set_registro($CURP_paciente, $CURP_medico, $fecha, $hora){
            $consultaID = "SELECT * FROM Citas WHERE fecha='$fecha' AND hora='$hora' OR fecha='$fecha' AND CURP_paciente='$CURP_paciente'";
            $validacion = $this->_db->query($consultaID);
            $resultado = $validacion->fetch_all(MYSQLI_ASSOC);

            if(!$resultado) {
                $sql = "INSERT INTO Citas VALUES ('$CURP_paciente', '$CURP_medico', '$fecha', '$hora', NULL)";
                $insertar = $this->_db->query($sql);
                if($insertar) {
                    return $insertar;
                    $insertar->close();
                    $this->_db->close();
                } else {
                    echo "Fallo al ingresar los datos";
                }
            } else {
                echo "La cita ya existe dentro de la base de datos";
            }
        }

        public function paginacion(){
            $sql = "SELECT * FROM Citas";
            $resultado = $this->_db->query($sql);

            $respuesta = $resultado->num_rows;
            return $respuesta;
            $respuesta->close();
            $this->_db->close();
        }

        public function search_agenda($dia, $hour, $minute) {
            $medico = $_SESSION['username'];
            $sql = "SELECT * FROM Citas WHERE WEEK(fecha)=WEEK(CURDATE()) AND WEEKDAY(fecha)='$dia' AND HOUR(hora)='$hour' AND MINUTE(hora)='$minute' AND CURP_medico='$medico'";
            $resultado = $this->_db->query($sql);

            $respuesta = $resultado->num_rows;
            return [$resultado, $respuesta];
            $resultado->close();
            $respuesta->close();
            $this->_db->close();
        }

    }
?>