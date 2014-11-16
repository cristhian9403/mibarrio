<?php

	include ("perfil.php"); 

    include_once '../modelos/Modelo_Cliente.php';
    include_once '../controladores/Controlador_Cliente.php';
    include_once '../controladores/Controlador_Producto.php'; 
    include_once '../controladores/Controlador_Categoria.php';
    include_once '../modelos/Modelo_Producto.php';
    include_once '../modelos/Modelo_Categoria.php';
    //echo $_REQUEST['gestion'];
	$numero_error=$_REQUEST['gestion'];
    $_perfi = $c_usuario->get_Perfil();

    switch ($numero_error){ 
    default:
?>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class='panel-heading'>
                <h2 class='panel-title text-center'>Facturacion</h2>
            </div>
            <div class=' panel-body'>
              <form action='factura_Creada.php' method='post' class="form-horizontal">
                <fieldset>
                    <div class='form-group' >
                        <label  class='col-lg-2 control-label'>Vendedor:</label>
                        <div class='col-lg-3'><?php 
                            echo"<label  class=' col-lg-3 form-control'>".$c_usuario->get_Nombres()."</label>";
                            echo"<input class='hide' name='id_vende' value='".$c_usuario->get_Nid()."'/>";
                            ?>
                        </div>
                    </div>
                    <div class='form-group' >
                        <label  class='col-lg-2 control-label'>Cliente:</label>
                        <div class='col-lg-9'>
<?php       
                           //Aqui el algoritmo para hacer un combobox para los Clientes
                            $c_clientes = new Controlador_Cliente();
                            $m_clientes = new Modelo_Cliente($c_clientes);
                            $arr_clientes = $m_clientes->mostrar_Todos();
                            $tam_clientes = count($arr_clientes);
                            $combobit = "";
                            for($i = 0; $i < $tam_clientes; $i++){
                                    $combobit .=" <option value='".$arr_clientes[$i][0]."' selected>".$arr_clientes[$i][1]."</option>";
                            }
                            if($c_perfil->get_PermisoFacturacion())
                                echo "<select name='id_cliente' class='form-control'>".$combobit."</select>";
                            else echo "<select name='id_cliente' class='form-control' disabled>".$combobit."</select>";
?>
                        </div>
                    </div>
                    <div id="contenedorProductos" >  
                        <div class='form-group' id ='div_productos0'>
                            <label  class='col-lg-2 control-label'>Producto:</label>
                            <div class='col-lg-2'>
    <?php       
                                $c_producto = new Controlador_Producto();
                                $m_producto = new Modelo_Producto($c_producto);
                                echo $m_producto->crear_select($c_perfil->get_PermisoFacturacion(),0);
    ?>
                            </div>
                            <div class='col-lg-2'>
                                <input id='cantidad0'type='text' name='cantidad0' onBlur="verificarEntrada(0)" placeholder='Cantidad' required='required' class='form-control'/>
                            </div>
                            <div class='col-lg-2'>
                                <input type='text' id="precioUnidad0" readonly=true placeholder='precio c/u' required='required' class='form-control'/>
                            </div>
                            <div class='col-lg-2'>
                                <input type='text' id="precioTotal0"  readonly=true placeholder='precio total' required='required' class='form-control'/>
                            </div>
                        </div>
                    </div>
                    <div class='form-group' >
                        <label  class='col-lg-2 control-label'>Mas Productos:</label>
                        <div class='col-lg-9'>
                            <button class="btn btn-success" type="button" onclick="nuevaCapa()" ><i class="fa fa-plus"></i></button>
                        </div>
                    </div>


                    <div class='form-group' >
                        <div class='col-lg-9 col-lg-offset-3'>        
                            <input type='submit'  class='btn btn-primary' value='Crear Factura'>
                        </div>
                    </div>

                </fieldset>
              </form>
          </div>
          </div>
        </div>
    </div>
<?php
  


break;
case 1:
	echo "<div class='alert alert-dismissable alert-success'><h1><i>Se ha creado el usuario.</i></h1></div'>";
break; 
case 2:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Documento' m&iacute;nimo: 8 caracteres</div><br>";
break;
case 3:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Nombres' m&iacute;nimo: 2 caracteres</div><br>";
break;
case 4:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Apellidos' m&iacute;nimo: 2 caracteres</div><br>";
break;
case 5:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Usuario' m&iacute;nimo: 5 caracteres</div><br>";
break;
case 6:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Contrase&ntilde;a' m&iacute;nimo: 5 caracteres</div><br>";
break;
case 7:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Pregunta' m&iacute;nimo: 10 caracteres</div><br>";
break;
case 8:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Respuesta' m&iacute;nimo: 2 caracteres</div><br>";
break;
case 9:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Tipo Documento' m&iacute;nimo: 2 caracteres</div><br>";
break;
case 10:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Ciudad' m&iacute;nimo: 2 caracteres</div><br>";
break;
case 11:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Direcci&oacute;' m&iacute;nimo: 3 caracteres</div><br>";
break;
case 12:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Edad' m&iacute;nimo: 1 caracter</div><br>";
break;
case 13:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Foto' m&iacute;nimo: 3 caracteres</div><br>";
break;
case 14:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Tel&eacute;fono' m&iacute;nimo: 8 caracteres</div><br>";
break;
case 15:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Correo Electr&oacute;nico' m&iacute;nimo: 6 caracteres</div><br>";
break;
case 16:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'G&eacute;nero' m&iacute;nimo: 1 caracter</div><br>";
break;
case 17:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Perfil' m&iacute;nimo: 1 caracter</div><br>";
break;
case 18:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Documento' tipo de dato debe ser Num&eacute;rico</div><br>";
break;
case 19:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Usuario' tipo de dato debe ser Alfanum&eacute;rico</div><br>";
break;
case 20:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Nombres' tipo de dato debe ser Alfab&eacute;tico</div><br>";
break;
case 21:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Apellidos' tipo de dato debe ser Alfab&eacute;tico</div><br>";
break;
case 22:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Contrase&ntilde;a' tipo de dato debe ser Alfanum&eacute;rico</div><br>";
break;
case 23:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Pregunta' tipo de dato debe ser Alfanum&eacute;rico</div><br>";
break;
case 24:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Respuesta' tipo de dato debe ser Alfanum&eacute;rico</div><br>";
break;
case 25:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Ciudad' tipo de dato debe ser Alfab&eacute;tico</div><br>";
break;
case 26:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Edad' tipo de dato debe ser Num&eacute;rico</div><br>";
break;
case 27:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Foto' tipo de dato debe ser Alfanum&eacute;rico</div><br>";
break;
case 28:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Tel&eacute;fono' tipo de dato debe ser Num&eacute;rico</div><br>";
break;
case 29:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Correo Electr&oacute;nico' tipo de dato debe ser Alfanum&eacute;rico</div><br>";
break;
case 30:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Direcci&oacute;n' tipo de dato debe ser Alfanum&eacute;rico</div><br>";
break;
case 31:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado el usuario.</i></h1>";
    echo "<p>Error: El usuario con este Documento ya existe</div><br>";
break;
}


?>

                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/npm.js"></script>
        <!--<script src="../js/formularioDinamico.js"></script>-->
    </body>
</html>