http://localhost/TpEspecialRest/api/artistas/  <!--traer todos los artistas-->
http://localhost/TpEspecialRest/api/artistas?sort=nacionalidad&order=asc <!--traer los artistas ordenados por algun valor de la tabla(sort) de forma asc o desc (order)-->
http://localhost/TpEspecialRest/api/artistas?order=desc <!--Traer los artistas solo ordenados por su nombre en orden asc o desc(order)-->
http://localhost/TpEspecialRest/api/artistas/2   //id existente 200 ok
http://localhost/TpEspecialRest/api/artistas/1   //id no existe 404 not found
http://localhost/TpEspecialRest/api/artistas?order=desc //ordenar descendentemente


filtro
http://localhost/TpEspecialRest/api/artistas?campo=nacionalidad&valor=estadounidense  ejemplo para usar
La API Rest debe ser RESTful |*|
Debe tener al menos un servicio que liste (GET) una colección entera de entidades. |*|
El servicio que lista una colección entera debe poder ordenarse opcionalmente por al menos un campo de la tabla, de manera ascendente o descendente.
Debe tener al menos un servicio que obtenga (GET) una entidad determinada por su ID.|*|
Debe tener al menos un servicio para agregar o modificar datos (POST o PUT)|*|
La API Rest debe manejar de manera adecuada al menos los siguientes códigos de error (200, 201, 400 y 404)|*|


GET
Coleccion de los metodos get del listado de artista para filtrar u ordenar

GET
http://localhost/TpEspecialRest/api/artistas
http://localhost/TpEspecialRest/api/artistas
getAll - devolver el listado completo de artistas

GET
http://localhost/TpEspecialRest/api/artistas?campo=nacionalidad&valor=estadounidense&sort=id&order=asc
http://localhost/TpEspecialRest/api/artistas?campo=nacionalidad&valor=estadounidense&sort=id&order=asc
Get - filtrado por campo y ordenado por campo asc o desc


Query Params
campo nacionalidad
valor
estadounidense
sort
id
order
asc
GET
http://localhost/TpEspecialRest/api/artistas?campo=nacionalidad&valor=estadounidense&sort=fecha_nacimiento
http://localhost/TpEspecialRest/api/artistas?campo=nacionalidad&valor=estadounidense&sort=fecha_nacimiento
GET - listado de artista filtrado y ordenado por campo de forma ascendente por defecto

Query Params
campo
nacionalidad
valor
estadounidense
sort
fecha_nacimiento
GET
http://localhost/TpEspecialRest/api/artistas?sort=nombre_artista&order=desc
http://localhost/TpEspecialRest/api/artistas?sort=nombre_artista&order=desc
GET - listado de artistas ordenado por campo y de forma ascendente o descendente

Query Params
sort
nombre_artista
order
desc
GET
http://localhost/TpEspecialRest/api/artistas?campo=nacionalidad&valor=estadounidense
http://localhost/TpEspecialRest/api/artistas?campo=nacionalidad&valor=estadounidense
GET - Listado de artistas filtrado por campo

Query Params
campo
nacionalidad
valor
estadounidense
GET
http://localhost/TpEspecialRest/api/artistas?sort=id
http://localhost/TpEspecialRest/api/artistas?sort=id
GET - Listado de artistas ordenado por campo ascendente por defecto

Query Params
sort
id
GET
http://localhost/TpEspecialRest/api/artistas/2
http://localhost/TpEspecialRest/api/artistas/2
GET - artista individual traido por id

# Api de listado de artistas
***

## Indice
1. [Metodos get](#metodos-get)



## Usage

