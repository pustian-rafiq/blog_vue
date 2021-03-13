<?php


function slugify($text){
    //replace non letters or digits by -
    $text = preg_replace('~[^\pL\d]+~u','-',$text);
    //Transliterate
    $text = iconv('utf-8','us-ascii//TRANSLIT',$text);
    //replace unwanted characters

    $text = preg_replace('~[^-\w]+~','',$text);
    //trim
    $text = trim($text,'-');

    $text = preg_replace('~-+~','-',$text);
    $text = strtolower($text);
    if(empty($text)){
        return 'n-a';
    }
    return $text;
}
