<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Exception;

class Empresa extends Model
{
    protected $table = 'empresa';

    public static function getAllEmpresa() {
        return \DB::table('empresa')
            ->join('Alumno', 'Empresa.ID_Alumno', '=', 'ID_Alumno')
            ->select('Empresa.*', 'Alumno.email as alumno_name')
            ->get();
    }

    /**
     * LLamada a la peticion para agregar un nuevo marcador
     * Tambien devuelve la llamada si Ocurrió algun error
    */

    public static function requestInsertEmpresa($data) {

        try{

            $response = self::insertEmpresa($data);
            if (isset($response["code"]) && $response["code"] == 200) {
                return $response;
            }else{
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

    public static function insertEmpresa($data) {

        $arrayResponse = array();

        try{
            $empresaId = \DB::table('empresa')->insertGetId($data);
            
            $arrayResponse = array(
                "code"      => 200,
                "message"   => "Se ha agragado el registro",
                "id" => $empresaId
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
