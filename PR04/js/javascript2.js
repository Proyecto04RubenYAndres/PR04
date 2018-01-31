			function validar(){

				if(document.getElementById("id_mail").style.color=="red"){
					alert("El campo mail es incorrecto");
					return false;
				}
				
			
				// TELEFONO MOVIL
				var numeroTelefono=document.getElementById('telf_movil');
				var expresionRegular1=/^([0-9]+){9}$/;//<--- con esto vamos a validar el numero
				var expresionRegular2=/\s/;//<--- con esto vamos a validar que no tenga espacios en blanco

				if(numeroTelefono.value==''){ 
					return false;
				}else if(expresionRegular2.test(numeroTelefono.value)){ 
					alert('En el campo Teléfono movil no pueden haber espacios en blanco');
					return false;
				}else if(numeroTelefono.value.length!=9){
					alert('Telefono movil: El numero de telefono tiene que tener 9 digitos');
					return false;
				}
				else if(!expresionRegular1.test(numeroTelefono.value)){ 
					alert('Telefono movil: Numero incorrecto');
					return false;
				}



				// TELEFONO FIJO
				var numeroTelefonoFijo=document.getElementById('telf_fijo');
				var expresionRegular3=/^([0-9]+){9}$/;//<--- con esto vamos a validar el numero
				var expresionRegular4=/\s/;//<--- con esto vamos a validar que no tenga espacios en blanco

				if(numeroTelefonoFijo.value==''){ 
					return false;
				}else if(expresionRegular4.test(numeroTelefonoFijo.value)){ 
					alert('En el campo Teléfono fijo no pueden haber espacios en blanco');
					return false;
				}else if(numeroTelefonoFijo.value.length!=9){
					alert('Telefono fijo: El numero de telefono tiene que tener 9 digitos');
					return false;
				}
				else if(!expresionRegular3.test(numeroTelefonoFijo.value)){ 
					alert('Telefono fijo: Numero incorrecto');
					return false;
				}









			}


			/*
			 * Función para validar una dirección de correo
			 * Tiene que recibir el identificador del formulario
			 */




			 function validateMail(idMail)
			 {
				//Creamos un objeto 
				object=document.getElementById(idMail);
				valueForm=object.value;

				// Patron para el correo
				var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
				if(valueForm.search(patron)==0)
				{
					//Mail correcto
					object.style.color="green";
					return;
				}
				//Mail incorrecto
				object.style.color="red";
			}
			//-->