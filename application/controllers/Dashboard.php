<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	// Cargar index
	public function index()
	{
		$this->loadView("home");
	}

	// Cargar vista de dashboard para mostrar el inicio de lapagina 
	// o redireccionar al usuario a la vista para iniciar sesión
	public function loadView($view)
	{
		if ($_SESSION['Username']) {

			if ($view == "login") {
				redirect(base_url() . "Dashboard", "location");
			}

			#$dataProfesores = $this->obtenerProfesores();
			#$dataAlumnos = $this->obtenerAlumnos();
			#$dataTasks = $this->obtenerTareas();
			#$dataMessages = $this->obtenerMensajes();

			$data['profesores'] = $this->Site_model->obtenerProfesores();
			$data['alumnos'] = $this->Site_model->obtenerAlumnos($_SESSION['Curso']);
			$data['tareas'] = $this->Site_model->obtenerTareas($_SESSION['Curso']);
			$data['mensajes'] = $this->Site_model->obtenerMensajes($_SESSION['Id_Mensajes']);

			if ($_POST) {
				$_SESSION['Id_Chat'] = $_POST['idChat'];
				$_SESSION['Nombre_Chat'] = $_POST['nombreChat'];
			} 

			$data['mensajesChat'] = $this->Site_model->obtenerMensajesChat($_SESSION['Id_Chat'], $_SESSION['Id_Mensajes']);

			#var_dump($this->db->last_query());

			$this->load->view('includes/header', $data);
			$this->load->view('includes/sidebar');
			$this->load->view($view);
			$this->load->view('includes/footer');
		} else {
			if ($view == "login") {
				$this->load->view($view);
			} else {
				redirect(base_url() . "Dashboard/login", "location");
			}
		}
	}

	// Establecer daya array para enviarlo al modelo 
	// y verificar las credenciales del usuario
	public function login()
	{
		if ($_POST['username'] && $_POST['password']) {
			$login = $this->Site_model->loginUser($_POST);

			if ($login) {
				$array = array(
					"Id" => $login[0]->Id,
					"Nombre" => $login[0]->Nombre,
					"Apellidos" => $login[0]->Apellidos,
					"Username" => $login[0]->Username,
					"Curso" => $login[0]->Curso,
					"Id_Mensajes" => $login[0]->Id_Mensajes,
					"Id_Chat" => null,
					"Nombre_Chat" => null
				);

				// Establecer tipo de usuario (profesor / alumno)
				if (isset($login[0]->Is_Profesor)) {
					$array['tipo'] = "Profesor";
				} else if (isset($login[0]->Is_Alumno)) {
					$array['tipo'] = "Alumno";
				}

				$this->session->set_userdata($array);
			}
		}

		$this->loadView('login');
	}

	// Destruir sesion actual y cargar la vista de login
	public function logout()
	{
		$this->session->sess_destroy();
		$this->loadView('login');
	}

	/*
		CONTROLADOR DE DATOS DE PROFESORES ========================================================================
	*/

	// Llamar al modelo para insertar un profesor en la base de datos
	public function insertarProfesores()
	{
		$this->Site_model->insertarProfesor();
	}

	// Llamar al modelo para obtener los profesores ingresados en base de datos
	public function obtenerProfesores()
	{
		$data['profesores'] = $this->Site_model->obtenerProfesores();
		return $data;
	}

	// Llamar al modelo para actualizar profesor en la base de datos
	public function actualizarProfesor()
	{
		$this->Site_model->actualizarProfesor();
	}

	/*
		CONTROLADOR DE ALUMNOS ========================================================================
	*/

	// Cargar la vista para gestionar alumnos
	public function gestionAlumnos()
	{
		if ($_SESSION['tipo'] == 'Profesor') {
			$this->loadView('gestion_alumnos');
		} else {
			redirect(base_url() . "Dashboard", "location");
		}
	}

	// Eliminar alumno de forma logica
	public function eliminarAlumno()
	{
		if ($_POST['idAlumno']) {
			$this->Site_model->eliminarAlumno($_POST['idAlumno']);
		}
	}

	// Llamar a modelo para obtener los alumnos desde base de datos
	public function obtenerAlumnos()
	{
		$data['alumnos'] = $this->Site_model->obtenerAlumnos($_SESSION['Curso']);
		return $data;
	}

	/*
		CONTROLADOR DE TAREAS ========================================================================
	*/

	// Llamar a metoso para insertar una tarea en base de datos
	// y cargar la vista del formulario para agregar una tarea
	public function crearTareas()
	{
		$this->insertarTarea();
		$this->loadView('crear_tareas');
	}

	public function misTareas()
	{
		if ($_SESSION['Id']) {
			$this->loadView('mis_tareas');
		} else {
			redirect(base_url() . "Dashboard", "location");
		}
	}

	// Llamar al modelo para que obtenga las tareas
	public function obtenerTareas()
	{
		$data['tareas'] = $this->Site_model->obtenerTareas($_SESSION['Curso']);
		return $data;
	}

	// Llamar al modelo para que inserte una tarea en la base de datos
	public function insertarTarea()
	{
		if ($_POST) {
			if ($_FILES['archivo']) {
				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = '*';
				$config['file_name'] = uniqid() . $_FILES['archivo']['name'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('archivo')) {
					echo "error";
				} else {
					$this->Site_model->insertarTarea($_POST, $config['file_name']);
				}
			} else {
				$this->Site_model->insertarTarea($_POST);
			}

			redirect(base_url() . "Dashboard/crearTareas", "location");
		}
	}

	/*
		CONTROLADOR DE MENSAJES ========================================================================
	*/

	public function mensajes()
	{
		if ($_SESSION['Id']) {
			$this->loadView('mensajes');
		} else {
			redirect(base_url() . "Dashboard", "location");
		}
	}

	public function insertarMensaje()
	{
		if ($_POST) {
			$nombre_from = $_SESSION['Nombre']." ".$_SESSION['Apellidos'];
			$this->Site_model->insertarMensaje($_POST, $_SESSION['Id_Mensajes'], $nombre_from);
			redirect(base_url() . "Dashboard/mensajes", "location");
		}
	}

	// Llamar al modelo para que obtenga las tareas
	public function obtenerMensajes()
	{
		$data['mensajes'] = $this->Site_model->obtenerMensajes($_SESSION['Id_Mensajes']);
		return $data;
	}

}
