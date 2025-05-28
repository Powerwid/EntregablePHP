<?php 
    class AsignacionProyecto {
        private $id_asignacion;
        private $id_proyecto;
        private $id_usuario;
        private $rol_en_proyecto;
        private $fecha_asignacion;
        // Getters and Setters
        // ID_Asignacion
        public function getId_asignacion(){
                return $this->id_asignacion;
        }
        public function setId_asignacion($id_asignacion){
                $this->id_asignacion = $id_asignacion;
        }
        // ID_Proyecto
        public function getId_proyecto(){
                return $this->id_proyecto;
        }
        public function setId_proyecto($id_proyecto){
                $this->id_proyecto = $id_proyecto;
        }
        // ID_Usuario
        public function getId_usuario(){
                return $this->id_usuario;
        }
        public function setId_usuario($id_usuario){
                $this->id_usuario = $id_usuario;
        }
        // Rol en Proyecto
        public function getRol_en_proyecto(){
                return $this->rol_en_proyecto;
        }
        public function setRol_en_proyecto($rol_en_proyecto){
                $this->rol_en_proyecto = $rol_en_proyecto;
        }
        // Fecha de Asignacion
        public function getFecha_asignacion(){
                return $this->fecha_asignacion;
        }
        public function setFecha_asignacion($fecha_asignacion){
                $this->fecha_asignacion = $fecha_asignacion;
        }
    }
?>