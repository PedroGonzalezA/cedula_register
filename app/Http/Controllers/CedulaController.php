<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Asesor_Aca;
use App\Models\Asesor_Emp;
use App\Models\Empresa;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CedulaController extends Controller
{
    public function store(Request $request) {
        
        $arrayResult = array();

        try{
            
            $ape_paterno        = $request->input('Ape_Paterno');
            $ape_materno        = $request->input('Ape_Materno');
            $nombres            = $request->input('Nombres');
            $tel                = $request->input('Tel');
            $matricula          = $request->input('Matricula');
            $email_per          = $request->input('Email_Per');
            $email              = $request->input('Email');
            $no_ss              = $request->input('No_SS');
            $direccion          = $request->input('Direccion');
            $procesos           = json_decode( $request->input('ID_Procesos') );
            $carrera            = json_decode( $request->input('ID_Carrera') );

            $nombre_emp         = $request->input('Nombre_Emp');
            $giro               = $request->input('Giro');
            $direccion_emp      = $request->input('Direccion_Emp');
            $ape_paternorh      = $request->input('Ape_Paterno_RH');
            $ape_maternorh      = $request->input('Ape_Materno_RH');
            $nombresrh          = $request->input('Nombres_RH');
            $tel_lada           = $request->input('Tel_Lada');
            $tel_num            = $request->input('Tel_Num');
            $tel_ext            = $request->input('Tel_Ext');
            $email_emp          = $request->input('Email_Emp');
            $tipo               = json_decode( $request->input('ID_Tipo') );

            $ape_paterno_ae     = $request->input('Ape_Paterno_AE');
            $ape_materno_ae     = $request->input('Ape_Materno_AE');
            $nombres_ae         = $request->input('Nombres_AE');
            $tel_lada_ae        = $request->input('Tel_Lada_AE');
            $tel_num_ae         = $request->input('Tel_Num_AE');
            $email_ae           = $request->input('Email_AE');
            $cargo              = json_decode( $request->input('ID_Cargo') );

            $ape_paterno_aa     = $request->input('Ape_Paterno_AA');
            $ape_materno_aa     = $request->input('Ape_Materno_AA');
            $nombres_aa         = $request->input('Nombres_AA');
            $tel_lada_aa        = $request->input('Tel_Lada_AA');
            $tel_num_aa         = $request->input('Tel_Num_AA');
            $email_aa           = $request->input('Email_AA');
            $cargo              = json_decode( $request->input('ID_Cargo') );

            $nombre_pro         = $request->input('Nombre_Proyecto');

            /*$currentDate = date("Y-m-d H:i:s");*/

            $data = array(
                'Ape_Paterno'   => $ape_paterno,
                'Ape_Materno'   => $ape_materno,
                'Nombres'       => $nombres,
                'Tel'           => $tel,
                'Matricula'     => $matricula,
                'Email_Per'     => $email_per,
                'Email'         => $email,
                'No_SS'         => $no_ss,
                'Direccion'     => $direccion,
                'ID_Procesos'   => $procesos,
                'ID_Carrera'    => $carrera
            );

            $response_alumno = Alumno::requestInsertAlumno($data);
            
            $data2 = array(
                'Nombre_Emp'    => $nombre_emp,
                'Giro'          => $giro,
                'Direccion_Emp' => $direccion_emp,
                'Ape_Paterno_RH'=> $ape_paternorh,
                'Ape_Materno_RH'=> $ape_maternorh,
                'Nombres_RH'    => $nombresrh,
                'Tel_Lada'      => $tel_lada,
                'Tel_Num'       => $tel_num,
                'Tel_Ext'       => $tel_ext,
                'Email_Emp'     => $email_emp,
                'ID_Tipo'       => $tipo,
                'ID_Alumno'     => $response_alumno['id']
            );

            if ( isset($response_alumno["code"]) && $response_alumno["code"] == 200 ) {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => true,
                        'message'   => "Se ha guardado el registro",
                        'code'      => "200",
                    ),
                );
                $response = Empresa::requestInsertEmpresa($data2);

                if ( isset($response["code"]) && $response["code"] == 200 ) {
                    $arrayResult = array(
                        'Response'  => array(
                            'ok'        => true,
                            'message'   => "Se ha guardado el registro",
                            'code'      => "200",
                        ),
                    );
                    $data3 = array(
                        'Ape_Paterno_AE'=> $ape_paterno_ae,
                        'Ape_Materno_AE'=> $ape_materno_ae,
                        'Nombres_AE'    => $nombres_ae,
                        'Tel_Lada_AE'   => $tel_lada_ae,
                        'Tel_Num_AE'    => $tel_num_ae,
                        'Email_AE'      => $email_ae,
                        'ID_Cargo'      => $cargo,
                        'ID_Alumno'     => $response_alumno['id']
                    );
                    
                    $response = Asesor_Emp::requestInsertAsesor_Emp($data3);
        
                    if ( isset($response["code"]) && $response["code"] == 200 ) {
                        $arrayResult = array(
                            'Response'  => array(
                                'ok'        => true,
                                'message'   => "Se ha guardado el registro",
                                'code'      => "200",
                            ),
                        );

                    } else {
                        $arrayResult = array(
                            'Response'  => array(
                                'ok'        => false,
                                'message'   => $response['message'],
                                'code'      => $response['code']
                            ),
                        );
                    }

                    $data4 = array(

                        'Ape_Paterno_AA'=> $ape_paterno_aa,
                        'Ape_Materno_AA'=> $ape_materno_aa,
                        'Nombres_AA'    => $nombres_aa,
                        'Tel_Lada_AA'   => $tel_lada_aa,
                        'Tel_Num_AA'    => $tel_num_aa,
                        'Email_AA'      => $email_aa,
                        'ID_Cargo'      => $cargo,
                        'ID_Alumno'     => $response_alumno['id']
                    );

                    $response = Asesor_Aca::requestInsertAsesor_Aca($data4);

                    if ( isset($response["code"]) && $response["code"] == 200 ) {
                        $arrayResult = array(
                            'Response'  => array(
                                'ok'        => true,
                                'message'   => "Se ha guardado el registro",
                                'code'      => "200",
                            ),
                        );



                    } else {
                        $arrayResult = array(
                            'Response'  => array(
                                'ok'        => false,
                                'message'   => $response['message'],
                                'code'      => $response['code']
                            ),
                        );
                    }

                } else {
                    $arrayResult = array(
                        'Response'  => array(
                            'ok'        => false,
                            'message'   => $response['message'],
                            'code'      => $response['code']
                        ),
                    );
                }

                $data5 = array(

                    'Nombre_Proyecto'   => $nombre_pro,
                    'ID_Alumno'         => $response_alumno['id']
                );

                $response = Proyecto::requestInsertProyecto($data5);

                if ( isset($response["code"]) && $response["code"] == 200 ) {
                    $arrayResult = array(
                        'Response'  => array(
                            'ok'        => true,
                            'message'   => "Se ha guardado el registro",
                            'code'      => "200",
                        ),
                    );
                    return view('registro_final');
                } else {
                    $arrayResult = array(
                        'Response'  => array(
                            'ok'        => false,
                            'message'   => $response['message'],
                            'code'      => $response['code']
                        ),
                    );
                }

            } else {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => false,
                        'message'   => $response_alumno['message'],
                        'code'      => $response_alumno['code']
                    ),
                );
            }

        } catch(\Illuminate\Database\QueryException $ex) {
            $arrayResult = array(
                'Response'  => array(
                    'message'   => "Error: " . " - " . "Fallo :v",
                    "code"      => "500"
                )
            );
        } catch( Exception $ex ){
            $arrayResult = array(
              'Response' => array(
                'message' => "Error: " . " - " . $ex->getMessage(),
                "code"    => "500"
              )
            );
        }

        return json_encode( $arrayResult );
    }
}
