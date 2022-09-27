<?php
    require_once('connection.php');

    class diagnostico extends Connection {

        protected $Num_expediente;
        protected $Fecha_observacion;
        protected $Hora;
        protected $Observacion;
        protected $CURP_medico;
        protected $ID;

        public function search_registro($Num_expediente){
            $sql = "SELECT * FROM Diagnosticos WHERE Num_expediente='$Num_expediente'";

            $consulta = $this->_db->query($sql);
            $diagnosticos = $consulta->fetch_all(MYSQLI_ASSOC);
            
            if ($diagnosticos) {
                return $diagnosticos;
                
                $diagnosticos->close();
                $this->_db->close();
            }
        }

        public function search_registro_id($ID) {
            $sql = "SELECT * FROM Diagnosticos WHERE ID = '$ID'";

            $consulta = $this->_db->query($sql);
            $diagnostico = $consulta->fetch_all(MYSQLI_ASSOC);

            if ($diagnostico) {
                return $diagnostico;

                $diagnostico->close();
                $this->_db->close();
            }
        }

        public function modify_registro ($Fecha_observacion, $Hora, $Observacion, $ID) {
            $sql = "UPDATE Diagnosticos SET Fecha_observacion ='$Fecha_observacion', Hora = '$Hora',
                    Observacion = '$Observacion' WHERE ID = '$ID'";

            $modificacion = $this->_db->query($sql);
            if (!$modificacion) {
                echo "Fallo la modificación de los datos del diagnóstico";
            } else {
                return $modificacion;

                $modificacion->close();
                $this->_db->close();
            }
        }

        public function delete_registro($ID) {
            $sql = "DELETE FROM Diagnosticos WHERE ID = '$ID'";
            $elimina = $this->_db->query($sql);

            if(!$elimina) {
                echo "Fallo la eliminación del diagnóstico";
            } else {
                return $elimina;

                $elimina->close();
                $this->_db->close();
            }
        }

        public function set_registro($Num_expediente, $Fecha_observacion, $Hora, $Observacion, $CURP_medico) {
            $sql = "SELECT Nombre, First_name FROM Medico WHERE CURP = '$CURP_medico'";

            $resultado = $this->_db->query($sql);
            $medico = $resultado->fetch_array(MYSQLI_NUM);

            $Nombre_medico = $medico[0];
            $Last_name = $medico[1];

            $sql = "INSERT INTO Diagnosticos VALUES ('$Num_expediente', '$Fecha_observacion', '$Hora', '$Observacion', '$Nombre_medico', '$Last_name', NULL)";
            $insertar = $this->_db->query($sql);

            if ($insertar) {
                return $insertar;
                $insertar->close();
                $this->_db->close();
            }
        }
        
    }
?>