<?php

    use Example\Names\B;

    spl_autoload_register(function ($class){
        include str_replace('\\', '/', $class) . '.php';
    });

    new B;

?>