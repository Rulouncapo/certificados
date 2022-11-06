<?php
session_start();
    include 'conexion.php';
    $usuario = $_SESSION["usuario"];
    if (!isset($usuario)) {
        header("location:../login.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/manual.css">
    <title>Manualmente</title>
</head>
<body>

    <main>
        <article class="constancia">
            <h2>Constancia General</h2>
            <form method="post" action="../pdfsManual/CG.php">
                <div class="form-group">
                    <label for="">Nombre Completo:</label>
                    <input type="input" class="form-control" aria-describedby="" placeholder="Ingresa su nombre" name="nombre">
                    </div>
                    <div class="form-group">
                    <label for="">DNI:</label>
                    <input type="input" class="form-control" name="dni" placeholder="Ingresa el DNI">
                    </div>
                    <div class="form-group">
                        <label for="">Curso:</label>
                        <input type="number" class="form-control" aria-describedby="" placeholder="Ingresa el curso" name="curso">
                    </div>
                    <div class="form-group">
                        <label for="">Orientación:</label>
                        <input type="input" class="form-control" name="orientacion" placeholder="Ingresa Orientación">
                    </div>
                    <div class="contenedor-firmas">
                        <div class="firmas">
                            <label for="">Con Firma</label>
                            <input type="checkbox" name="check" value="1">
                        </div>
                    </div>
                    
           <button type="submit" id="btn_enviar" class="btn btn-primary">Enviar</button>
          </form>
        </article>
        <article class="constancia">
            <h2>Constancia Alumno Regular</h2>

            <form action="../pdfsManual/CAR.php" method="post">
                        <div class="form-group">
                            <label for="">Nombre Completo:</label>
                            <input type="input" class="form-control" aria-describedby="" placeholder="Ingresa su nombre" name="nombre">
                            </div>
                            <div class="form-group">
                            <label for="">DNI:</label>
                            <input type="input" class="form-control" name="dni" placeholder="Ingresa el DNI">
                            </div>
                            <div class="form-group">
                                <label for="">Curso:</label>
                                <input type="number" class="form-control" aria-describedby="" placeholder="Ingresa el curso" name="curso">
                            </div>
                            <div class="form-group">
                                <label for="">División:</label>
                                <input type="input" class="form-control" aria-describedby="" placeholder="Ingresa el división" name="division">
                            </div>
                            <div class="form-group">
                                <label for="">Orientación:</label>
                                <input type="input" class="form-control" name="orientacion" placeholder="Ingresa Orientación">
                            </div>
                        <div class="contenedor-firmas">
                            <div class="firmas">
                                <label for="">Con Firma</label>
                                <input type="checkbox" name="check" value="1">
                            </div>
                        </div>
                    <button type="submit" id="btn_enviar" class="btn btn-primary">Enviar</button>
                    </form>
        </article>
        <article class="constancia">
            <h2>Pase</h2>
            <form action="../pdfsManual/PASE.php" method="post">
                    <div class="form-group">
                        <label for="">Nombre Completo:</label>
                        <input type="input" class="form-control" aria-describedby="" placeholder="Ingresa su nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="">DNI:</label>
                        <input type="input" class="form-control" name="dni" placeholder="Ingresa el DNI">
                    </div>
                    <div class="form-group">
                        <label for="">Curso:</label>
                        <input type="number" class="form-control" aria-describedby="" placeholder="Ingresa el curso" name="curso">
                    </div>
                    <div class="form-group">
                        <label for="">División:</label>
                        <input type="input" class="form-control" aria-describedby="" placeholder="Ingresa el división" name="division">
                    </div>
                    <div class="form-group">
                        <label for="">Director:</label>
                        <input type="input" class="form-control" name="director" placeholder="Ingresa director">
                    </div>
                    <div class="form-group">
                        <label for="">Escuela:</label>
                        <input type="input" class="form-control" name="escuela" placeholder="Ingresa escuela">
                    </div>
                    <div class="form-group">
                        <label for="">Resoluciones:</label>
                        <input type="input" class="form-control" name="resoluciones" placeholder="Ingresa resoluciones">
                    </div>
                    <div class="form-group">
                        <label for="">Comentario:</label>
                        <input type="input" class="form-control" name="comentario" placeholder="Ingresa comentario">
                    </div>
                    <div class="contenedor-firmas">
                        <div class="firmas">
                            <label for="">Con Firma</label>
                            <input type="checkbox" name="check" value="1">
                        </div>
                    </div>
                    <button type="submit" id="btn_enviar" class="btn btn-primary">Enviar</button>
                    </form>
        </article>
        <article class="constancia">
            <h2>Trámite de Analítico </h2>

            <form method="post" action="../pdfsManual/ANA.php">
                <div class="form-group">
                    <label for="">Nombre Completo:</label>
                    <input type="input" class="form-control" aria-describedby="" placeholder="Ingresa su nombre" name="nombre">
                </div>
                <div class="form-group">
                    <label for="">DNI:</label>
                    <input type="input" class="form-control" name="dni" placeholder="Ingresa el DNI">
                </div>
                <div class="form-group">
                    <label for="">Curso:</label>
                    <input type="number" class="form-control" aria-describedby="" placeholder="Ingresa el curso" name="curso">
                </div>
                <div class="form-group">
                    <label for="">Orientación:</label>
                    <input type="input" class="form-control" name="orientacion" placeholder="Ingresa orientación">
                </div>
                <div class="form-group">
                    <label for="">Resoluciones:</label>
                    <input type="input" class="form-control" name="resoluciones" placeholder="Ingresa resoluciones">
                </div>
                <div class="form-group">
                    <label for="">Promedio:</label>
                    <input type="input" class="form-control" name="promedio" placeholder="Ingresa promedio">
                </div>
                        <div class="contenedor-firmas">
                            <div class="firmas">
                                <label for="">Con Firma</label>
                                <input type="checkbox" name="check" value="1">
                            </div>
                        </div>
                    <button type="submit" id="btn_enviar" class="btn btn-primary">Enviar</button>
                    </form>
        </article>
    </main>
    <style>
        .disclaimer{
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }
        .disclaimer h3{
            font-size: 1.1em;
        }
    </style>
    <div class="disclaimer">
        <h2>Aclaraciones:</h2>
        <h3>Los DNI van sin puntos.</h3>
        <h3>El promedio debe aclararse por ejemplo como: "El promedio del alumno en su ultimo año escolar fue de 6.70".</h3>
        <h3>El comentario tiene como motivo el de aclarar materias adeudadas.</h3>
        <h3>La fecha cual es usada en los documentos, es la actual de la computadora.</h3>
    </div>
</body>
</html>