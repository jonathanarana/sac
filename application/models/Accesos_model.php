<?php

class Accesos_model extends CI_Model{

  function new_registro($data){
    $this->db->query($this->db->insert_string('Accesos',$data));
    return $this->db->insert_id();
  }
  
  function registrar_salida($last_access){
    $this->db
          ->set('Salida', date('H:i:s'))
          ->where('idAccesos', $last_access)
          ->update('Accesos');
    $this->db->query("UPDATE `Accesos` SET `Tiempo` = TIMEDIFF(`Salida`,`Entrada`) WHERE `idAccesos` = {$last_access}");
    return 'ok';
  }

  function get_idAlumno($matricula){
    $res = $this->db->get_where('Alumnos',array('Matricula' => $matricula))->result_array();
    $id=-1;
    if ($res) {
      $id=$res[0]['idAlumno'];
    }
    return $id;  
  }

  function get_last_login($person){
    //$this->db->select("SELECT * FROM `Accesos` WHERE `Persona`='18000' AND `Salida`=0");
    $res = $this->db->get_where('Accesos', array('Persona' => $person, 'Salida' => 0 ))
                ->result_array();
    $id=-1;
    if ($res) {
      $id=$res[0]['idAccesos'];
    }
    return $id;
  }

  function get_actividades(){
    return $this->db->get('Actividades')->result_array();
  }

  function get_hash_adm($adm){
   $res = $this->db->get_where('Adm',array('User'=>$adm))->result_array();
   return $res[0];
  }

}

?>
