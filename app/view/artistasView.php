<?php

class artistasView{


    public function response($data, $status = 200) {
/* Establecer el encabezado de la respuesta para que sea json. */
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        
        // convierte los datos a un formato json
        echo json_encode($data);
    }

    /**
     * Toma un código de estado como argumento y devuelve el mensaje de estado correspondiente.
     * 
     * @param code El código de estado HTTP
     * 
     * @return El código de estado de la solicitud.
     */
    private function _requestStatus($code){
        $status = array(
          200 => "OK",
          201 => "Created",
          400 => "Bad request",
          404 => "Not found",
          500 => "Internal Server Error"
        );
        return (isset($status[$code])) ? $status[$code] : $status[500];
      }

    
   
    
}