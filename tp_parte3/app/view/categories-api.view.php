<?php

class TaskView {
    public function showTasks($tasks, $user) {
        $count = count($tasks);

        // NOTA: el template va a poder acceder a todas las variables y 
        // constantes que tienen alcance en esta funcion
        require_once './templates/lista_tareas.phtml';
    }

    public function showError($error, $user) {
        echo "<h1>$error</h1>";
    }
}
