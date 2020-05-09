<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8" />
   <title>Index</title>
   <script>
      function crearDin() {

         var padre = document.getElementById("padre");
         var input = document.createElement("INPUT");
         input.type = 'text';

         padre.appendChild(input);
      }
      window.onload = function() {

         var btnAdd = document.getEmentById("btn_agregar");
         btnAdd.onclick = crearDin;
      }
   </script>
</head>

<body>
   <div id="padre">

   </div>
   <input type="button" id="btn_agregar" value="+">
</body>

</html>