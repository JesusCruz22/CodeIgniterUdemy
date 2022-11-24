<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		$this->loadView("home");
	}

	// Cargar vista de dashboard para mostrar el inicio de lapagina 
	// o redireccionar al usuario a la vista para iniciar sesión
	public function loadView($view, $data = null)
	{

		if ($_SESSION['Username']) {

			if ($view == "login") {
				redirect(base_url() . "Dashboard", "location");
			}

			$this->load->view('includes/header');
			$this->load->view('includes/sidebar');
			$this->load->view($view, $data);
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

	public function logout()
	{
	}

	// Cargar la vista para gestionar alumnos
	public function gestionAlumnos()
	{
		if ($_SESSION['tipo'] == 'Profesor') {
			$data['alumnos'] = $this->Site_model->obtenerAlumnos($_SESSION['Curso']);
			$this->loadView('gestion_alumnos', $data);
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
			$data['tareas'] = $this->Site_model->obtenerTarea($_SESSION['Curso']);
			$this->loadView('mis_tareas', $data);
		} else {
			redirect(base_url() . "Dashboard", "location");
		}
	}


	/*
		CONTROLADOR DE DATOS DE PROFESORES
	*/

	// Llamar al modelo para insertar un profesor en la base de datos
	public function insertarProfesores()
	{
		$this->Site_model->insertarProfesor();
	}

	// Llamar al modelo para obtener los profesores ingresados en base de datos
	public function obtenerProfesores()
	{
		$profesores = $this->Site_model->obtenerProfesores();
		print_r($profesores);
	}

	// Llamar al modelo para actualizar profesor en la base de datos
	public function actualizarProfesor()
	{
		$this->Site_model->actualizarProfesor();
	}

	/*
		CONTROLADOR DE DATOS DE TAREAS
	*/

	// Llamar al modelo para que inserte una tarea en la base de datos
	public function insertarTarea()
	{
		if ($_POST) {
			if ($_FILES['archivo']) {
				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = 'gif|jpg|png';
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
		}
	}
}
