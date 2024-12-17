<?php
// Ruta raíz del servidor
$root = '/home/lisi4150/public_html/generadorActasAPI-Rest/';
require_once($root . 'models/modeloActas.php');

/**
 * Clase actasController.
 * 
 * Controlador para gestionar las operaciones relacionadas con las actas,
 * haciendo uso del modelo `actasModel`.
 */
class actasController {
    /**
     * @var actasModel $model Instancia del modelo para interactuar con la base de datos.
     */
    private $model;

    /**
     * Constructor de la clase actasController.
     * 
     * Inicializa el controlador y crea una instancia del modelo 'actasModel'.
     */
    public function __construct() {
        $this->model = new actasModel();
    }

    /**
     * Guarda una nueva acta en la base de datos.
     * 
     * Este método llama a la función `insertarActa()` del modelo y envía
     * los parámetros necesarios para guardar un nuevo registro en la tabla "actas".
     * Si la inserción es exitosa, redirecciona al formulario de guardado; de lo contrario,
     * redirecciona a la página de inicio.
     *
     * @param string $lugar Lugar donde se registra el acta.
     * @param string $contenido El cuerpo del acta.
     * @param string $observaciones Observaciones adicionales sobre el acta.
     * 
     * @return void Redirecciona a otra página dependiendo del resultado.
     */
    public function saveActa($lugar, $contenido, $observaciones) {
        $id = $this->model->insertarActa($lugar, $contenido, $observaciones);
        ($id == false) ? header("Location: index.php") : header("Location: frmActasSave.php");
    }

    /**
     * Actualiza un acta existente en la base de datos.
     * 
     * Este método llama a la función `modificarActa()` del modelo y envía
     * los parámetros necesarios para actualizar un registro existente en la tabla "actas".
     * Si la actualización es exitosa, redirecciona a la lista de actas; de lo contrario,
     * redirecciona a la página de inicio.
     *
     * @param int $id Identificador único del acta a actualizar.
     * @param string $lugar Lugar donde se registra el acta.
     * @param string $contenido El cuerpo del acta.
     * @param string $observaciones Observaciones adicionales sobre el acta.
     * 
     * @return void Redirecciona a otra página dependiendo del resultado.
     */
    public function updateActa($id, $lugar, $contenido, $observaciones) {
        $result = $this->model->modificarActa($id, $lugar, $contenido, $observaciones);
        ($result == false) ? header("Location: lstActas.php") : header("Location: ../../index.php");
    }

    /**
     * Elimina un acta de la base de datos.
     * 
     * Este método llama a la función `eliminarActa()` del modelo y elimina
     * un registro específico de la tabla "actas".
     * Si la eliminación es exitosa, redirecciona a la lista de actas; de lo contrario,
     * redirecciona a la página de inicio.
     *
     * @param int $id Identificador único del acta a eliminar.
     * 
     * @return void Redirecciona a otra página dependiendo del resultado.
     */
    public function deleteActa($id) {
        $result = $this->model->eliminarActa($id);
        ($result == false) ? header("Location: lstActas.php") : header("Location: ../../index.php");
    }    
    
    /**
     * Obtiene todas las actas de la base de datos.
     * 
     * Este método llama a la función `read()` del modelo para recuperar todos los registros
     * de la tabla "actas".
     *
     * @return array|false Devuelve un array de actas si existen, o 'false' si no hay datos.
     */
    public function readActas() {    
        return $this->model->read() ?: false;
    }

    /**
     * Obtiene una única acta de la base de datos.
     * 
     * Este método llama a la función `readOnce()` del modelo para recuperar un registro
     * específico de la tabla "actas" utilizando su identificador.
     *
     * @param int $id Identificador único del acta a recuperar.
     * 
     * @return array|false Devuelve los datos del acta como un array si existe, o 'false' si no se encuentra.
     */
    public function readActasOnce($id) {
        return $this->model->readOnce($id) ?: false;
    }
}
?>
