# TPE-WEB2-CARBUY-API

### Integrantes:
Ramiro Sica Suescun  -- (ramirosicas@gmail.com)

### Temática del trabajo
Desarrollo de una **API REST** publica para brindar integración a otros sistemas, orientado a una concesionaria de autos. 

### Descripción del Trabajo
Se ha desarrollado una **API RESTful**, que implementa servicios **ABM** (Alta, Baja, Consulta y Modificación) que se pueden realizar sobre un conjunto de datos. 

La misma trabaja sobre la base de datos del proyecto anterior, la cual se basaba en una relación entre los registros de autos y marcas. Esta relación se define como 1-N, donde cada auto está asociado a una única marca y mientras que una marca puede estar relacionado con más de un auto.

### Despliegue
Para el despliegue desde el repositorio se deben realizar los siguientes pasos:

1. Clonar el repositorio en su ordenador. La clonación puede hacerse descomprimiendo el archivo ZIP o clonando mediante aplicaciones como GIT.
2. Se debe configurar la base de datos. La base de datos deberá llevar el nombre **db_carbuy**. La misma cuenta con el método Auto Deploy.
3. Contar con alguna herramienta para construir y testear APIs. ej.: **POSTMAN** (La cual será utilizada en este caso). 

## Funcionamiento

La API funciona sobre las entidades:
- Autos: Permite gestionar el inventario de autos a disposición, teniendo en cuenta el precio, descripción y marca.
- Marcas: Permite gestionar el listado de marcas a disposición en la concesionaria, con los autos que cuenta y logo para su mejor visualización. 

### Autos

| Endpoint   | Método | Controlador        | Acción                              | 
| /autos     | GET    | CarApiController   | Muestra todos los Autos             |
| /autosOp   | GET    | CarApiController   | Muestra todos los Autos (Opcional)  |
| /autos     | POST   | CarApiController   | Crea un nuevo auto                  |
| /auto/:id  | GET    | CarApiController   | Muestra un auto según ID            |
| /auto/:id  | DELETE | CarApiController   | Borra un auto según ID              |
| /auto/:id  | PUT    | CarApiController   | Modifica un auto según ID           |


**Mostrar todos los autos**

- **Endpoint:** `/autos`
- **Método**: `GET`
- **Ejemplo**:

    ```
    http://localhost/web2/TPE-Web2-CarBuy-Api/api/autos
    ```

Para la parte opcional del trabajo, en la cual se debia poder ordenar, filtrar o paginar se realizo a traves de otro endpoint que funciona con parametros adicionales

- **Endpoint:** `/autosOp`
- **Método**: `GET`
- Parametros adicionales:
   - **order_dir**: ordena los resultados por una columna de forma ascendente o descendente.
   - **order_by**: filtra por campo.
   - **limit**: Numero de elementos a mostrar.
   - **page**: Pagina a mostrar.
- **Ejemplo Completo**:

    ```
    http://localhost/web2/TPE-Web2-CarBuy-Api/api/autosOp?order_by=id_marca_fk=1&order_dir=id_auto desc&limit=3&page=2
    ```

**Crear un nuevo auto**

- **Endpoint:** `/autos`
- **Método**: `POST`
- **Ejemplo**:

    ```
    http://localhost/web2/TPE-Web2-CarBuy-Api/api/autos
    ```
    Los datos se ingresan por **body** en formato **JSON**
    
    ```json
    {
        "nombre_auto": "Clio",
        "descripcion": "Renault Clio 1.6 | 2004 | 286.000KM",
        "precio": "$6.000.500",
        "id_marca_fk": 7
    }
    ```

**Modificar auto**

- **Endpoint:** `/auto/:id`
- **Método**: `PUT`
- **Ejemplo**:

    ```
    http://localhost/web2/TPE-Web2-CarBuy-Api/api/auto/18
    ```
    Los datos se ingresan por **body** en formato **JSON**
    
    ```json
    {
        "nombre_auto": "Clio Mio",
        "descripcion": "Renault Clio Mio 1.6 | 2004 | 286.000KM",
        "precio": "$6.000.500",
        "id_marca_fk": 7
    }
    ```

**Elimirar auto**

- **Endpoint:** `/auto/:id`
- **Método**: `DELETE`
- **Ejemplo**:

    ```
    http://localhost/web2/TPE-Web2-CarBuy-Api/api/auto/18
    ```

### Marcas

| Endpoint   | Método | Controlador        | Acción                              | 
| /marcas    | GET    | MarcaApiController | Muestra todos las Marcas            |
| /marcasOp  | GET    | MarcaApiController | Muestra todos las Marcas (Opcional) |
| /marcas    | POST   | MarcaApiController | Crea una nueva marca                |
| /marca/:id | GET    | MarcaApiController | Muestra una marca según ID          |
| /marca/:id | DELETE | MarcaApiController | Borra una marca según ID            |
| /marca/:id | PUT    | MarcaApiController | Modifica una marca según ID         |




## Usuario administrador:

-*Usuario:* webadmin
-*Contraseña:* admin
