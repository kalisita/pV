<?php
    header ("access-control-allow-origin: *");
    include 'modeloK.php';

   if (isset($_GET["getProductos"])) {
        $sistema = new Sistema();
        $sistema->getProductos();
        $productos= array();
        $i = 0;
        while ($productoFila = $sistema->obtenerGetProductos()){
            $producto = array();
            foreach ($productoFila as $key => $value) {
                $producto[$key] = $value;
            }
            array_unshift($productos, $producto);
        } 
        echo json_encode($productos);
   }
function utf8_encode_recursive ($array)
        {
            $result = array();
            foreach ($array as $key => $value)
            {
                if (is_array($value))
                {
                    $result[$key] = utf8_encode_recursive($value);
                }
                else if (is_string($value))
                {
                    $result[$key] = utf8_encode($value);
                }   
                else
                {
                    $result[$key] = $value;
                }
             }
            return $result;
        }

if (isset($_GET["getCategorias"])){     
        $sistema = new Sistema();
        $sistema->consultarCategoriasIdNombre();
        $categoriasIdNombreTodas= array();
        $i = 0;
        while ($filaActivida = $sistema->obtenerCategoriasIdNombre()){
            $j=0;
            foreach ($filaActivida as $key => $value) {
                $categoriasIdNombreTodas[$i][$j] = $value;
                $j++;
            }
            $i++;
        }  
       echo json_encode($categoriasIdNombreTodas);
  }   

if (isset($_GET["getMarcas"])){
  
    $sistema = new Sistema();
    $sistema->consultarMarcasIdNombre();
    $marcasIdNombreTodas=array();
    $i=0;
    while ($filaMarca=$sistema->obtenerMarcasIdNombre()){
        $j=0;
        foreach ($filaMarca as $key => $value) {
            $marcasIdNombreTodas[$i][$j] = $value;
            $j++;
        }
        $i++;
    } 
    for ($i=0; $i < count($marcasIdNombreTodas); $i++){
        for ($j=0; $j < count($marcasIdNombreTodas[$i]); $j++){
           // $dato = $marcasIdNombreTodas[$i][$j];
               // echo "$dato"; 
            }
               // echo "<br>";    }
    
    }
    echo json_encode($marcasIdNombreTodas);
}

if (isset($_GET["getProveedores"])){

    $sistema = new Sistema();
    $sistema->consultarProveedoresIdNombre();
    $proveedoresIdNombreTodos=array();
    $i=0;
    while ($filaproveedores=$sistema->obtenerProveedoresIdNombre()){
        $j=0;
        foreach ($filaproveedores as $key => $value) {
            $proveedoresIdNombreTodos[$i][$j]=$value;
            $j++;            
        }
        $i++;
    }
    for ($i=0; $i < count($proveedoresIdNombreTodos); $i++){
        for ($j=0; $j < count($proveedoresIdNombreTodos[$i]); $j++){
           // $dato = $proveedoresIdNombreTodos[$i][$j];
              // echo "$dato";
            }

    }
    echo json_encode($proveedoresIdNombreTodos);
}


   if (isset($_GET["getProductosCategoria"])){
    $id= $_GET["getProductosCategoria"];
    $sistema = new sistema();
    $sistema->consultarProductosCategoria($id);
    $productosCatTodos=array();
    $i=0;
    while($filaproductos=$sistema->obtenerProductosCategorias()){
        $j=0;
        foreach ($filaproductos as $key => $value) {
            $productosCatTodos[$i][$j]=$value;
            $j++;
        }
        $i++;
    }
    for ($i=0; $i < count($productosCatTodos); $i++){
        for ($j=0; $j < count($productosCatTodos[$i]); $j++){
          // $dato = $productosCatTodos[$i][$j];
           // echo "$dato";
            }

    }
    echo json_encode($productosCatTodos);
}


   if (isset($_GET["getProductosMarca"])){
     $marca= $_GET["getProductosMarca"];
        $sistema = new sistema();
        $sistema->consultarProductosMarcas($marca);
        $productosMarcaTodos=array();
        $i=0;
        while ($filaMarcas=$sistema->obtenerProductosMarcas()) {
            $j=0;
            foreach ($filaMarcas as $key => $value) {
                $productosMarcaTodos[$i][$j]=$value;
                $j++;
            }
            $i++;
        }
        for ($i=0; $i < count($productosMarcaTodos); $i++){
           for ($j=0; $j < count($productosMarcaTodos[$i]); $j++){
               ////  $dato = $productosMarcaTodos[$i][$j];
                  // echo "$dato";
           }
        }
          echo json_encode($productosMarcaTodos);
     }
    

        if(isset($_GET["getProductosProveedor"])){
        $prov=$_GET["getProductosProveedor"];
        $sistema= new sistema();
        $sistema->consultarProductosProveedores($prov);
        $productosProveedoresTodos=array();
        $i=0;
        while ($filaProveedores=$sistema->obtenerProductosProveedores()){
            $j=0;
            foreach ($filaProveedores as $key => $value) {
                $productosProveedoresTodos[$i][$j]=$value;
                $j++;
            }
            $i++;
        }
        for ($i=0; $i < count($productosProveedoresTodos); $i++){
            for ($j=0; $j < count($productosProveedoresTodos[$i]); $j++){
                 //$dato = $productosProveedoresTodos[$i][$j];
                //echo "$dato";

            }
        }
            echo json_encode($productosProveedoresTodos);

}
       
        if(isset($_GET["getProductosCoincidencia"])){
        $busqueda=$_GET["getProductosCoincidencia"];
        $sistema= new sistema();
        $sistema->consultarProductosCoincidencia($busqueda);
        $productosCoincidenciaTodos=array();
        $i=0;
        while ($filaProductos=$sistema->obtenerProductosCoincidencia()){
            $j=0;
            foreach ($filaProductos as $key => $value) {
                $productosCoincidenciaTodos[$i][$j]=$value;
                $j++;
            }
            $i++;
        }
        for ($i=0; $i < count($productosCoincidenciaTodos); $i++){
            for ($j=0; $j < count($productosCoincidenciaTodos[$i]); $j++){
                 //$dato = $productosCoincidenciaTodos[$i][$j];
                 //echo "$dato";

            }
        }
           echo json_encode($productosCoincidenciaTodos);
    }
   
    if (isset($_GET["getPCC"]) && isset($_GET["getPMM"])) {
        $idCategoria=$_GET["getPCC"];
        $idMarca=$_GET["getPMM"];
        $sistema=new sistema();
        $sistema->consultarGetProductosCategoriasMarcas($idCategoria,$idMarca);
        $productos=array();
        $i=0;
        while ($filaProductos=$sistema->obtenerGetProductosCategoriasMarca()){
            $producto= array();
            foreach ($filaProductos as $key => $value) {
                $producto[$key] = $value; 
            }
            array_unshift($productos, $producto);
        }
        echo json_encode($productos);
    }

    if (isset($_GET["getPCC3"]) && isset($_GET["getPMM3"]) && isset($_GET["getPPP"])) {
        $idCategoria=$_GET["getPCC3"];
        $idMarca=$_GET["getPMM3"];
        $idProveedor=$_GET["getPPP"];
    $sistema=new sistema();
    $sistema->consultarGetCatMarProv($idCategoria,$idMarca,$idProveedor);
    $productos=array();
    $i=0;
    while ($filaProductos=$sistema->obtenerGetCatMarProv()){
        $producto=array();
        foreach ($filaProductos as $key => $value) {
            $producto[$key] = $value;
        }
        array_unshift($productos,$producto);
    }
    echo json_encode($productos);
}
if (isset($_GET["idMarcaGPMP"]) && isset($_GET["idProveedorGPMP"])) {
    $idMarca = $_GET["idMarcaGPMP"];
    $idProveedor = $_GET["idProveedorGPMP"];
    $sistema = new Sistema();
    $sistema->getProductosMarcaProveedor($idMarca, $idProveedor);
    $productosMP = array();

    while ($filaProductoMP = $sistema->obtenerProductosMarcaProveedor()) {
        $productoMP = array();
        foreach ($filaProductoMP as $key => $value) {
            $productoMP[$key] = $value;
        }
        array_unshift($productosMP, $productoMP);
    }
    echo json_encode($productosMP);
}

if (isset($_GET["idCategoriaGPCP"]) && isset($_GET["idProveedorGPCP"])){
    $idCategoria = $_GET["idCategoriaGPCP"];
    $idProveedor = $_GET["idProveedorGPCP"];
    $sistema = new Sistema();
    $sistema->getProductosCategoriaProveedor($idCategoria, $idProveedor);
    $productosCP = array();
    while ($filaProductoCP = $sistema->obtenerProductosCategoriaProveedor()) {
        $productoCP = array();
        foreach ($filaProductoCP as $key => $value) {
            $productoCP[$key] = $value;
        }
        array_unshift($productosCP, $productoCP);
    }
    echo json_encode($productosCP);
}

if (isset($_GET["deleteProducto"])) {
    $codigoProductoEliminar = $_GET["deleteProducto"];
    $sistema = new Sistema();
    $estadoEliminar = $sistema->deleteProducto($codigoProductoEliminar);
    echo "$estadoEliminar";
}

if (isset($_POST["nuevoProducto"])) {
    $nuevoProducto = json_decode($_POST["nuevoProducto"],true);
    $sistema = new sistema();
    $productos = $sistema->crearNuevoProducto($nuevoProducto);
    echo json_encode($productos);
}   


if (isset($_POST["updateProducto"])) {
    $productoActualizado = json_decode($_POST["updateProducto"],true);
    $sistema = new sistema();
    $sistema->modificarNuevoProducto($productoActualizado);
    // a partir de aca es pura prueba
        $productos=array();
        $i=0;
        while ($filaProductos=$sistema->obtenerModificarNuevoProducto()){
        $producto=array();
        foreach ($filaProductos as $key => $value) {
            $producto[$key] = $value;
        }
        array_unshift($productos,$producto);
    }
    echo json_encode($productos);
}   


 if(isset($_GET["getProductosCoincidenciaVenta"])){
        $coincidencia=$_GET["getProductosCoincidenciaVenta"];
        $sistema= new sistema();
        $sistema->consultarProductosCoincidenciaVenta($coincidencia);
        $productos=array();
        $i=0;
        while ($filaProductos=$sistema->obtenerProductosCoincidenciaVenta()){
        $producto=array();
        foreach ($filaProductos as $key => $value) {
            $producto[$key] = $value;
        }
        array_unshift($productos,$producto);
    }
    echo json_encode($productos);
}   


if(isset($_GET["idMarcas"])&& isset($_GET["idCategorias"])){
        $coincidencia=$_GET["getProductosCoincidenciaVenta"];
        $sistema= new sistema();
        $sistema->consultarProductosCoincidenciaVenta($coincidencia);
        $productos=array();
        $i=0;
        while ($filaProductos=$sistema->obtenerProductosCoincidenciaVenta()){
        $producto=array();
        foreach ($filaProductos as $key => $value) {
            $producto[$key] = $value;
        }
        array_unshift($productos,$producto);
    }
    echo json_encode($productos);
}   
    

if(isset($_GET["categoriaVenta"])&& isset($_GET["marcaVenta"])){
        $catVenta=$_GET["categoriaVenta"];
        $marcaVenta=$_GET["marcaVenta"];
        $sistema= new sistema();
        $sistema->consultarGetProductosCategoriaMarcaVenta($catVenta,$marcaVenta);
        $productos=array();
        $i=0;
        while ($filaProductos=$sistema->obtenerGetProductosCategoriaMarcaVenta()){
        $producto=array();
        foreach ($filaProductos as $key => $value) {
            $producto[$key] = $value;
        }
        array_unshift($productos,$producto);
    }
    echo json_encode($productos);
}  

if (isset($_GET["getProductosMarcaVenta"])) {
    $idMarca = $_GET["getProductosMarcaVenta"];
    $sistema = new Sistema();
    $sistema->consultarGetProductoMarcaVenta($idMarca);
    $productosM = array();
    while ($filaProductoM = $sistema->obtenerProductoMarcaVenta()) {
        $productoM = array();
        foreach ($filaProductoM as $key => $value) {
            $productoM[$key] = $value;
        }
        array_unshift($productosM, $productoM);
    }
    echo json_encode($productosM);
}

if(isset($_GET["getProductosCategoriaVenta"])){
    $idCategoria=$_GET["getProductosCategoriaVenta"];
    $sistema = new sistema();
    $sistema->consultarGetProductosCategoriaVenta($idCategoria);
    $productos = array();    while ($filaProducto = $sistema->obtenerProductoCategoriaVenta()) {

        $producto = array();
        foreach ($filaProducto as $key => $value) {
            $producto[$key] = $value;
        }
        array_unshift($productos, $producto);
    }
    echo json_encode($productos);
}

if(isset($_GET["idMarcas"])&& isset($_GET["idCategorias"])){
        $coincidencia=$_GET["getProductosCoincidenciaVenta"];
        $sistema= new sistema();
        $sistema->consultarProductosCoincidenciaVenta($coincidencia);
        $productos=array();
        $i=0;
        while ($filaProductos=$sistema->obtenerProductosCoincidenciaVenta()){
        $producto=array();
        foreach ($filaProductos as $key => $value) {
            $producto[$key] = $value;
        }
        array_unshift($productos,$producto);
    }
    echo json_encode($productos);
}   
if (isset($_GET["idCategorias"]) && isset($_GET["idMarca"]) && isset($_GET["coincidencias"])) {
        $idCategoria=$_GET["idCategorias"];
        $idMarca=$_GET["idMarca"];
        $coincidencias=$_GET["coincidencias"];
        $sistema=new sistema();
        $sistema->consultarCoincidenciaCatMVenta($idCategoria,$idMarca,$coincidencias);
        $productos=array();
        $i=0;
        while ($filaProductos=$sistema->obtenerCoincidenciaCatMVenta()){
            $producto= array();
            foreach ($filaProductos as $key => $value) {
                $producto[$key] = $value; 
            }
            array_unshift($productos, $producto);
        }
        echo json_encode($productos);
    }

    if (isset($_POST["ventaCarritoCompra"])) {
        $carritoCompra = json_decode($_POST["ventaCarritoCompra"],true);
        $descripcion=$carritoCompra['descripcion'];
        $usuario=$carritoCompra['usuario'];
        $carrito=$carritoCompra['carrito'];
        $tienda = new Sistema();
        $fecha = date("Y-m-d");
        $hora = date("G:i:s");
        $idNuevaVenta=$tienda->crearVenta($descripcion,$fecha,$hora,$usuario,2);
        foreach ($idNuevaVenta as $key => $value) {
            $idNV = $value;
        }
        
        for($i = 0; $i < count($carrito); $i++){
            $idProducto = $carrito[$i]["_id"];
            $cantidadComprada = $carrito[$i]["cantidad"];
            $tienda->detalleVenta($cantidadComprada,$idProducto,$idNV);
        }

       







       /*     
        if (isset($_POST["updateCategoria"])) {
        $categoriaActualizada = json_decode($_POST["updateCategoria"],true);
        $sistema = new sistema();
        $sistema->modificarCategorias($categoriaActualizada);
        // a partir de aca es pura prueba
        $categorias=array();
        $i=0;
        while ($filaCategorias=$sistema->obtenerModificarNuevaCategoria()){
        $categoria=array();
        foreach ($filaCategorias as $key => $value) {
            $categoria[$key] = $value;
        }
        array_unshift($categorias,$categoria);
    }
    echo json_encode($categorias);
} 


        if (isset($_GET["deleteCategoria"])) {
        $idCategoriaEliminar = $_GET["deleteCategoria"];
        $sistema = new Sistema();
        $estadoEliminar = $sistema->deleteCategoria($idCategoriaEliminar);
        echo "$estadoEliminar";
    }

if (isset($_POST["updateProveedores"])) {
        $actualizadaProveedores = json_decode($_POST["updateProveedores"],true);
        $sistema = new sistema();
        $sistema->modificarProveedores($actualizadaProveedores);
        // a partir de aca es pura prueba
        $proveedores=array();
        $i=0;
        while ($filaProveedores=$sistema->obtenerNuevoProveedor()){
        $proveedor=array();
        foreach ($filaProveedores as $key => $value) {
            $proveedor[$key] = $value;
        }
        array_unshift($proveedores,$proveedor);
    }
    echo json_encode($proveedores);
} 


        if (isset($_GET["deletePreoveedores"])) {
        $idProveedoresEliminar = $_GET["deletePreoveedores"];
        $sistema = new Sistema();
        $estadoEliminar = $sistema->deleteProveedores($idProveedoresEliminar);
        echo "$estadoEliminar";
    }

if (isset($_POST["updateMarcas"])) {
        $actualizadaProveedores = json_decode($_POST["updateMarcas"],true);
        $sistema = new sistema();
        $sistema->modificarMarcas($actualizadaProveedores);
        // a partir de aca es pura prueba
        $marcas=array();
        $i=0;
        while ($filaMarcas=$sistema->obtenerNuevaMarca()){
        $marca=array();
        foreach ($filaMarca as $key => $value) {
            $marca[$key] = $value;
        }
        array_unshift($marcas,$marca);
    }
    echo json_encode($marcas);
} 


        if (isset($_GET["deleteMarcas"])) {
        $idMarcasEliminar = $_GET["deleteMarcas"];
        $sistema = new Sistema();
        $estadoEliminar = $sistema->deleteMarcas($idMarcasEliminar);
        echo "$estadoEliminar";
    */
























}
















?>