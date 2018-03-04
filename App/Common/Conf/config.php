<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE'=>'mysql',
    'DB_HOST'=>'localhost',
    'DB_USER'=>'root',
    'DB_PWD'=>'123456',
    'DB_NAME'=>'hbs',
    'DB_PORT'=>'3306',
    'DB_PREFIX' => 'hbs_',
    'DB_CHARSET'=> 'utf8',
    'TMPL_PARSE_STRING' => array(
        '__IMAGE__' =>__ROOT__.'/APP/Home/View/image',
        '__JS__' => __ROOT__.'/APP/Home/View/js',
        '__CSS__' => __ROOT__.'/APP/Home/View/css',
        '__SILDER__' => __ROOT__.'/Uploads/silder',
    ),
);