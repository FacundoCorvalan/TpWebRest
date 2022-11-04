http://localhost/TpEspecialRest/api/artistas/  <!--traer todos los artistas-->
http://localhost/TpEspecialRest/api/artistas?sort=nacionalidad&order=asc <!--traer los artistas ordenados por algun valor de la tabla(sort) de forma asc o desc (order)-->
http://localhost/TpEspecialRest/api/artistas?order=desc <!--Traer los artistas solo ordenados por su nombre en orden asc o desc(order)-->
http://localhost/TpEspecialRest/api/artistas/2   //id existente 200 ok
http://localhost/TpEspecialRest/api/artistas/1   //id no existe 404 not found
http://localhost/TpEspecialRest/api/artistas?order=desc //ordenar descendentemente

La API Rest debe ser RESTful |*|
Debe tener al menos un servicio que liste (GET) una colección entera de entidades. |*|
El servicio que lista una colección entera debe poder ordenarse opcionalmente por al menos un campo de la tabla, de manera ascendente o descendente.
Debe tener al menos un servicio que obtenga (GET) una entidad determinada por su ID.|*|
Debe tener al menos un servicio para agregar o modificar datos (POST o PUT)|*|
La API Rest debe manejar de manera adecuada al menos los siguientes códigos de error (200, 201, 400 y 404)|*|
