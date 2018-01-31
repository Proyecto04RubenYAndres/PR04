			function validar(){

				if(document.getElementById("id_mail").style.color=="red"){
					alert("La dirección de correo electrónico es incorrecta");
					return false;
				}
				
				// if(document.f1.telf_movil.value.length=!9){
				// 	alert("El campo Telefono Movil tiene que ser de 9 digitos!");
				// 	return false;
				// }


				var p1 = document.getElementById("contrasena_user").value;
				var p2 = document.getElementById("repcontrasena_user").value;
				if (p1 != p2) {
				  alert("Las contraseñas deben de coincidir");
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