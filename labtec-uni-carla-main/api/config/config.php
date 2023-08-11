<?php

// ? Ambiente en que te encuentras:
// Develop: Desarrollo
// Testing: Testeo, QA, etapa de pruebas
// Desploy: Producción (Ya funcionando al 100%) 

define("ENVIRONMENT", "develop");

if(ENVIRONMENT == "develop"){
    // ? Muestre errores
}

// BD
// - Host
// - Usuario
// - Contraseña
// - BD
// - Charset

$config = [
    "develop" => [
        "BD" => [
            "HOST__DB" => "localhost",
            "USER__DB" => "root",
            "PASSWORD__DB" => "",
            "NAME__DB" => "labtec",
            "CHARSET__DB" => "utf8"
        ]
    ],
    "testing" => [
        "BD" => [
            "HOST__DB" => "192.168.0.1",
            "USER__DB" => "root",
            "PASSWORD__DB" => "",
            "NAME__DB" => "labtec",
            "CHARSET__DB" => "utf8"
        ]
    ],
    "deploy" => [
        "BD" => [
            "HOST__DB" => "www.google.com",
            "USER__DB" => "root",
            "PASSWORD__DB" => "",
            "NAME__DB" => "labtec",
            "CHARSET__DB" => "utf8"
        ]
    ],
];


define("DATABASE_CONFIG", $config[ENVIRONMENT]["BD"]);
