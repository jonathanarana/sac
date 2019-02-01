<?php

class Reportes_model extends CI_Model{

  function get_nusers(){
    $nusers=$this->db->query("SELECT COUNT(`IdAccesos`) AS `nusers` FROM `Accesos` WHERE `Salida`='0'")->result_array();
    return $nusers[0]['nusers'];
  }

  function get_lusers(){
    return $this->db->query("SELECT * FROM `Accesos` JOIN `Alumnos` ON `idAlumno`=`Persona` WHERE `Salida`='0'")->result_array();
  }

  function get_summary($matricula,$inicio,$fin){
  	return $this->db->query("SELECT `Accesos`.*, `Alumnos`.`Matricula` FROM `Accesos` JOIN `Alumnos`ON `idAlumno`=`Persona` WHERE `Matricula`='{$matricula}' AND `Fecha`>='{$inicio}' AND `Fecha` <='{$fin}'")->result_array();
  }

}?>
