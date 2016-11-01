<?php

class Carrito{
    public $codigo;
    public $productos;

    function  __construct($id) {
        $this->codigo=$id;
        $this->productos=array();
    }

    //Indico el codigo y recupero un producto si es que existe en ele carrito

    public function obtenerProducto($codigo){
        foreach($this->productos as $indice => $producto){
            if($producto->codpro==(int)$codigo){
                return $producto;
            }
        }
        return null;
    }

    //Actualiza la cantidad de items par aun mismo producto que ya existe en el carrito

    public function actualizarCantidad($codigo,$cantidad){
        foreach ($this->productos as $indice => $producto){
            if($producto->codpro==(int)$codigo){
                $producto->cantidad +=$cantidad;
            }
        }
    }

    //Agrego o actualizo su cantidad de un producto al carrito
    public function agregarProducto($producto){
        //Busco el producto si ya fue insertado
        $yaIncluido = $this->obtenerProducto($producto->codpro);
        if($yaIncluido){
            $this->actualizarCantidad($producto->codpro, 1);
        }else{
            $this->productos[]=$producto;
        }
    }
 //Calcular cantidad de productos en el carrito
    public function calcularCantidad(){
        $cantidad = 0;
        foreach($this->productos as $indice => $producto){
            $cantidad += $producto->cantidad;
        }
        return $cantidad;
    }
    //Calcular el valor venta de los productos
    public function calcularValorVenta(){
        $valor_venta=$this->calcularTotalPagar()/1.18;
        return number_format($valor_venta, 2, '.', '');
    }

    //Calcular el igv del valor venta
    public function calcularIgv(){
        $igv=$this->calcularValorVenta()*0.18;
        return number_format($igv, 2, '.', '');
    }

    //Calcular el total a pagar
    public function calcularTotalPagar(){	
		$monto = 0;
        foreach($this->productos as $indice => $producto){
            $monto += $producto->precioTotal();
        }
        return number_format($monto, 2, '.', '');
   }


   //Eliminar carrito
   public function eliminarProducto($codigo){
       $pro2 = array();
       foreach ($this->productos as $indice => $producto){
            if($producto->codpro!=$codigo){
               $pro2[]=$producto;
            }          
        }
//        $this->productos=array();
//        foreach($pro2 as $pro){
//           $this->productos[]=$pro;
//        }
       $this->productos=$pro2;
   }

   //Actualizar PrecioTotal
   public function actualizarCantidadIngresada($codigo,$cantidad){
        foreach ($this->productos as $indice => $producto){
            if($producto->codpro==$codigo){
                $producto->cantidad =$cantidad;
            }
        }
    }
   
}
?>
