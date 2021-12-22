$(function() {

    $('#btn_save').on('click', function() {
        
        window.history.back();
    })

})
function validate(event){
    //Identidad
    var numBoleta = document.getElementById('boleta').value;
    var boletaRGEX = /[(0-9)|PP|PE]{2}\d{8}$/;
    
    if(!boletaRGEX.test(numBoleta)){
        event.preventDefault(); 
        alert('Por favor introduzca una boleta valida');
        return false;
    }

    var txtNombre = document.getElementById('nombre').value;
    var nombreRGEX = /^[a-zA-ZÀ-ÿ\s]{0,25}$/
    if(!nombreRGEX.test(txtNombre)){
        event.preventDefault();             
        alert('Por favor introduzca un nombre valido');
        return false;
    }
    
    var txtapePat = document.getElementById('apePaterno').value;
    var apePatRGEX = /^[a-zA-ZÀ-ÿ\s]{0,25}$/;
    if(!apePatRGEX.test(txtapePat)){
        event.preventDefault(); 
        alert('Por favor introduzca una apellido valido');
        return false;
    }

    var txtapeMat = document.getElementById('apeMaterno').value;
    var apeMatRGEX = /^[a-zA-ZÀ-ÿ\s]{0,25}$/;
    if(!apeMatRGEX.test(txtapeMat)){
        event.preventDefault(); 
        alert('Por favor introduzca una apellido valido');
        return false;
    }

    var valCURP = document.getElementById('curp').value;
    var valCURPRGEX = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/;
    if(!valCURPRGEX.test(valCURP)){
        event.preventDefault(); 
        alert('Por favor introduzca un CURP valido');
        return false;
    }

    //Contacto
    var txtCalle = document.getElementById('calle').value;
    var calleRGEX = /^[a-zA-ZÀ-ÿ\s]{0,25}$/;
    if(!calleRGEX.test(txtCalle)){
        event.preventDefault(); 
        alert('Por favor introduzca un nombre de calle valido');
        return false;
    }

    var numCalle = document.getElementById('numCalle').value;
    var numCalleRGEX = /^[0-9]{0,10}$/;
    if(!numCalleRGEX.test(numCalle)){
        event.preventDefault(); 
        alert('Por favor introduzca una numero de casa valido');
        return false;
    }

    var txtColonia = document.getElementById('colonia').value;
    var txtColoniaRGEX = /^[a-zA-ZÀ-ÿ\s]{1,15}$/;
    if(!txtColoniaRGEX.test(txtColonia)){
        event.preventDefault(); 
        alert('Por favor introduzca una colonia valida');
        return false;
    }

    var codPost = document.getElementById('codigoPost').value;
    var codPostRGEX = /^[0-9]{5}$/;
    if(!codPostRGEX.test(codPost)){
        event.preventDefault(); 
        alert('Por favor introduzca un codigo postal valido');
        return false;
    }

    var numTel = document.getElementById('telefono').value;
    var numTelRGEX = /^[0-9]{10}$/;
    if(!numTelRGEX.test(numTel)){
        event.preventDefault(); 
        alert('Por favor introduzca un numero de telefono o celular valido');
        return false;
    }
    var valEmail = document.getElementById('correo').value;
    var valEmailRGEX = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
    if(!valEmailRGEX.test(valEmail)){
        event.preventDefault(); 
        alert('Por favor introduzca un correo valido');
        return false;
    }
    var numProm = document.getElementById('prom').value;
    var numPromRGEX = /^[0-1]{1}[0-9]{1}.[0-9]{2}$/;
    if(!numPromRGEX.test(numProm))
    {   
        event.preventDefault(); 
        alert('Por favor introduzca una calificación de promedio valida');
        return false;
    }
    alert('Datos correctos');

    return true;
}            
function changeProcedencia(){
    let otro = "otro";
    let valor = $('#procedencia').val();
    if(otro === valor){
        $("#nomEsc").attr("readonly", false);
        
        $('#nomEsc').val("");
    }else{                            
        $("#nomEsc").attr("readonly", true);
        $('#nomEsc').val($("#procedencia option:selected").text());
    }
}
