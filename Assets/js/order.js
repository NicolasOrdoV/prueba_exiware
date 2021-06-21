
   const shoppingList = document.querySelector('#table div');

   shoppingList.addEventListener("input", (e)=>{
      if(e.target.type == "number"){
        let unidades = Number(e.target.value);   
        let tr = e.target.parentNode.parentNode; 
        let precioUnitario = Number(tr.querySelectorAll("td")[2].textContent);
        let subTotal = unidades * precioUnitario;
        getElementsByClassName("valor").values(subTotal); 
      }
    calculaElTotal();
    })
  function calculaElTotal(){
        let total = 0; 
        let tdsArray = Array.from(shoppingList.getElementsByClassName("valor"));
        tdsArray.forEach(td =>{
            total += Number(td.textContent);
            // valor_total.textContent = total;
        });
  }
    $(function(){
    	$("#adicional").on('click', function(){
    	 	var i = $("#contador").val();
            i++;
            $("#table div:eq(0)").clone().attr("data-section", 'section'+i).appendTo("#table").find('input').val('');
            $('#contador').val(i);
    	});

        $('#table').on('change', '.valor',function(){
            ActualizarMonto();
        });

        function ActualizarMonto(){
            var valor = 0;
            var temp = 0;
            $('.valor').each(function(indice,elemento){
                temp = parseInt($(elemento).val().split(" - ")[1]);
                valor += temp;
            });
            $("#valor").val(valor);
        }

        $(document).on("click","#eliminar",function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
            ActualizarMonto();
        });
    });
    //var i = document.getElementById('contador').value;
    $("#table").on('change', '.referencia_producto', function() {
        var codigo = $(this).val();
        var parent = $(this).closest('.tde').data('section');
        alerta2(codigo, parent);
    })

    function alerta2(codigo, parent) {
        // Creando el objeto para hacer el request
        var request = new XMLHttpRequest();

        // Objeto PHP que consultaremos
        request.open("POST", "?controller=order&method=getByReference&codigo="+codigo);

        // Definiendo el listener
        request.onreadystatechange = function() {
            // Revision si fue completada la peticion y si fue exitosa
            if (this.readyState === 4 && this.status === 200) {

                var data = JSON.parse(this.responseText);
                var data = data.toString().split(",");
                // Ingresando la respuesta obtenida del PHP
                $("div[data-section="+parent+"] .id_producto").val(data[0])
                $("div[data-section="+parent+"] .referencia_producto").val(data[1])
                $("div[data-section="+parent+"] .nombre_producto").val(data[2])
                $("div[data-section="+parent+"] .valor").val(data[3])
                $(".valor_unitario_producto").val(data[3])
            }
        };

        // Recogiendo la data del HTML
        var myForm = document.getElementById("form_validation");
        var formData = new FormData(myForm);

        // Enviando la data al PHP
        request.send(formData);
    }    