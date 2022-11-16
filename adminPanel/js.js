function coletas(user){
    let coleccion = document.createElement("div");
    let editar = document.createElement("button");
    let baja = document.createElement("button");
    let eliminar = document.createElement("button");
    if(user.baja == 1) { 
        baja.value = user.id;
        eliminar.value = user.id;
        editar.value = user.id;

        coleccion.classList +="coleccion-botones";
        editar.classList+="boton-default ";
        baja.classList+="boton-default ";
        eliminar.classList+="boton-default ";

        baja.classList+="alta ";
        editar.classList+="editar ";
        eliminar.classList+="deletear ";

        baja.innerText= "Dar de alta";
        editar.innerText= "Editar";
        eliminar.innerText="Eliminar ";

        coleccion.appendChild(editar);
        coleccion.appendChild(baja);    
        coleccion.appendChild(eliminar);
        return coleccion;
    }else{
        baja.value = user.id;
        editar.value = user.id;
        coleccion.classList +="coleccion-botones";
        editar.classList+="boton-default ";
        baja.classList+="boton-default ";
    
        baja.classList+="eliminar ";
        editar.classList+="editar ";
    
        baja.innerText= "Dar de baja";
        editar.innerText= "Editar";
        coleccion.appendChild(editar);
        coleccion.appendChild(baja);  
        return coleccion;

    }
    }

function dadoDeBaja(user){
    if(user.baja!=1){
        return "Disponible";
    }else{
        return "Dado de baja";
    }
};
function elector(rol) {
    return rol == 1 ? "Jefe" : "Empleado";
}
function creador(params) {
    new gridjs.Grid({
    columns: ["id", "DNI","Nombre","email", "Estado", "Rol", "Opciónes"],
    server:{
        url:"../modelo/metodosUser.php",
        then:data => data.map(user => [user.id,user.dni,user.nombre,user.email,dadoDeBaja(user),elector(user.rol),coletas(user)]),
        handle: (res)=>{
            if (res.status === 404) return {data: []};
            if (res.ok) return res.json();
            throw Error("No padre")
        }
    },
    data:{},
    style:{
        table:{
            'font-size':'1.2em',
            'border':'0.3px solid grey',
        },
        th:{
            
        }
    }
  }).render(params);
}
let wrap = document.getElementById("wrapper");
creador(wrap);

