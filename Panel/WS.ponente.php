<?php
    header('Content-Type: application/json; charset=utf-8');
    require_once('mdlPonente.class.php');
    require_once('mdlTipo.class.php');
    $id_ponente = NULL;
    $accion = NULL;
    $id_ponente = isset($_GET['id_ponente']) ? $_GET['id_ponente'] : NULL;
    $accion = $_SERVER['REQUEST_METHOD'];
    $data = array();
    switch($accion){
        case 'POST':
            $data_input = file_get_contents('php://input');
            $data_input = json_decode($data_input,true);
            $i=0;
            $cont = 0;
            if (is_numeric($id_ponente)) {
                    foreach($data_input['ponentes'] as $key => $datos){
                        $resultado = $ponente->update($datos,$id_ponente);
                        if ($resultado) {
                            $data[$i]['mensaje']='Ponente Actualizado';
                            $data[$i]['datos']= $datos;
                            $cont++;
                        } else {
                            $data[$i]['mensaje']='Error, no se actualizo el ponente';
                        }
                        $i++;
                    }
                $data['mensaje'] = 'Actualizar';
            }else{
                    foreach($data_input['ponentes'] as $key => $datos){
                    $resultado = $ponente->create($datos);
                    if ($resultado) {
                        $data[$i]['mensaje']='Ponente insertado';
                        $data[$i]['datos']= $datos;
                        $cont++;
                    } else {
                        $data[$i]['mensaje']='Error, no se inserto el ponente';
                    }
                    $i++;
                }
                $data['mensaje'] = 'el metodo insercion se mando a llamar';
            }
        break;
        case 'DELETE':
            if(is_numeric($id_ponente)){
                $n = $ponente->delete($id_ponente);
                if($n > 0){
                    $data['mensaje'] = 'Se elimino el ponente'.$id_ponente;
                }else{
                    $data['mensaje'] = 'El ponente no exixste';
                }
            }
        break;
        case 'GET':
            default:
            if(is_numeric($id_ponente)){
                $data=$ponente->readOne($id_ponente);
            }else{
                $data=$ponente->read();
            }
    }
    $data = json_encode($data);
    echo ($data);
?>