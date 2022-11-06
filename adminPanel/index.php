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
    <link rel="stylesheet" href="../styles/estilos.css">
    <title>Oficina de alumnos</title>
</head>
<body> 
     
    <div class="container">

    <div class="center">
    <div class="header">
        <img class="logo" src="../img/logoblanco.png" alt="">
        
        <div class="titulos">
        <h1 class="titulo">
            Escuela de Educación Secundaria Técnica Nº 1 "Raúl Scalabrini Ortiz"
        </h1>
        <h1 class="titulillo">
            EESTN1
        </h1>
    </div>
    <div>
        <a href="cerrarSesion.php">Cerrar Sesión</a>
    </div>
    </div>
    </div>

    <div class="contenedor">
        <main>
           <section id="temporal"></section>
           <section id="nativo" class="botones">
            <article class="boton btn-1">
              
                <span class="cerrar">&times;</span>
                <div class="icono ">
                   <!-- <div class="icono-arriba"><img src="document.png" alt=""></div> -->
                    <div class="icono-abajo"><h3>Constancia General</h3></div>                                                                 
                </div>          
                <div class="oculto">
                    <div class="apartado">
                    <form action="../pdfs/CG.php" method="post" >
                            <input type="input" name="dni" id="" placeholder="Ingrese DNI del alumno">
                            <div class="firmas">
                                <label for="">Con Firma</label>
                                <input type="checkbox" name="check" value="1">
                            </div>
                            
                            <button class="submit">Ingresar</button>
                    </form>
                    </div>
                </div>
            
            </article>
            <article class="boton btn-2">
                <span class="cerrar">&times;</span>
                <div class="icono">
                   <!-- <div class="icono-arriba"><img src="document.png" alt="">  </div>-->
                    <div class="icono-abajo"><h3>Constancia Alumno Regular</h3></div>              
                </div>
                <div class="oculto">
                    <div class="apartado">
                    <form action="../pdfs/CAR.php" method="post">
                            <input type="input" name="dni" id="" placeholder="Ingrese DNI del alumno">
                            <div class="firmas">
                                <label for="">Con Firma</label>
                                <input type="checkbox" name="check" value="1">
                            </div>
                            <button class="submit">Ingresar</button>
                            
                    </form>
                </div>
                </div>
            </article>
            <article class="boton btn-3">
                  <span class="cerrar">&times;</span>
                <div class="icono">
                   <!-- <div class="icono-arriba"><img src="document.png" alt=""></div>-->
                    <div class="icono-abajo"> <h3>Pase</h3></div>                                        
                </div>
                <div class="oculto">
                    <div class="apartado2">
                    <form action="../pdfs/PASE.php" method="post" >
                    <div class="parte2">
                        <div class="partes1">
                            <label name="dni"class="">DNI:</label>
                            <input type="input" name="dni" >
                        </div>
                        <div class="partes1">
                            <label name="Director"class="">Director:</label>
                            <input type="input" name="director">
                        </div>                        
                        <div class="partes1">
                            <label name="escuela"class="">Escuela:</label>
                            <input type="input" name="escuela">
                        </div>
                    </div>
                    
                    <div class="parte2">
                        <div class="partes1">
                            <label name="resolucion"class="">Resoluciones:</label>
                            <input type="input" name="resolucion">
                        </div>
                        <div class="partes1">
                            <label name="Comentario"class="">Comentario:</label>
                            <input type="text" name="comentario">   
                        </div>                 
                        <div class="firmas">
                                <label for="">Con Firma</label>
                                <input type="checkbox" name="check" value="1">
                        </div>
                            
                            <button class="submit">Ingresar</button>
                    </div>
             
                    </form>   
                </div>
                </div>
            </article>
            <article class="boton btn-4">
                <span class="cerrar">&times;</span>
                <div class="icono">
                   <!-- <div class="icono-arriba"><img src="document.png" alt="">  </div> -->
                    <div class="icono-abajo"> <h3>Trámite de Analítico </h3>     </div>                         
                </div>
                <div class="oculto">
                <div class="apartado2">
                    <form action="../pdfs/ANA.php" method="post">
                        
                    <div class="parte2">
                    <div class="partes1">
                            <label name="dni"class="">DNI:</label>
                            <input type="input" name="dni" >
                        </div>
                        <div class="partes1">
                            <label name="promedio"class="">Promedio:</label>
                            <input type="input" name="promedio">
                        </div> 
                    </div>

                    <div class="parte2">
                        <div class="partes1">
                            <label name="resolucion"class="">Resoluciónes:</label>
                            <input type="input" name="resolucion">
                        </div> 
                        <div class="firmas">
                                <label for="">Con Firma</label>
                                <input type="checkbox" name="check" value="1">
                        </div>
                        <button class="submit">Ingresar</button>
                        </div>
                    </form></div>
                </div>
            </article> 
            <article class="boton btn-5">
                  <span class="cerrar">&times;</span>
                <div class="icono">
                   <!-- <div class="icono-arriba"><img src="document.png" alt=""></div>-->
                    <div class="icono-abajo"> <h3>Constancia de Vacante</h3></div>                                        
                </div>
                <div class="oculto">
                    <div class="apartado2">
                    <form action="../pdfs/CV.php" method="post" >
                    <div class="parte2">
                        <div class="partes1">
                            <label name="dni"class="">DNI:</label>
                            <input type="input" name="dni" >
                        </div>
                        <div class="partes1">
                            <label name="nombre"class="">Nombre:</label>
                            <input type="input" name="nombre">
                        </div>                        
                        <div class="partes1">
                            <label name="curso"class="">Curso:</label>
                            <input type="input" name="curso">
                        </div>
                    </div>
                    
                    <div class="parte2">
                        <div class="partes1">
                            <label name="division"class="">División:</label>
                            <input type="input" name="division">
                        </div>             
                        <div class="firmas">
                                <label for="">Con Firma</label>
                                <input type="checkbox" name="check" value="1">
                            </div>    
                            <button class="submit">Ingresar</button>
                    </div>
             
                    </form>   </div>
                </div>
            </article>   
            <!-- <article class="boton btn-6">
                  <span class="cerrar">&times;</span>
                <div class="icono">
                   <div class="icono-arriba"><img src="document.png" alt=""></div>
                    <div class="icono-abajo"> <h3>Metodo manual</h3></div>                                        
                </div>
                <div class="oculto">
                    <div class="botonera">
                        button.boton*

                    </div>
                    <div class="apartado2">
                    <form action="pdfs/CV.php" method="post" >
                    <div class="parte2">
                        <div class="partes1">
                            <label name="dni"class="">DNI:</label>
                            <input type="input" name="dni" >
                        </div>
                        <div class="partes1">
                            <label name="nombre"class="">Nombre:</label>
                            <input type="input" name="nombre">
                        </div>                        
                        <div class="partes1">
                            <label name="curso"class="">Curso:</label>
                            <input type="input" name="curso">
                        </div>
                    </div>
                    
                    <div class="parte2">
                        <div class="partes1">
                            <label name="division"class="">División:</label>
                            <input type="input" name="division">
                        </div>             
                        <div class="firmas">
                                <label for="">Con Firma</label>
                                <input type="checkbox" name="check" value="1">
                            </div>    
                            <button class="submit">Ingresar</button>
                    </div>
             
                    </form>   
                </div>
                </div>
            </article>   -->
            <a href="manual.php">
                <article class="boton btn-6">
                    <h3>Método Manual</h3>
                </article>
            </a>
          
        </section> 
        </main>
        
    </div>




    <div class="footer">

            <img src="../img/logoprog.png" class="logo" alt="">
            <img src="../img/logo3.jpg" class="logo3" alt="">
    </div>
    <style>
        .honores{
            position: absolute;
            bottom: -10;
            left: -10;

        }
    </style>
    <section class="honores">
        <!-- <h2>Realizado por Alumnos de 7°B 704 Ivan Ferro, Antonella Ghiorzi, Gaston Gomez, Enzo Alegre, Santiago Fernandez y Morena Cupolillo.</h2> -->
    </section>

<script>
    var botones                  =document.getElementsByClassName("boton");
    var iconos                   =document.getElementsByClassName("icono");
    var oculto                   =document.getElementsByClassName("oculto");
    var cerrar                   =document.getElementsByClassName("cerrar");
    var contenedor_botones       =document.getElementById("nativo");        
    

    // console.log(oculto);
    // console.log(cerrar);
    // console.log(botones);

    for (let i = 0; i < iconos.length; i++) {
        iconos[i].addEventListener('click',()=>{
            botones[i].classList.add("card_open");
            oculto[i].style.display = "flex";   
            iconos[i].style.display = "none";   
            cerrar[i].style.display = "flex";   
            botones[i].style.order = "-1";
            
        })
       cerrar[i].addEventListener('click', ()=>{
        botones[i].classList.remove("card_open");
        iconos[i].style.display = "flex";   
        oculto[i].style.display = "none";  
        cerrar[i].style.display = "none";   
        botones[i].style.order = "0";
       })
    }
</script>

</body>
</html>