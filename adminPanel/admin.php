<?php
    require_once '../adminPanel/conexion.php';
        $usuario = $_SESSION["usuario"];
        $rol =$_SESSION["rol"];
        if (!isset($usuario) || $rol == 0) {
            header("location:../login.html");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../styles/admin.css">

    <title>Document</title>
</head>
<body>
    
    <main>
         <div class="contenedor">
            <header>
                <div class="logo">
                    <img src="..\img\card.svg" alt="">
                </div>
                <div class="contenedor-titulo">
                    <span><img src="../img/navbar.svg" alt=""></span>
                    <button class="boton-default" id="Anadir">
                        Añadir user
                    </button>
                    <a  href="index.php">
                        <button class="boton-default" id="Certificados">
                            Certificados
                        </button>
                    </a>
                    <button class="boton-default" id="cerrarSesion">
                        Cerrar Sesión
                    </button>
                </div>
            </header>
            
            <section>
                <article class="could">
                    <style>
                        #editarlo{
                            display: none;
                        }
                    </style>
                    <div id="editarlo">
                        <form class="formulario" id="form-editar">
                                <h2>Editar usuario</h2>
                            <div class="grupo-form">
                                <label for="">DNI:</label>
                                <input type="number" class="input-form" name="DNI">
                            </div>
                            <div class="grupo-form">
                                <label for="">Nombre:</label>
                                <input type="email" class="input-form" name="nombre">
                            </div>
                            <div class="grupo-form">
                                <label for="">Email:</label>
                                <input type="email" class="input-form" name="email">
                            </div>
                            <div class="grupo-form">
                                <label for="">Contrasena:</label>
                                <input type="password" class="input-form" name="pass">
                            </div>
                            <div class="grupo-forme">
                                <label for="">Elegi Rol:</label>
                                <select name="rol">
                                    <option value="" selected>Elegir</option>
                                    <option value="0">Empleado</option>
                                    <option value="1">Jefe</option>
                                </select>
                            </div>
                            <button id="myBtn_editar">
                                    Ingresar
                            </button>
                        </form>
                    </div>
                    <div id="Capo">
                        <form class="formulario" id="form">
                                <h2>Ingresar usuario</h2>
                            <div class="grupo-form">
                                <label for="">DNI:</label>
                                <input type="number" class="input-form" name="DNI">
                            </div>
                            <div class="grupo-form">
                                <label for="">Nombre:</label>
                                <input type="email" class="input-form" name="nombre">
                            </div>
                            <div class="grupo-form">
                                <label for="">Email:</label>
                                <input type="email" class="input-form" name="email">
                            </div>
                            <div class="grupo-forme">
                                <label for="">Elegi Rol:</label>
                                <select name="rol">
                                    <option value="" selected>Elegir</option>
                                    <option value="0">Empleado</option>
                                    <option value="1">Jefe</option>
                                </select>
                            </div>
                            <button id="myBtn">
                                    Ingresar
                            </button>
                        </form>
                    </div>
                </article>
                 <div id="wrapper"></div>
                 <div id="pp"></div>
            </section>
        </div>
    </main>

<script>
        let d = document;
        let form = d.getElementById("form");
        btn = d.getElementById("myBtn"),
        dni = d.getElementsByName("DNI"),
        nombre = d.getElementsByName("nombre"),
        email = d.getElementsByName("email"),
        rol = d.getElementsByName("rol");
        capo = d.getElementById("Capo");
        div_editar = d.getElementById("editarlo");
        formEditar = d.getElementById("form-editar");
        myBtn_editar = d.getElementById("myBtn_editar");
        capo = d.getElementById("Capo");
        
        let anadir = document.getElementById("Anadir");
        anadir.addEventListener('click', ()=>{
            if (capo.style.display == "block") {
                capo.style.display = "none";
                anadir.innerText = "Añadir Usuario"
            }else{
                capo.style.display = "block";
                anadir.innerText = "Salir"
            }
            
        })
        btn.addEventListener('click', (e)=>{
            e.preventDefault();
            //console.log(form);
            let arrayForm=[];
            let data = new FormData();
            for (let e = 0; e < form.length-1; e++) {
                //console.log(form[e].value);
                arrayForm[e]=form[e].value;
            }
            //console.log(arrayForm);
            data.append("dni", arrayForm[0]);
            data.append("nombre", arrayForm[1]);
            data.append("email", arrayForm[2]);
            data.append("rol", arrayForm[3]);
            fetch("../modelo/metodosUser.php", {
                method:'POST',
                body:data
            }).then(res=>responder(res));
            for (let e = 0; e < form.length-1; e++) {
                //console.log(form[e].value);
                form[e].value="";
            };
            location.reload()
        });
        function responder(res) {
            if (res.status === 200) {
                Swal.fire(
                    'Ingreso realizado',
                    'El usuario esta de Alta',
                    'success'
                )
            } 
        }
</script>
<script>
let cerrar = document.getElementById("cerrarSesion");
cerrar.addEventListener('click', ()=>{
Swal.fire({
title: '¿Estas seguro de salir?',
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
cancelButtonText: 'No, no quiero',
confirmButtonText: 'Si, quiero salir'
}).then((result) => {
if (result.isConfirmed) {
window.location = "cerrarSesion.php";
}
})
})
</script>
<script>
    setTimeout(() => {
        let editar = d.getElementsByClassName("editar");
        //console.log(editar);
        for (let e = 0; e < editar.length; e++) {
            editar[e].addEventListener('click', ()=>{
                ////console.log(editar[e].value);
                fetch('../modelo/metodosUser.php?id='+editar[e].value)
                .then(res=>res.json()).then(res=>editarlo(res))
            })
            
        }
    }, 500);
    setTimeout(() => {
        let dar = d.getElementsByClassName("eliminar");
        //console.log(dar);
        for (let e = 0; e < dar.length; e++) {
            dar[e].addEventListener('click', ()=>{
                //console.log(dar[e].value);
                eliminar(dar[e].value)
            })
            
        }
    }, 500);
    setTimeout(() => {
        let success = d.getElementsByClassName("alta");
        //console.log(success);
        for (let e = 0; e < success.length; e++) {
            success[e].addEventListener('click', ()=>{
                //console.log(success[e].value);
                alta(success[e].value)
            })
        }
    }, 500);
    setTimeout(() => {
        let deletear = d.getElementsByClassName("deletear");
        //console.log(deletear);
        for (let e = 0; e < deletear.length; e++) {
            deletear[e].addEventListener('click', ()=>{
                //console.log(deletear[e].value);
                deleteo(deletear[e].value)
            })
        }
    }, 500);
    function editarlo(params) {
        //console.log(params);
        formEditar[0].value = params[0].dni;
        formEditar[1].value = params[0].nombre;
        formEditar[2].value = params[0].email;
        formEditar[3].value = params[0].contrasena;
        formEditar[4].value = params[0].rol;
        //console.log(formEditar[0].value);
        
        div_editar.style.display = "block";

       myBtn_editar.addEventListener('click', (e)=>{
            e.preventDefault();
            let arrayForm=[];
            let data = new FormData();
            for (let e = 0; e < formEditar.length-1; e++) {
                arrayForm[e]=formEditar[e].value;
            }
            // //console.log(arrayForm);
            data.append("id", params[0].id);
            data.append("dni", arrayForm[0]);
            data.append("nombre", arrayForm[1]);
            data.append("email", arrayForm[2]);
            data.append("pass", arrayForm[3]);
            data.append("rol", arrayForm[4]);
            data.append("baja", params[0].baja);
            if (params[0].contrasena != formEditar[3].value) {
            data.append("engranaje", 1)
            }
            fetch("../modelo/editarUser.php", {
                method:'POST',
                body:data
            }).then(res=>responder(res));
            location.reload()
        });

    }
    function deleteo(params) {
        let posible = new FormData();
        //console.log("Chau");
        posible.append('id', params);
        fetch('../modelo/eliminar.php',{
            method:'POST', 
            body: posible
        }).then(res=>console.log(res))   
        location.reload()
    }
    function eliminar(params) {
        let posible = new FormData();
        //console.log("Hola");
        posible.append('id', params);
        fetch('../modelo/darDeBaja.php',{
            method:'POST', 
            body: posible
        }).then(res=>console.log(res))   
        location.reload()
    }
    function alta(params){
        let posible = new FormData();
        posible.append('id', params);
        fetch('../modelo/darDeAlta.php',{
            method:'POST', 
            body: posible
        }).then(res=>console.log(res))
        location.reload()
    }
    function contrasena() {
        if (params[0].contrasena != formEditar[3].value) {
           return data.append("engranaje", 1)
        }
    }           
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
    <script src="js.js"></script>

</body>
</html>