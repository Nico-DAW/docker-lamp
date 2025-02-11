
# Archivos / Tareas

He podido crear archivos asociados a tareas. Sinembargo al cambiar de equipo por la trade e importar el repositorio. Tras eliminar todas las tareas y crear una nueva con un usuario admin al intentarlo da un error en FK. Lo estoy revisando.

SOLUCIÓN: Finalmente la consulta era más sencilla --> $sql = "SELECT * FROM ficheros WHERE id_tarea='$id_tarea'";


# Carpeta files / permisos

La carpeta files se ha importado dentro de entregaTarea. Al importar el repositorio en el nuevo equipo he tenido que volver a atribuirle permisos 
777 con chmod.