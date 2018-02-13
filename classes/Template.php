<?php
class Template {

    public static function View($template, $array_data, $top = 1) {

        if($top == 1){
            require ('views/top.php');
            require ('views/'.$template.'.php');
            require ('views/bottom.php');

        } else {
            require ('views/'.$template.'.php');
        }

   }

}

?>