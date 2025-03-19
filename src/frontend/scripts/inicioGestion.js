"use strict";


$(document).ready(function () {
      $("#crearEstudiante").click(function (e) { 
            e.preventDefault();
            $("#cards-lista").css("background","rgb(155 155 155)");
            //Mostrar form + trancision
            $("#formEstudiantes").fadeIn();
            //Ocultar cards iniciales
            $(".item-card").hide();
      });

      $("#crearEmpresa").click(function (e) { 
            e.preventDefault();
            $("#cards-lista").css("background","rgb(255 255 255)");
            //Mostrar form + trancision
            $("#formEmpresa").fadeIn();
            //Ocultar cards iniciales
            $(".item-card").hide();
      });
      
      $("#crearPromocion").click(function (e) { 
            e.preventDefault();
            $("#cards-lista").css("background","rgb(0 0 0)");
            //Mostrar form + trancision
            $("#formPromocion").fadeIn();
            //Ocultar cards iniciales
            $(".item-card").hide();
      });

      $("#ocultarForm").click(function (e) { 
            e.preventDefault();
            //ocultar form + trancision
            $(this).closest("#formEstudiantes").hide();
            //Mostrar cards iniciales
            $(".item-card").fadeIn();
            /*
            Diferencia clave
            closest: Busca hacia arriba en la jerarquía del DOM (ancestros).
            find: Busca hacia abajo en la jerarquía del DOM (descendientes).
             */
      });
});
