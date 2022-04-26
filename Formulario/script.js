const formPreguntas = document.getElementById('preguntas');
const enviar = document.getElementById('enviar');

const pregunta1 = document.getElementById('pregunta1');
const pregunta2 = document.getElementById('pregunta2');
const pregunta3 = document.getElementById('pregunta3');
const pregunta4 = document.getElementById('pregunta4');
const pregunta5 = document.getElementById('pregunta5');
const pregunta6 = document.getElementById('pregunta6');
const pregunta7 = document.getElementById('pregunta7');
const pregunta8 = document.getElementById('pregunta8');
const pregunta9 = document.getElementById('pregunta9');
const pregunta10 = document.getElementById('pregunta10');

const formEmail = document.getElementById('form-email');
const emailForm = document.getElementById('email-enviar')


const respuestas = ["No, she's not at her home","yes, they are","yes it Is my mother language","yes I am","of course I am happy","No, you didn't","I broke my finger a month ago","yes, she watched the movie","Yes they went","No he didn't, he was sick"]

let contador = 0;

respuestas.forEach(a=>{
    console.log(a);
})

enviar.addEventListener('click',()=>{
    const alertContainer = document.getElementById('container-alert')
    alertContainer.innerHTML ="";
    
    

    if(pregunta1.value.toLowerCase() === respuestas[0].toLowerCase()){
        contador++;
    }
    if(pregunta2.value.toLowerCase() === respuestas[1].toLowerCase()){
        contador++;
    }if(pregunta3.value.toLowerCase() === respuestas[2].toLowerCase()){
        contador++;
    }if(pregunta4.value.toLowerCase() === respuestas[3].toLowerCase()){
        contador++;
    }if(pregunta5.value.toLowerCase() === respuestas[4].toLowerCase()){
        contador++;
    }if(pregunta6.value.toLowerCase() === respuestas[5].toLowerCase()){
        contador++;
    }if(pregunta7.value.toLowerCase() === respuestas[6].toLowerCase()){
        contador++;
    }if(pregunta8.value.toLowerCase() === respuestas[7].toLowerCase()){
        contador++;
    }
    if(pregunta9.value.toLowerCase() === respuestas[8].toLowerCase()){
        contador++;
    }if(pregunta10.value.toLowerCase() === respuestas[9].toLowerCase()){
        contador++;
    }


    if(contador >= 9){
        const alert = document.createElement('div');
        alert.classList.add('alert');
        alert.classList.add('alert-primary');
        alert.textContent = "Felicidades!!!"
        alertContainer.appendChild(alert);
        console.log(contador);
        contador = 0;
        formEmail.style.display="block"
    }else if(contador <=8){
        
        const alert = document.createElement('div');
        alert.classList.add('alert');
        alert.classList.add('alert-primary');
        alert.textContent = "Intentalo de nuevo, burro";

        alertContainer.appendChild(alert);
        contador = 0;
    }


})




emailForm.addEventListener('click',(e)=>{
    e.preventDefault();

    document.getElementById('alerta-email').innerHTML = "";


    fetch('./certificado.pdf',{
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',// AQUI indicamos el formato
            'Access-Control-Allow-Origin': ' *'
        }
    })
    .then(a => a.blob())
    .then(a =>{
        console.log(a);
        let formData = new FormData(formEmail);

        formData.append('certificado',a,'certificado.pdf'); // En la posición 0; es decir, el primer elemento
        fetch("./email.php", {
            method: 'POST',
            body: formData,
        })
            .then(respuesta => respuesta.text())
            .then(decodificado => {

                if(decodificado === "Error de envio"){
                    console.log('error');
                    const alert = document.createElement('div');
                    alert.textContent = 'Error de envio, intente de nuevo';
                    alert.classList.add('alert')
                    alert.classList.add('alert-danger');
                    document.getElementById('alerta-email').appendChild(alert);

                }else if(decodificado === 'Correo enviado'){
                    console.log('enviado');
                    const alert = document.createElement('div');
                    alert.textContent = 'Enviado correctamente';
                    alert.classList.add('alert')
                    alert.classList.add('alert-success');
                    document.getElementById('alerta-email').appendChild(alert);
                }else{
                    console.log('xd');
                }

            })
    .catch(err => console.error(err))
})

})