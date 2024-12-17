<?php

/**
 * Clase Actas para gestionar la interacción con la tabla 'actas' en la base de datos.
 * 
 * Proporciona métodos para realizar operaciones CRUD (Create, Read, Update, Delete)
 * en la tabla 'actas'.
 * @author Jesús Manuel Valverde Pérez <jesusvalverde.dev@gmail.com>
 */
class Actas
{
    /**
     * Conexión a la base de datos.
     *
     * @var PDO
     */
    private $conn;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    private $tabla = "actas";

    /**
     * ID de la acta.
     *
     * @var int
     */
    public $id;

    /**
     * Fecha de la acta.
     *
     * @var string
     */
    public $fecha;

    /**
     * Lugar relacionado con la acta.
     *
     * @var string
     */
    public $lugar;

    /**
     * Contenido de la acta.
     *
     * @var string
     */
    public $contenido;

    /**
     * Observaciones adicionales de la acta.
     *
     * @var string
     */
    public $observaciones;

    /**
     * Constructor de la clase Actas.
     * 
     * Inicializa la conexión a la base de datos.
     *
     * @param PDO $db Objeto PDO que representa la conexión a la base de datos.
     */
    public function __construct($db)
    {
        $this->conn = $db;
    }

    /**
     * Obtiene todas las actas de la tabla 'actas'.
     *
     * @return array|false Devuelve un array asociativo con las actas si hay registros o false en caso de error.
     */
    public function getActas()
    {
        $consultaSQL = "SELECT
                id, 
                fecha, 
                lugar, 
                contenido, 
                observaciones
            FROM
                " . $this->tabla;

        $stmt = $this->conn->prepare($consultaSQL);
        return ($stmt->execute()) ? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    /**
     * Obtiene una acta específica por su ID.
     *
     * Asigna los valores de la acta obtenida a las propiedades de la clase.
     *
     * @return void
     */
    public function getActa()
    {
        $consultaSQL = "SELECT
                id, 
                fecha, 
                lugar, 
                contenido, 
                observaciones
            FROM 
                " . $this->tabla . "
            WHERE id = ?
            LIMIT 0,1";

        $stmt = $this->conn->prepare($consultaSQL);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dataRow) {
            $this->fecha = $dataRow["fecha"];
            $this->lugar = $dataRow["lugar"];
            $this->contenido = $dataRow["contenido"];
            $this->observaciones = $dataRow["observaciones"];
        }
    }

    /**
     * Inserta una nueva acta en la tabla 'actas'.
     *
     * @return bool Devuelve true si la operación fue exitosa, false en caso contrario.
     */
    public function setActa()
    {
        $consultaSQL = "INSERT INTO
            " . $this->tabla . "
                (fecha, lugar, contenido, observaciones)
            VALUES
                (:fecha, :lugar, :contenido, :observaciones)";

        $stmt = $this->conn->prepare($consultaSQL);

        $this->fecha = htmlspecialchars($this->fecha);
        $this->lugar = htmlspecialchars($this->lugar);
        $this->contenido = htmlspecialchars($this->contenido);
        $this->observaciones = htmlspecialchars($this->observaciones);

        $stmt->bindParam(":fecha", $this->fecha);
        $stmt->bindParam(":lugar", $this->lugar);
        $stmt->bindParam(":contenido", $this->contenido);
        $stmt->bindParam(":observaciones", $this->observaciones);

        return ($stmt->execute()) ? true : false;
    }

    /**
     * Actualiza una acta existente en la tabla 'actas' usando su ID.
     *
     * @return bool Devuelve true si la operación fue exitosa, false en caso contrario.
     */
    public function updateActa()
    {
        $consultaSQL = "UPDATE " . $this->tabla . "
            SET
                fecha = :fecha,
                lugar = :lugar,
                contenido = :contenido,
                observaciones = :observaciones
            WHERE
                id = :id";

        $stmt = $this->conn->prepare($consultaSQL);

        $this->fecha = htmlspecialchars($this->fecha);
        $this->lugar = htmlspecialchars($this->lugar);
        $this->contenido = htmlspecialchars($this->contenido);
        $this->observaciones = htmlspecialchars($this->observaciones);
        $this->id = htmlspecialchars($this->id);

        $stmt->bindParam(":fecha", $this->fecha);
        $stmt->bindParam(":lugar", $this->lugar);
        $stmt->bindParam(":contenido", $this->contenido);
        $stmt->bindParam(":observaciones", $this->observaciones);
        $stmt->bindParam(":id", $this->id);

        return ($stmt->execute()) ? true : false;
    }

    /**
     * Elimina una acta de la tabla 'actas' usando su ID.
     *
     * @return bool Devuelve true si la operación fue exitosa, false en caso contrario.
     */
    public function deleteActa()
    {
        $consultaSQL = "DELETE FROM " . $this->tabla . " WHERE id = ?";

        $stmt = $this->conn->prepare($consultaSQL);
        $stmt->bindParam(1, $this->id);

        return ($stmt->execute()) ? true : false;
    }
}
?>