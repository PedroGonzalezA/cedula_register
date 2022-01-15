<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Exception;

class Alumno extends Model
{
    protected $table = 'Alumno';

    /**
     * LLamada a la peticion para agregar un nuevo marcador
     * Tambien devuelve la llamada si Ocurrió algun error
    */

    public static function requestInsertAlumno($data) {

        try{

            $response = self::insertAlumno($data);
            if (isset($response["code"]) && $response["code"] == 200) {
                return $response;
            } else {
                return $response;
            }
        }catch(Exception $e) {
            return array(
                "code" => 500,
                "success" => false,
                "message" => $e->getMessage()
              );
        }
    }

    /**
     * Agrega una marca nueva
    */

    public static function insertAlumno($data) {

        $arrayResponse = array();

        try{
            
            $alumnoId = \DB::table('Alumno')->insertGetId($data);
            
            $arrayResponse = array(
                "code"      => 200,
                "message"   => "Se ha agragado el registro",
                "id" => $alumnoId
            );
        }catch (Exception $e) {
            $arrayResponse = array(
                "code"      => 500,
                "message"   => "Ocurrió un error al intentar agregar el registro. Error" . $e->getMessage()
            );
        }

        return $arrayResponse;
    }
}
