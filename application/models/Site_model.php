<?php

class Site_model extends CI_Model
{

    // Verificar credenciales del usuario para iniciar sesión
    // devuelve el resultado de la cosnulta a la base de datos
    public function loginUser($data)
    {
        $this->db->select('*');
        $this->db->from('profesores');
        $this->db->where('Username', $data['username']);
        $this->db->where('Password', $data['password']);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            $this->db->select('*');
            $this->db->from('alumnos');
            $this->db->where('Username', $data['username']);
            $this->db->where('Password', $data['password']);

            $query = $this->db->get();

            if ($query->num_rows() > 0) return $query->result();

            return NULL;
        }
    }

    /*
        Datos de Profesores
    */

    // Inserta los datos de un profesor especificado 
    // en un array los datos definidos en el mismo metodo
    public function insertarProfesor()
    {
        $array = array(
            "Nombre" => "David",
            "Apellidos" => "Navarro",
            "Curso" => 3
        );

        $this->db->insert("profesores", $array);
    }

    // Obtiene los profesores insertados en base de datos
    // devuelve una lista de profesores
    public function obtenerProfesores()
    {
        $this->db->select('*');
        $this->db->from('profesores');
        $this->db->where('Is_Deleted', 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    // Actualiza los datos de un profesor por nuevos datos
    // especificados en el mismo metodo
    public function actualizarProfesor()
    {
        $array = array(
            "Nombre" => "David",
            "Apellidos" => "Navarro Lopez",
            "Curso" => 1
        );

        $this->db->where("Id", 0);
        $this->db->update("profesores", $array);
    }

    /*
        Datos de Alumnos
    */

    // Obtiene los alumnos insertados en base de datos
    // devuelve una lista de alumnos
    public function obtenerAlumnos($curso)
    {
        $this->db->select('*');
        $this->db->from('alumnos');
        $this->db->where('Curso', $curso);
        $this->db->where('Is_Deleted', 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    // Elimina un alumno especifico de forma logica
    public function eliminarAlumno($id)
    {
        $array = array(
            "Is_Deleted" => 1
        );

        $this->db->where('Id', $id);
        $this->db->update('alumnos', $array);
    }

    // Insertar una tarea en base de datos
    public function insertarTarea($data, $archivo = null)
    {
        if ($archivo) {
            $array = array(
                "Titulo" => $data['titulo'],
                "Descripcion" => $data['descripcion'],
                "FechaFinal" => $data['fecha'],
                "Archivo" => $archivo,
                "Curso" => $data['curso']
            );
        } else {
            $array = array(
                "Titulo" => $data['titulo'],
                "Descripcion" => $data['descripcion'],
                "FechaFinal" => $data['fecha'],
                "Curso" => $data['curso']
            );
        }

        $this->db->insert('tareas', $array);
    }

    // Obtener la lista de tareas insertadas en base de datos
    public function obtenerTarea($curso)
    {
        $this->db->select('*');
        $this->db->from('tareas');
        $this->db->where('Curso', $curso);
        $this->db->order_by('FechaFinal', 'ASC');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
}
