"use strict";

$(document).ready(function () {
      $.ajax({
            type: "GET",
            url: "../../backend/recuperarCursos.php",
            data: "data",
            dataType: "json",
            success:async function (response) {
                  console.log(response);
                  for (const cadaUno in response) {
                  console.log();
                  
                  $("#cards").append("<div>"+JSON.stringify(response[cadaUno])+"</div>");
                  }
            }
      });
});