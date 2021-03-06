<?php
include_once 'Modelo_Bd.php';
include_once 'Validacion_Datos.php';

class Modelo_Producto{
	private $bd;		// Tipo: BD
	private $producto;	// Tipo: Controlador_Usuario
	
	public function __construct($control_Producto){
		$this->bd = new BD("base1","root");
		$this->bd->conectar();
		$this->producto = $control_Producto;
	}
	
	// Void: Buscar los datos del producto dependiendo del Nombre de producto
	public function buscar_Producto($id){
		$sql = "select id, nombre, descripcion, categoria, iva, valorIva, precioCompra,
			precioVenta, cantidad, estado
			from productos where id='$id'";
		$registros = $this->bd->consultar($sql);
		if($reg=mysql_fetch_array($registros)){
			$this->producto->set_Id($reg['id']);
			$this->producto->set_Nombre($reg['nombre']);
			$this->producto->set_Descripcion($reg['descripcion']);
			$this->producto->set_Categoria($reg['categoria']);
			$this->producto->set_Iva($reg['iva']);
			$this->producto->set_Valor_Iva($reg['valorIva']);
			$this->producto->set_Precio_Compra($reg['precioCompra']);
			$this->producto->set_Precio_Venta($reg['precioVenta']);
			$this->producto->set_Cantidad($reg['cantidad']);
			$this->producto->set_Estado($reg['estado']);		
		}
	}

	// Void: Buscar los datos del usuario dependiendo del Documento de usuario
	public function buscar_Producto2($id){
		$sql = "select id, nombre, descripcion, categoria, iva, valorIva, precioCompra,
			precioVenta, cantidad, estado
			from productos where id='$id'";
		$registros = $this->bd->consultar($sql);
		if($reg=mysql_fetch_array($registros)){
			$this->producto->set_Id($reg['id']);
			$this->producto->set_Nombre($reg['nombre']);
			$this->producto->set_Descripcion($reg['descripcion']);
			$this->producto->set_Categoria($reg['categoria']);
			$this->producto->set_Iva($reg['iva']);
			$this->producto->set_Valor_Iva($reg['valorIva']);
			$this->producto->set_Precio_Compra($reg['precioCompra']);
			$this->producto->set_Precio_Venta($reg['precioVenta']);
			$this->producto->set_Cantidad($reg['cantidad']);
			$this->producto->set_Estado($reg['estado']);		
		}
	}
	
	// int: Actualiza la BD con los datos que hay en el Controlador: usuario
	public function actualizar_Datos_Producto($id){
		$sql = "UPDATE `productos` SET`nombre` = '".$this->producto->get_Nombre()."',
								`descripcion` = '".$this->producto->get_Descripcion()."', 
								`categoria` = '".$this->producto->get_Categoria()."',
								`iva` = '".$this->producto->get_Iva()."', 
								`valorIva` = '".$this->producto->get_valor_Iva()."',
								`precioCompra` = '".$this->producto->get_Precio_Compra()."', 
								`precioVenta` = '".$this->producto->get_Precio_Venta()."',
								`cantidad` = '".$this->producto->get_Cantidad()."', 
								`estado` = '".$this->producto->get_Estado()."'
			WHERE `id` = '".$id."';";

		$salida = 0;
		$valida = new Validacion_Datos(); // <- Para validar los tipos de datos
		// Validacion de los minimos
		if(((strlen($this->producto->get_Id()) > 15)||(strlen($this->producto->get_Id()) < 2))) $salida = 2;
		elseif(((strlen($this->producto->get_Nombre()) > 30)||(strlen($this->producto->get_Nombre()) < 4))) $salida = 3;
		elseif(((strlen($this->producto->get_Descripcion()) > 500)||(strlen($this->producto->get_Descripcion()) < 15)))	$salida = 4;
		elseif(((strlen($this->producto->get_valor_Iva()) > 2)||(strlen($this->producto->get_valor_Iva()) < 1)))	$salida = 5;
		elseif(((strlen($this->producto->get_Precio_Compra()) > 10)||(strlen($this->producto->get_Precio_Compra()) < 2))) $salida = 6;
		elseif(((strlen($this->producto->get_Precio_Venta()) > 10)||(strlen($this->producto->get_Precio_Venta()) < 2))) $salida = 7;
		elseif(((strlen($this->producto->get_Cantidad()) > 10)||(strlen($this->producto->get_Cantidad()) < 1))) $salida = 8;

		// Validacion de los tipos de datos (Numérico,Alfabético,Alfanumérico)
		elseif(!($valida->is_Alphanumeric($this->producto->get_Id()))) $salida = 9;
		elseif(!($valida->is_Alphabetic($this->producto->get_Nombre()))) $salida = 10;
		elseif(!($valida->is_Alphanumeric($this->producto->get_Descripcion()))) $salida = 11;
		elseif(!($valida->is_Number($this->producto->get_Precio_Compra()))) $salida = 12;
		elseif(!($valida->is_Number($this->producto->get_Precio_Venta()))) $salida = 13;
		elseif(!($valida->is_Number($this->producto->get_Cantidad()))) $salida = 14;


		///////////////////////////////////////////////////////////////////////////

		
		elseif($this->bd->insertar($sql))
			$salida = true;
		else $salida = 15;
		

		return $salida;
	}
	
	// int: Actualiza la BD con los datos que hay en el Controlador: usuario
	public function actualizar_Datos_Producto2($id){
		$sql = "UPDATE `productos` SET`nombre` = '".$producto->get_Nombre()."',
								`descripcion` = '".$producto->get_Descripcion()."', 
								`categoria` = '".$producto->get_Categoria()."',
								`iva` = '".$producto->get_Iva()."', 
								`valorIva` = '".$producto->get_valor_Iva()."',
								`precioCompra` = '".$producto->get_Precio_Compra()."', 
								`precioVenta` = '".$producto->get_Precio_Venta()."',
								`cantidad` = '".$producto->get_Cantidad()."', 
								`estado` = '".$producto->get_Estado()."'
			WHERE `id` = '".$id."';";

		//echo $sql;
		$salida = 0;
		$valida = new Validacion_Datos(); // <- Para validar los tipos de datos
		// Validacion de los minimos
		if(((strlen($this->producto->get_Id()) > 15)||(strlen($this->producto->get_Id()) < 2))) $salida = 2;
		elseif(((strlen($this->producto->get_Nombre()) > 30)||(strlen($this->producto->get_Nombre()) < 4))) $salida = 3;
		elseif(((strlen($this->producto->get_Descripcion()) > 500)||(strlen($this->producto->get_Descripcion()) < 15)))	$salida = 4;
		elseif(((strlen($this->producto->get_valor_Iva()) > 6)||(strlen($this->producto->get_valor_Iva()) < 3)))	$salida = 5;
		elseif(((strlen($this->producto->get_Precio_Compra()) > 10)||(strlen($this->producto->get_Precio_Compra()) < 2))) $salida = 6;
		elseif(((strlen($this->producto->get_Precio_Venta()) > 10)||(strlen($this->producto->get_Precio_Venta()) < 2))) $salida = 7;
		elseif(((strlen($this->producto->get_Cantidad()) > 10)||(strlen($this->producto->get_Cantidad()) < 1))) $salida = 8;

		// Validacion de los tipos de datos (Numérico,Alfabético,Alfanumérico)
		elseif(!($valida->is_Alphanumeric($this->producto->get_Id()))) $salida = 9;
		elseif(!($valida->is_Alphabetic($this->producto->get_Nombre()))) $salida = 10;
		elseif(!($valida->is_Alphanumeric($this->producto->get_Descripcion()))) $salida = 11;
		elseif(!($valida->is_Number($this->producto->get_Precio_Compra()))) $salida = 12;
		elseif(!($valida->is_Number($this->producto->get_Precio_Venta()))) $salida = 13;
		elseif(!($valida->is_Number($this->producto->get_Cantidad()))) $salida = 14;


		///////////////////////////////////////////////////////////////////////////

		
		elseif($this->bd->insertar($sql))
			$salida = true;
		else $salida = 15;
		

		return $salida;
	}
	
	public function crear_Producto(){
		echo 'Valor de Id= '.$this->producto->get_Id();
		$sql = "INSERT INTO productos (`id`, `nombre`, `descripcion`, `categoria`, 
			`iva`, `valorIva`, `precioCompra`, `precioVenta`, `cantidad`, `estado`) 
		SELECT '".$this->producto->get_Id()."',
									'".$this->producto->get_Nombre()."',
									'".$this->producto->get_Descripcion()."',
									'".$this->producto->get_Categoria()."',
									'".$this->producto->get_Iva()."',
									'".$this->producto->get_valor_Iva()."',
									'".$this->producto->get_Precio_Compra()."',
									'".$this->producto->get_Precio_Venta()."',
									'".$this->producto->get_Cantidad()."',
									'".$this->producto->get_Estado()."';";

		// 							,
		// 							ID 
		// FROM perfiles WHERE perfiles.Nombre='".$this->producto->get_Categoria()."'

		$salida = 0;
		$valida = new Validacion_Datos(); // <- Para validar los tipos de datos
		// Validacion de los minimos
		if(((strlen($this->producto->get_Id()) > 15)||(strlen($this->producto->get_Id()) < 2))) $salida = 2;
		elseif(((strlen($this->producto->get_Nombre()) > 30)||(strlen($this->producto->get_Nombre()) < 4))) $salida = 3;
		elseif(((strlen($this->producto->get_Descripcion()) > 500)||(strlen($this->producto->get_Descripcion()) < 15)))	$salida = 4;
		elseif((strlen($this->producto->get_valor_Iva())> 6 )||(strlen($this->producto->get_valor_Iva()) < 3))	$salida = 5;
		elseif(((strlen($this->producto->get_Precio_Compra()) > 10)||(strlen($this->producto->get_Precio_Compra()) < 2))) $salida = 6;
		elseif(((strlen($this->producto->get_Precio_Venta()) > 10)||(strlen($this->producto->get_Precio_Venta()) < 2))) $salida = 7;
		elseif(((strlen($this->producto->get_Cantidad()) > 10)||(strlen($this->producto->get_Cantidad()) < 1))) $salida = 8;

		// Validacion de los tipos de datos (Numérico,Alfabético,Alfanumérico)
		elseif(!($valida->is_Alphanumeric($this->producto->get_Id()))) $salida = 9;
		elseif(!($valida->is_Alphabetic($this->producto->get_Nombre()))) $salida = 10;
		elseif(!($valida->is_Alphanumeric($this->producto->get_Descripcion()))) $salida = 11;
		elseif(!($valida->is_Number($this->producto->get_Precio_Compra()))) $salida = 12;
		elseif(!($valida->is_Number($this->producto->get_Precio_Venta()))) $salida = 13;
		elseif(!($valida->is_Number($this->producto->get_Cantidad()))) $salida = 14;


		///////////////////////////////////////////////////////////////////////////
	
		elseif($this->bd->insertar($sql))
			$salida = true;
		else $salida = 15;
		

		return $salida;
	}

	public function desconectarBD(){
		$this->bd->desconectar();
	}

	public function mostrar_Todos(){

		$sql = "SELECT productos.id,productos.nombre, productos.descripcion,categoria.nombre,iva,valorIva,precioCompra,precioventa,Cantidad,estado FROM productos,categoria WHERE categoria=categoria.id ORDER BY productos.nombre ASC";
		/*$sql = "select * from productos";
		$sql = "SELECT `Documento`, `Nombres`, `Apellidos`, `Usuario`, `Password`, `Pregunta`, `Respuesta`, 
		`Tipo_Documento`, `Ciudad`, `Direccion`, `Edad`, `Foto`, `Telefono`, `Correo_Electronico`, `Genero`, 
		`Nombre` FROM `usuarios`,`perfiles` WHERE (usuarios.perfiles_Nombre=perfiles.ID)";*/
		$registros = $this->bd->consultar($sql);
		$ar;

	    for($i = 0; $row = mysql_fetch_row($registros); $i++){

	        for($j = 0; $j < 10; $j++){
	            
	            $ar[$i][$j] = $row[$j];

	        }
	    }

	    return $ar;
	}

	public function crear_select($permiso,$num_producto){ // Crea el select que se una en la creacion de la factura 

                                $productos = $this->mostrar_Todos();
                                $tam_productos = count($productos);
                                $combobit = "";
                                for($i = 0; $i < $tam_productos; $i++){
                                    if($i==1)
                                        $combobit .=" <option value='".$productos[$i][0]."' selected>".$productos[$i][1]."</option>";
                                    else
                                        $combobit .=" <option value='".$productos[$i][0]."'>".$productos[$i][1]."</option>";
                                }
                                if($permiso)
                                    return "<select id='select_productos".$num_producto."' name='producto".$num_producto."' class='form-control'>".$combobit."</select>";
                                else return "<select name='producto' class='form-control' disabled>".$combobit."</select>";
	}


	public function precio_Producto($id,$id_fac){// funcion que se ejecuta por medio de jquery, esta funcion retorna el precio del producto asi como la cantidad que hay disponible del mismo 
				$sql = "SELECT `precioVenta`, `cantidad` FROM productos WHERE id = '".$id."' ";
				$precio = mysql_fetch_array($this->bd->consultar($sql));
				$sql = "SELECT sum(cantidadProducto) AS suma FROM listaproductos ,factura WHERE listaproductos.Idfactura=factura.Idfactura AND IdProducto= '".$id."' AND factura.estado='Sin registra' AND listaproductos.Idfactura<>$id_fac";
				if($row = $this->bd->consultar($sql) )
				{
					$cantidad = mysql_fetch_array($row);
					$disponible = intval($precio["cantidad"])-intval($cantidad["suma"]);
				}
				else
				{
					$disponible = intval($precio["cantidad"]);
				}
				//return $sql;
				return $precio["precioVenta"]." <l> ".$disponible;
	}

	public function selec_precio_iva($id){
		$sql = "SELECT precioVenta,valorIva,iva from productos where id='".$id."'";
		$registros = $this->bd->consultar($sql);
		$arreglo_resultado = mysql_fetch_array($registros);
		/*$resultado[0] = $arreglo_resultado[0];
		$resultado[1] = $arreglo_resultado[1];
		$resultado[2] = $arreglo_resultado[2];*/
		return $arreglo_resultado;
	}

	public function crear_select2($permiso,$num_producto,$id_producto){ // crea el select en la parte de la modificacion de facturas 
		//num_producto es el numero de producto, osea la fila en la que esta 

                                $productos = $this->mostrar_Todos();
                                $tam_productos = count($productos);
                                $combobit = "";
                                for($i = 0; $i < $tam_productos; $i++){
                                    if($productos[$i][0]==$id_producto)
                                        $combobit .=" <option value='".$productos[$i][0]."' selected>".$productos[$i][1]."</option>";
                                    else
                                        $combobit .=" <option value='".$productos[$i][0]."'>".$productos[$i][1]."</option>";
                                }
                                if($permiso)
                                    return "<select id='select_productos".$num_producto."' name='producto".$num_producto."' class='form-control'>".$combobit."</select>";
                                else return "<select name='producto' class='form-control' disabled>".$combobit."</select>";
	}
}

?>
