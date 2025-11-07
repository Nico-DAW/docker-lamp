<?php 
/* 
Es necesaria esta página o podemos utilizar registroUsuarios.php?
Depende... Lo que se tiene que tener claro es que cuando realizamos 
un registro de un usuario nuevo hacemos un INSERT y cuando actualizamos un UPDATE. 

Teniendo esto en cuenta se puede hacer de varias maneras. Podríamos no necesitar este archivo 
y hacerlo todo en registroUsuarios.php creando una "bandera" ej: $update=false / true y enviarla en 
submit (campo oculto) y al llegar a nueva.php en función de si es true o false proceder a INSERT o UPDATE. 
*/
