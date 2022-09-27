<?php
    require_once('connection.php');

    class expediente extends Connection {
        
        protected $Nombre_paciente;
        protected $Last_name;
        protected $CURP;
        protected $Domicilio_paciente;
        protected $Telefono_contacto;
        protected $Sexo;
        protected $Edad;

        public function __construct(){
            parent::__construct();
        }
        
        public function new_expediente($CURP){
            $resultado = $this->search_registro($CURP);

            if (!$resultado) {
                $sql = "SELECT * FROM Paciente WHERE CURP= '$CURP'";
                $resultadoOne = $this->_db->query($sql);
                $resultadoPacientes = $resultadoOne->fetch_all(MYSQLI_ASSOC);
                
                $Nombre_paciente = $resultadoPacientes[0]['Nombre'];
                $Last_name = $resultadoPacientes[0]['Last_name'];
                $Domicilio_paciente = $resultadoPacientes[0]['Domicilio'];
                $Sexo = $resultadoPacientes[0]['Sexo'];
                $Edad = $resultadoPacientes[0]['Edad'];
                $Telefono_contacto = $resultadoPacientes[0]['Telefono_contacto'];

                $result = $this->insert($Nombre_paciente, $Last_name, $CURP, $Domicilio_paciente, $Telefono_contacto, $Sexo, $Edad);
                $resultado = $this->search_registro($CURP);
            }
            
            ///Retornamos el resultado de la consulta
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }

        public function search_registro($CURP) {
            $sql = "SELECT * FROM Expediente WHERE CURP='$CURP'";
            
            $consulta = $this->_db->query($sql);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if ($resultado) {
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function insert($Nombre_paciente, $Last_name, $CURP, $Domicilio_paciente, $Telefono_contacto, $Sexo, $Edad) {
            $insercion = "INSERT INTO Expediente VALUES ('$Nombre_paciente', '$Last_name', '$CURP', '$Domicilio_paciente', '$Telefono_contacto', '$Sexo', '$Edad', NULL)";

            $agregar = $this->_db->query($insercion);
            if ($agregar) {
                return $agregar;
                $agregar->close();
                $this->_db->close();
            }
        }
    }
?>