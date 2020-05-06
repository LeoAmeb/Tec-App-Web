var caloriasvalue = document.getElementById("caloriasxkilo"); 
var resultado = document.getElementById("temp-calorias");
 
var json;
var id = document.getElementById("ppp").value;
var datos = new XMLHttpRequest();
var Hombres = 0;
var Mujeres = 0;

datos.open('POST', './modulos/backend/logicaMedicionesGestoEnergetico.php');
datos.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
datos.onload = function(){
    
    if(datos.status === 200){
        json = JSON.parse(datos.responseText);
        console.log(json);
        FAOOMSONU();
    }
    else{
        console.log("Existe un error de tipo:" + datos.status);
    }
 } 
datos.send("id_paciente="+id); 

 
$(function(){ 
    $("div.x_panel canvas").click(function(){
        calcular();
    });

    $("div.x_panel canvas").bind("mousewheel DOMMouseScroll" ,function(){
        calcular();
    });

    $(".knob").bind("mousewheel DOMMouseScroll" , function(){
        calcular();
    });

    $(".knob").on("keyup" , function(){
        calcular();
    });

});

$('#enviar').click(function(){
    
    if(document.querySelectorAll('.selected')[0] != null){
        console.log("entro");
    var autor	=  document.querySelectorAll('.selected .flat')[0]; 
    var basal	= document.querySelectorAll('.selected .Basal')[0]; 
    var eta	  = document.querySelectorAll('.selected .EAT')[0];
    var af	  =  document.querySelectorAll('.selected .AF')[0]; 
    var total = document.querySelectorAll('.selected .Total')[0]; 
    var fkpaciente = "1";

    var data = "autor="+autor.value+"&basal="+basal.innerHTML+"&eta="+eta.innerHTML+"&af="+af.innerHTML+"&total="+total.innerHTML+"&fkp="+fkpaciente;


    datos.open('POST', './modulos/backend/gastoenergetico.php');
    datos.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    datos.onload = function(){
        if(datos.status === 200){
           console.log("OKEY");
            window.location.href = './V_misMediciones.php?var='+json['$idpaciente']; 
        }
        else{
            console.log("Existe un error de tipo:" + datos.status);
        }
    } 
    datos.send(data); 
    }
});

function calcular(){
    var valor  = $("input.knob").val();
    var caloriasxkilio = valor *  json['peso'];

    console.log("Nuevo Calculo " + valor);
    $("#temp-calorias").html(caloriasxkilio)
}

function FAOOMSONU(){
    var FAOOMSONUBasal = document.getElementById("FAOOMSONUBasal");
    var BMR = 0;
    var caloriasvalue = document.getElementById("FAOOMSONUEAT");
    var total = document.getElementById("FAOOMSONUTotal");
    if(json['sexo'] === "Hombre"){
        if(json['edadmetabolica'] >= 10 && json['edadmetabolica'] <= 18){
            Hombres = (17.686 * json['peso'] + 658.2);
            FAOOMSONUBasal.innerText = Hombres.toFixed(2);
            BMR = Hombres.toFixed(2) * 0.10;
            caloriasvalue.innerText = BMR.toFixed(2);
            total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Hombres.toFixed(2)));
        }else if(json['edadmetabolica'] >= 18 && json['edadmetabolica'] <= 30){
            Hombres = (15.057 * json['peso'] + 692.2);
            FAOOMSONUBasal.innerText = Hombres.toFixed(2);
            BMR = Hombres.toFixed(2) * 0.10;
            caloriasvalue.innerText = BMR.toFixed(2);
            total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Hombres.toFixed(2)));
        }else if(json['edadmetabolica'] >= 30 && json['edadmetabolica'] <= 60){
            Hombres = (11.472 * json['peso'] + 873.1);
            FAOOMSONUBasal.innerText = Hombres.toFixed(2);
            BMR = Hombres.toFixed(2) * 0.10;
            caloriasvalue.innerText = BMR.toFixed(2);
            total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Hombres.toFixed(2)));
        }else if(json['edadmetabolica'] > 60){
            Hombres = (11.711 * json['peso'] + 587.7);
            FAOOMSONUBasal.innerText = Hombres.toFixed(2);
            BMR = Hombres.toFixed(2) * 0.10;
            caloriasvalue.innerText = BMR.toFixed(2);
            total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Hombres.toFixed(2)));
        }
    }else{
        if(json['edadmetabolica'] >= 10 && json['edadmetabolica'] <= 18){
            Mujeres = (13.37 * json['peso'] + 747);
            FAOOMSONUBasal.innerText = Mujeres.toFixed(2);
            BMR = Mujeres.toFixed(2) * 0.10;
            caloriasvalue.innerText = BMR.toFixed(2);
            total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Mujeres.toFixed(2)));
        }else if(json['edadmetabolica'] >= 18 && json['edadmetabolica'] <= 30){
            Mujeres = (14.818 * json['peso'] + 486.6);
            FAOOMSONUBasal.innerText = Mujeres.toFixed(2);
            BMR = Mujeres.toFixed(2) * 0.10;
            caloriasvalue.innerText = BMR.toFixed(2);
            total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Mujeres.toFixed(2)));
        }else if(json['edadmetabolica'] >= 30 && json['edadmetabolica'] <= 60){
            Mujeres = (8.126 * json['peso'] + 845.6);
            FAOOMSONUBasal.innerText = Mujeres.toFixed(2);
            BMR = Mujeres.toFixed(2) * 0.10;
            caloriasvalue.innerText = BMR.toFixed(2);
            total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Mujeres.toFixed(2)));
        }else if(json['edadmetabolica'] > 60){
            Mujeres = (9.082 * json['peso'] + 658.5);
            FAOOMSONUBasal.innerText = Mujeres.toFixed(2);
            BMR = Mujeres.toFixed(2) * 0.10;
            caloriasvalue.innerText = BMR.toFixed(2);
            total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Mujeres.toFixed(2)));
        }
    }
    HarrisBenedict();
}

function HarrisBenedict(){
    var HarrisBenedictBasal = document.getElementById("HarrisBenedictBasal");
    var BMR = 0;
    var caloriasvalue = document.getElementById("HarrisBenedictEAT");
    var total = document.getElementById("HarrisBenedictTotal");
    if(json['sexo'] === "Hombre"){
        Hombres = (66.473 + (13.751*json['peso']) + (5.0033 * json['estature']) - (6.7550 * json['edadmetabolica']));
        HarrisBenedictBasal.innerText = Hombres.toFixed(2);
        BMR = Hombres.toFixed(2) * 0.10;
        caloriasvalue.innerText = BMR.toFixed(2);
        total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Hombres.toFixed(2))); 
    }else{
        Mujeres = (655.1 + (9.463 * json['peso']) + (1.8 * json['estature']) - (4.6756 * json['edadmetabolica']));
        HarrisBenedictBasal.innerText = Mujeres.toFixed(2);
        BMR = Mujeres.toFixed(2) * 0.10;
        caloriasvalue.innerText = BMR.toFixed(2);
        total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Mujeres.toFixed(2)));
    }
    MifflinStjeor();
} 

function MifflinStjeor() {
    var MifflinStjeorBasal = document.getElementById("MifflinStjeorBasal");
    var BMR = 0;
    var caloriasvalue = document.getElementById("MifflinStjeorEAT");
    var total = document.getElementById("MifflinStjeorTotal");
    if(json['sexo'] === "Hombre"){
        Hombres = (10*json['peso'] + 6.25*json['estature'] - 5*json['edadmetabolica'] +5 );
        MifflinStjeorBasal.innerText = Hombres.toFixed(2);
        BMR = Hombres.toFixed(2) * 0.10;
        caloriasvalue.innerText = BMR.toFixed(2);
        total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Hombres.toFixed(2))); 
    }else{
        Mujeres = (10*json['peso']  + 6.25*json['estature'] - 5*json['edadmetabolica'] - 161 );
        MifflinStjeorBasal.innerText = Mujeres.toFixed(2);
        BMR = Mujeres.toFixed(2) * 0.10;
        caloriasvalue.innerText = BMR.toFixed(2);
        total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Mujeres.toFixed(2)));
        
    }
    Valencia();
}

function Valencia(){
    var ValenciaBasal = document.getElementById("ValenciaBasal");
    var BMR = 0;
    var caloriasvalue = document.getElementById("ValenciaEAT");
    var total = document.getElementById("ValenciaTotal");
    if(json['sexo'] === "Hombre"){
        if(json['edadmetabolica'] >= 10 && json['edadmetabolica'] <= 30){
            Hombres = (13.37 * json['peso'] + 747);
            ValenciaBasal.innerText = Hombres.toFixed(2);
            BMR = Hombres.toFixed(2) * 0.10;
            caloriasvalue.innerText = BMR.toFixed(2);
            total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Hombres.toFixed(2)));
        }else if(json['edadmetabolica'] >= 30 && json['edadmetabolica'] <= 60){
            Hombres = (13.08 * json['peso'] + 693);
            ValenciaBasal.innerText = Hombres.toFixed(2);
            BMR = Hombres.toFixed(2) * 0.10;
            caloriasvalue.innerText = BMR.toFixed(2);
            total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Hombres.toFixed(2)));
        }else if(json['edadmetabolica'] > 60){
            Hombres = (14.21 * json['peso'] + 429);
            ValenciaBasal.innerText = Hombres.toFixed(2);
            BMR = Hombres.toFixed(2) * 0.10;
            caloriasvalue.innerText = BMR.toFixed(2);
            total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Hombres.toFixed(2)));
        }
    }else{
       if(json['edadmetabolica'] >= 10 && json['edadmetabolica'] <= 30){
            Mujeres = (11.02 * json['peso'] + 679);
            ValenciaBasal.innerText = Hombres.toFixed(2);
            BMR = Hombres.toFixed(2) * 0.10;
            caloriasvalue.innerText = BMR.toFixed(2);
            total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Hombres.toFixed(2)));
        }else if(json['edadmetabolica'] >= 30 && json['edadmetabolica'] <= 60){
            Mujeres = (10.92 * json['peso'] + 677);
            ValenciaBasal.innerText = Hombres.toFixed(2);
            BMR = Hombres.toFixed(2) * 0.10;
            caloriasvalue.innerText = BMR.toFixed(2);
            total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Hombres.toFixed(2)));
        }else if(json['edadmetabolica'] > 60){
            Mujeres = (10.98 * json['peso'] + 520);
            ValenciaBasal.innerText = Hombres.toFixed(2);
            BMR = Hombres.toFixed(2) * 0.10;
            caloriasvalue.innerText = BMR.toFixed(2);
            total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Hombres.toFixed(2)));
        }
    }
    Promedio();
}

function Promedio(){
    var PromedioBasal = document.getElementById("PromedioBasal");
    var BMR = 0;
    var caloriasvalue = document.getElementById("PromedioEAT");
    var total = document.getElementById("PromedioTotal");

    if(json['sexo'] === "Hombre"){
        Hombres = (1 * json['peso'] * 24);
        PromedioBasal.innerText = Hombres.toFixed(2);
        BMR = Hombres.toFixed(2) * 0.10;
        caloriasvalue.innerText = BMR.toFixed(2);
        total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Hombres.toFixed(2))); 
    }else{
        Mujeres = (0.9 * json['peso'] * 24);
        PromedioBasal.innerText = Mujeres.toFixed(2);
        BMR = Mujeres.toFixed(2) * 0.10;
        caloriasvalue.innerText = BMR.toFixed(2);
        total.innerText = (parseInt(BMR.toFixed(2)) + parseInt(Mujeres.toFixed(2)));
    }
}



