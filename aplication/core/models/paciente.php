<?php

class Paciente{
	
	private $bd;

	private $id_diag;
	private $concepto;
	private $cantidad;
	private $sb_total;
	private $total;

	private $id_paciente;
	private $nombre;
	private $apellido;
	private $cedula;
	private $diag;

	function __construct(){	
		require 'conexion2.php';
		$this->bd = Conectar2::conexion2();        
	}
        
    public function detallesDiagnostico($ci){
        $res = $this->bd->prepare('SELECT * FROM DETALLES_DIAGNOSTICO WHERE ID_DC_P = :ci');
        $res->execute(array(':ci' => $ci));
        $tabla = $res->fetchAll(PDO::FETCH_OBJ);
        return $tabla;
    }
    
    public function setPostDiagNuevo($i,$can,$con,$sb,$t){
        $this->id_diag = $i;
        $this->cantidad = $can;
        $this->concepto = $con;
        $this->sb_total = $sb;
        $this->total = $t;
    }
    public function setPostPacientes($i,$n,$a,$c,$d){

    	$this->id_paciente = $i;
    	$this->nombre = $n;
    	$this->apellido = $a;
    	$this->cedula = $c;
    	$this->diag = $d;
    	
    }
    public function getSelecPacientes(){
        $res = $this->bd->query('SELECT * FROM PACIENTE')->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
    public function setSelecDetallesPac($ci){
        $res = $this->bd->prepare('SELECT * FROM PACIENTE WHERE CEDULA = :ci');
        $res->execute(array(':ci' => $ci));
        $tabla = $res->fetch(PDO::FETCH_OBJ);
        return $tabla;
    }
    public function getSelecCiPacientes(){

        $res = $this->bd->prepare('SELECT * FROM PACIENTE WHERE CEDULA = :c');
        $res->execute(array(":c"=>$this->cedula));

        if ($res->rowCount()) {
        	return 'si';
        }else{
        	return 'no';
        }
    }
    public function getInsetPacientes(){

    	$query = 'INSERT INTO PACIENTE(ID_PACIENTE, NOMBRE, APELLIDO, CEDULA, DIAGNOSTICO) VALUES (:i , :n, :a, :c, :d)';
    	
    	$res = $this->bd->prepare($query);
    	
		$res->execute(array(":i"=>$this->id_paciente, ":n"=>$this->nombre, ":a"=>$this->apellido, ":c"=>$this->cedula, ":d"=>$this->diag));

		echo "registrado"; 
    }
    public function getInsetDiagPaciente(){

        $query = 'INSERT INTO DETALLES_DIAGNOSTICO(ID_DC_P, CANTIDAD, CONCEPTO, SUB_TOTAL, TOTAL) VALUES (:i, :can, :con, :sb, :t)';
        
        $res = $this->bd->prepare($query);
        
        $res->execute(array(":i"=>$this->id_diag, ":can"=>$this->cantidad, ":con"=>$this->concepto, ":sb"=>$this->sb_total, ":t"=>$this->total));

        if($res->rowCount()){
            echo "Nuevo diagnostico"; 
        }else{
            echo "no se puso registrar, intente de nuevo";
        }
    }

    // datos de la tabla paciente
    public function getNombre(){
    	return $this->nombre;
    }
    public function getApellido(){
    	return $this->apellido;
    }
    public function getCedula(){
    	return $this->cedula;
    }
    public function getDiag(){
    	return $this->diag;
    }

    //datos del diagnostico del paciente
    public function setIdDig($i){
        $this->id_diag=$i;
    }
    public function getIdDig(){
        return $this->id_diag;
    }
    public function getCant(){
        return $this->cantidad;
    }
    public function getConc(){
        return $this->concepto;
    }
    public function getSubt(){
        return $this->sb_total;
    }
    public function getTotal(){
        return $this->total;
    }

}//class fin
?>
