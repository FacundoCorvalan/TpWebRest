# Api rest de un listado de artistas
## Indice
1. [Metodos get](#metodos-get)
2. [Metodo post](#metodo-post)
3. [Metodo delete](#metodo-delete)

### Metodos get
***
>Listado de metodos para obtener el listado de artistas filtrados y/o ordenados por campo u obtener un artista en especifico.

**Valores validos**
-
>Valores permitidos para los metodos get.
* campo: id, nombre_artista, nacionalidad, fecha_nacimiento, informacion.
* valor: valores validos o existentes en los campos.
* sort: id, nombre_artista, nacionalidad, fecha_nacimiento, informacion.
* order: asc o desc (ascendente o descendente).

>getAll - devolver el listado completo de artistas
```
http://localhost/TpEspecialRest/api/artistas
```

>get filtrado y ordenado
```
http://localhost/TpEspecialRest/api/artistas?campo=CampoTabla&valor=valorAtributo&sort=CampoTabla&order=orden
```
>get filtrado y ordenado por campo de forma ascendente por defecto.
```
http://localhost/TpEspecialRest/api/artistas?campo=campoTabla&valor=valorAtributo&sort=campoTabla
```

>get listado ordenado ascendente o descendente
```
http://localhost/TpEspecialRest/api/artistas?sort=campoTabla&order=orden
```
>get listado ordenado por campo de forma ascendente por defecto
```
http://localhost/TpEspecialRest/api/artistas?sort=id
```
>get artista individual por id
http://localhost/TpEspecialRest/api/artistas/:id

***
### METODO POST
***
Metodo para insertar nuevos artistas a partir del body no es necesario especificar id.
```
http://localhost/TpEspecialRest/api/artistas
```
```
    {
        "nombre_artista": "nombre",
        "fecha_nacimiento": "2022-10-04",
        "nacionalidad": "nacionalidad",
        "informacion": "info o descripcion"
    }
```
***
METODO DELETE
***
Metodo para eliminar artistas a partir de un id.

```
http://localhost/TpEspecialRest/api/artistas/:ID
```

