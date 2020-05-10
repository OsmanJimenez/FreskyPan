<!-- validacion de longitud de campo numerico-->
<script>
          function maxlengthNumber(ob) {
            console.log(ob.value);

            if (ob.value.length > ob.maxLength) {

              ob.value = ob.value.slice(0, ob.maxLength);
            }
          }
        </script>

        <!-- funcion de validacion solo numeros-->
        <script type="text/javascript">
          function Num_1(evento) {
            key = evento.keyCode || evento.which;
            teclado = String.fromCharCode(key).toLocaleLowerCase();
            ced = "1234567890";
            especiales = "37-38-46";

            teclado_especial = false;
            for (var i in especiales) {
              if (key == especiales[i]) {
                teclado_especial = true;
                break;
              }
            }
            if (ced.indexOf(teclado) == -1 && !teclado_especial) {
              return false;
            }
          }
        </script>
        <script type="text/javascript">
          function numCed(evento) {
            key = evento.keyCode || evento.which;
            teclado = String.fromCharCode(key).toLocaleLowerCase();
            ced = "1234567890";
            especiales = "37-38-46";

            teclado_especial = false;
            for (var i in especiales) {
              if (key == especiales[i]) {
                teclado_especial = true;
                break;
              }
            }
            if (ced.indexOf(teclado) == -1 && !teclado_especial) {
              return false;
            }
          }
        </script>
        <script type="text/javascript">
          function numTel(evento) {
            key = evento.keyCode || evento.which;
            teclado = String.fromCharCode(key).toLocaleLowerCase();
            tel = "1234567890";
            especiales = "37-38-46";
            teclado_especial = false;
            for (var i in especiales) {
              if (key == especiales[i]) {
                teclado_especial = true;
                break;
              }
            }
            if (tel.indexOf(teclado) == -1 && !teclado_especial) {
              return false;
            }
          }
        </script>

        <!-- validacion de texto-->
        <script type="text/javascript">
       function texto_1(evento) {

         key = evento.keyCode || evento.which;
         teclado = String.fromCharCode(key).toLocaleLowerCase();
         nom1 = " abcdefghijklmnñopqrstuvwxyz";
         especiales = "37-38-46";

         teclado_especial = false;
         for (var i in especiales) {
           if (key == especiales[i]) {
             teclado_especial = true;
             break;
           }
         }
         if (nom1.indexOf(teclado) == -1 && !teclado_especial) {
           return false;
         }
       }
     </script>
        <script type="text/javascript">
          function Nom_1(evento) {

            key = evento.keyCode || evento.which;
            teclado = String.fromCharCode(key).toLocaleLowerCase();
            nom = "abcdefghijklmnñopqrstuvwxyz";
            especiales = "37-38-46";

            teclado_especial = false;
            for (var i in especiales) {
              if (key == especiales[i]) {
                teclado_especial = true;
                break;
              }
            }
            if (nom.indexOf(teclado) == -1 && !teclado_especial) {
              return false;
            }
          }
        </script>

        <!-- validacion de texto-->
        <script type="text/javascript">
          function Nom_2(evento) {
            key = evento.keyCode || evento.which;
            teclado = String.fromCharCode(key).toLocaleLowerCase();
            nom2 = " abcdefghijklmnñopqrstuvwxyz";
            especiales = "37-38-46";
            teclado_especial = false;
            for (var i in especiales) {
              if (key == especiales[i]) {
                teclado_especial = true;
                break;
              }
            }
            if (nom2.indexOf(teclado) == -1 && !teclado_especial) {
              return false;
            }
          }
        </script>
        <script type="text/javascript">
          function Pr_ap(evento) {
            key = evento.keyCode || evento.which;
            teclado = String.fromCharCode(key).toLocaleLowerCase();
            a1 = " abcdefghijklmnñopqrstuvwxyz";
            especiales = "37-38-46";

            teclado_especial = false;
            for (var i in especiales) {
              if (key == especiales[i]) {
                teclado_especial = true;
                break;
              }
            }
            if (a1.indexOf(teclado) == -1 && !teclado_especial) {
              return false;
            }
          }
        </script>
        <script type="text/javascript">
          function Seg_ap(evento) {
            key = evento.keyCode || evento.which;
            teclado = String.fromCharCode(key).toLocaleLowerCase();
            a2 = " abcdefghijklmnñopqrstuvwxyz";
            especiales = "37-38-46";
            teclado_especial = false;
            for (var i in especiales) {
              if (key == especiales[i]) {
                teclado_especial = true;
                break;
              }
            }
            if (a2.indexOf(teclado) == -1 && !teclado_especial) {
              return false;
            }
          }
        </script>
