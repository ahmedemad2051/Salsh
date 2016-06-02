<?php

function autoloader($classname)
{
    $dirs=array('','models/','../models/');
    $formats=array('%s.php');
    
    foreach($dirs as $dir)
    {
        foreach($formats as $format)
        {
            $path=$dir.sprintf($format,$classname);
            if(file_exists($path))
            {
                include $path;
                return;
            }
           
        }
    }
}

spl_autoload_register('autoloader');

