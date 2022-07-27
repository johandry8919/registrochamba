<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  

class Export_excel{


    function to_excel($array, $filename) {
    
        header('Content-type: application/vnd.ms-excel');
       header('Content-Disposition: attachment; filename='.$filename.'.xls');
      header('Content-type: application/force-download');
        header('Content-Transfer-Encoding: binary');
        header("Pragma: no-cache");
        print "\xEF\xBB\xBF"; // UTF-8 BOM
        $h = array();
        foreach($array as $row){
            foreach($row as $key=>$val){
                if(!in_array($key, $h)){
                    $h[] = $key;   
                }
            }
        }
        echo '<table><tr>';
        foreach($h as $key) {
            $key = ucwords($key);
            echo '<th style="border:1px #888 solid;background-color:#F00;color:white;">'.$key.'</th>';
        }
        echo '</tr>';

        foreach($array as $row){
            echo '<tr>';
            foreach($row as $val)
                $this->writeRow($val);   
        }
        echo '</tr>';
        echo '</table>';

    }

    function writeRow($val) {
        echo '<td style="border:1px #888 solid;color:#555;">'.$val.'</td>';              
    }

    function escribirFila($val) {
        return '<td style="border:1px #888 solid;color:#555;">'.$val.'</td>';              
    }




    function crear_excel($array, $filename) {
    

        $tabla='';
        $h = array();
        foreach($array as $row){
            foreach($row as $key=>$val){
                if(!in_array($key, $h)){
                    $h[] = $key;   
                }
            }
        }
        $tabla.= '<table id="tabla-reporte">
     
        <thead>
        <tr>';
        foreach($h as $key) {
            $key = ucwords($key);
            $tabla.='<th style="border:1px #888 solid;background-color:#72177B;color:white;">'.$key.'</th>';
        }
        $tabla.= '</tr>
        </thead>
        ';

        foreach($array as $row){
            $tabla.=  ' <tr>';
            foreach($row as $val)
            $tabla.= $this->escribirFila($val);   
        }
        $tabla.= '</tr> </tbody>';
        $tabla.= '</table>';


   return $tabla;
    }
}
?>