<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Documentación de Estancias y Estadias</title>

    <link rel="stylesheet" href="css/menu.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://www.google.com/recaptcha/api.js"></script>

    <script>
   function onSubmit(token) {
     document.getElementById("form-login").submit();
   }
 </script>

    <style>
        .row-color {
            background-color: #16355a;   
        }
        h2 {
            color: #fff;
        }
        /*.margin-bottom {
            margin-bottom: 8px;
        }*/
    </style>
</head>

<body>
    <nav class="navbar navbar-dark primary-color">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://2.bp.blogspot.com/-lloP7I7aXg8/Waty2XI6eBI/AAAAAAAACPw/XnXPjhNNTM4kPA4fVhV9_U-DRtpgvCnzwCLcBGAs/s1600/upqroo2.png" height="70" alt="upqroo logo">
            </a>
            <ul class="nav navbar-nav mx-auto">
                    <h3 class="text-center">Universidad Politécnica de Quintana Roo</h3>
                    <h3 class="text-center">Dirección de Vinculación, Difusión y Extensión Universitaria</h3>
                    <h4 class="text-center">CÉDULA DE REGISTRO DE ESTANCIAS Y ESTADIAS</h4>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <div class="container">
        <!--<div class="row">
            <div class="col-12">
                <h3 class="text-center">Universidad Politécnica de Quintana Roo</h3>
                <h3 class="text-center">Dirección de Vinculación, Difusión y Extensión Universitaria</h3>
                <h4 class="text-center">CÉDULA DE REGISTRO DE ESTANCIAS Y ESTADIAS</h4>
            </div>
        </div>-->
        @if(auth()->check())
        <li>
            <p class="text-xl">Welcome <b>{{ auth()->user()->name }}</b></p>
            <a href="{{ route('login.destroy') }}">Log Out</a>
        </li>
        <form method="POST" action="{{ route('home.store') }}">
            @csrf
            <div class="form-row">
                <div class="col-12 row-color margin-bottom">
                    <h2>Datos del Alumno/a:</h2>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Nombre:</label>
                    <input type="text" class="form-control" name="Ape_Paterno" id="" placeholder="Apellido Paterno" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="">&nbsp;</label>
                    <input type="text" class="form-control" name="Ape_Materno" id="" placeholder="Apellido Materno" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="">&nbsp;</label>
                    <input type="text" class="form-control" name="Nombres" id="" placeholder="Nombre[s]" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Tel:</label>
                    <input type="text" class="form-control" name="Tel" id="" required>
                </div>
                <div class="form-group col-6">
                    <label for="">Proceso:</label>
                    <select class="form-control" name="ID_Procesos" id="">
                        <option value="1">Estancia 1</option>
                        <option value="2">Estancia 2</option>
                        <option value="3">Estadía</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Matrícula:</label>
                    <input type="text" class="form-control" name="Matricula" id="" placeholder="ejem: 2018..." required>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Carrera:</label>
                    <select class="form-control" name="ID_Carrera" id="" aria-label="">
                        <option value="1">Ing. Biomédica</option>
                        <option value="2">Ing. Biotecnología</option>
                        <option value="3">Ing. Financiera</option>
                        <option value="4">Ing. Software</option>
                        <option value="5">Lic. Admon Y Gestion De PyMes</option>
                        <option value="6">Lic. Gestión Empresarial</option>
                        <option value="7">Lic. Terapia Física</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="">E-mail:</label>
                    <input type="email" class="form-control" name="Email_Per" id="" placeholder="Personal" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="">E-mail:</label>
                    <input type="email" class="form-control" name="Email" id="" placeholder="UPQROO" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="">N°. Seguridad Social:</label>
                    <input type="text" class="form-control" name="No_SS" id="" placeholder="" required>
                </div>
                <div class="form-group col-md-8">
                    <label for="">Dirección:</label>
                    <input type="text" class="form-control" name="Direccion" id="" placeholder="1234 Calle Prin." required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 row-color margin-bottom">
                    <h2>Datos de la Empresa:</h2>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Nombre:</label>
                    <input type="text" class="form-control" name="Nombre_Emp" id="" placeholder="Nombre Comercial o Publico" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Giro:</label>
                    <input type="text" class="form-control" name="Giro" id="" placeholder="Ejemplo: Servicios" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Tipo:</label>
                    <select name="ID_Tipo" id="" class="form-control">
                        <option value="1">Micro</option>
                        <option value="2">Pequeña</option>
                        <option value="3">Mediana</option>
                        <option value="4">Grande</option>
                    </select>
                </div>
                <div class="form-group col-12">
                    <label for="">Dirección:</label>
                    <input type="text" class="form-control" name="Direccion_Emp" id="" placeholder="1234 Calle Prin." required>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Responsable de Recursos Humanos:</label>
                    <input type="text" class="form-control" name="Ape_Paterno_RH" id="" placeholder="Apellido Paterno" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="">&nbsp;</label>
                    <input type="text" class="form-control" name="Ape_Materno_RH" id="" placeholder="Apellido Materno" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="">&nbsp;</label>
                    <input type="text" class="form-control" name="Nombres_RH" id="" placeholder="Nombre[s]" required>
                </div>
                <div class="form-group col-md-1">
                    <label for="">Tel:</label>
                    <input type="text" class="form-control" name="Tel_Lada" id="" placeholder="Lada">
                </div>
                <div class="form-group col-md-3">
                    <label for="">&nbsp;</label>
                    <input type="text" class="form-control" name="Tel_Num" id="" placeholder="Número" required>
                </div>
                <div class="form-group col-md-1">
                    <label for="">&nbsp;</label>
                    <input type="text" class="form-control" name="Tel_Ext" id="" placeholder="Ext.">
                </div>
                <div class="form-group col-md-7">
                    <label for="">E-mail:</label>
                    <input type="email" class="form-control" name="Email_Emp" id="" placeholder="Email empresa" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 row-color margin-bottom">
                    <h2>Datos del Asesor Empresarial:</h2>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Nombre:</label>
                    <input type="text" class="form-control" name="Ape_Paterno_AE" id="" placeholder="Apellido Paterno" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="">&nbsp;</label>
                    <input type="text" class="form-control" name="Ape_Materno_AE" id="" placeholder="Apellido Materno" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="">&nbsp;</label>
                    <input type="text" class="form-control" name="Nombres_AE" id="" placeholder="Nombre[s]" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Cargo:</label>
                    <select class="form-control" name="ID_Cargo" id="">
                        <option value="1">Lic.</option>
                        <option value="2">Ing.</option>
                        <option value="3">Mtro.</option>
                        <option value="4">Arq.</option>
                        <option value="5">Dr.</option>
                        <option value="6">Dra.</option>
                        <option value="7">C.P.T</option>
                        <option value="8">Profr.</option>
                        <option value="9">Profra.</option>
                    </select>
                </div>
                <div class="form-group col-md-1">
                    <label for="">Tel:</label>
                    <input type="text" class="form-control" name="Tel_Lada_AE" id="" placeholder="Lada">
                </div>
                <div class="form-group col-md-3">
                    <label for="">&nbsp;</label>
                    <input type="text" class="form-control" name="Tel_Num_AE" id="" placeholder="Número" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="">&nbsp;</label>
                    <input type="email" class="form-control" name="Email_AE" id="" placeholder="E-mail">
                </div>
                <!--<div class="form-group col">
                    <label for="">Firma:</label>
                    <canvas id="cnv" class="form-control col-12" name="cnv" height="20" style="background-color: #fff; border-bottom: 1px solid black;"></canvas>
                </div>-->
            </div>
            <div class="form-row">
                <div class="col-12 row-color margin-bottom">
                    <h2>Datos del Asesor Académico:</h2>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Nombre:</label>
                    <input type="text" class="form-control" name="Ape_Paterno_AA" id="" placeholder="Apellido Paterno" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="">&nbsp;</label>
                    <input type="text" class="form-control" name="Ape_Materno_AA" id="" placeholder="Apellido Materno" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="">&nbsp;</label>
                    <input type="text" class="form-control" name="Nombres_AA" id="" placeholder="Nombre[s]" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Cargo:</label>
                    <select class="form-control" name="ID_Cargo" id="">
                        <option value="1">Lic.</option>
                        <option value="2">Ing.</option>
                        <option value="3">Mtro.</option>
                        <option value="4">Arq.</option>
                        <option value="5">Dr.</option>
                        <option value="6">Dra.</option>
                        <option value="7">C.P.T</option>
                        <option value="8">Profr.</option>
                        <option value="9">Profra.</option>
                    </select>
                </div>
                <div class="form-group col-md-1">
                    <label for="">Tel:</label>
                    <input type="text" class="form-control" name="Tel_Lada_AA" id="" placeholder="Lada">
                </div>
                <div class="form-group col-md-3">
                    <label for="">&nbsp;</label>
                    <input type="text" class="form-control" name="Tel_Num_AA" id="" placeholder="Número" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="">&nbsp;</label>
                    <input type="email" class="form-control" name="Email_AA" id="" placeholder="E-mail">
                </div>
                <!--<div class="form-group col">
                    <label for="">Firma:</label>
                    <canvas id="cnv" class="form-control col-12" name="cnv" height="20" style="background-color: #fff; border-bottom: 1px solid black;"></canvas>
                </div>-->
            </div>
            <div class="form-row">
                <div class="col-12 row-color margin-bottom">
                    <h2>Datos del Proyecto:</h2>
                </div>
                <div class="form-group col-12">
                    <label for="">Nombre:</label>
                    <input type="text" class="form-control" name="Nombre_Proyecto" id="" placeholder="Nombre Proyecto" required>
                </div>
                <!--<div class="form-group row justify-content-md-center">
                    <div class="col-md-auto">
                        <div class="input-group">
                            <div class="col align-self-center">
                                <canvas id="cnv" class="form-control col-12" name="cnv" height="70" style="background-color: #fff; border-bottom: 1px solid black;"></canvas>
                                <small class="form-text text-muted text-center">Firma del Alumno </small>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
            <div class="pt-1 mb-4">
                            <button class="btn btn-dark btn-lg btn-block" type="submit">Guardar</button>
                        </div>
            <!--<button class="g-recaptcha" 
                    data-sitekey="6LedJ78dAAAAAPmUrFR2Qkm3U63zK0Uj0LILa-h3" 
                    data-callback='onSubmit' 
                    data-action='submit'>Submit</button>-->
        </form>
        @else
            kajksjaksj
        @endif
    </div>
</body>
</html>