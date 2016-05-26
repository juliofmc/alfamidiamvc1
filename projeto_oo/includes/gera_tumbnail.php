<?php 
/* 
$origem   caminho até foto de origem 
$destino  destino, caminho até o diretório que deseja armazenar o thumbnail 
$largura  largura que você deseja que o thumbnail tenha. O valor da altura 
          será proporcional ao tamnho do original, utilizando $largura como 
          referência. 
$pre      prefixo que será adicionado ao nome do thumbnail. 
$formato  formato do arquivo: opções JPEG e PNG 

Requisitos: 
PHP 4+ e GD Lib (de acordo com a versão do GD instalado a função utilizará o thumbnail com a melhor qualidade possível) 
*/ 
function criar_thumbnail($origem,$destino='./',$largura='300',$pre='t_',$formato='JPEG') { 

    switch($formato) 
    { 
        case 'JPEG': 
            $tn_formato = 'jpg'; 
            break; 
        case 'PNG': 
            $tn_formato = 'png'; 
            break; 
    } 
    $ext = split("[/\\.]",strtolower($origem)); 
    $n = count($ext)-1; 
    $ext = $ext[$n]; 

    $arr = split("[/\\]",$origem); 
    $n = count($arr)-1; 
    $arra = explode('.',$arr[$n]); 
    $n2 = count($arra)-1; 
    $tn_name = str_replace('.'.$arra[$n2],'',$arr[$n]); 
    $destino = $destino.$pre.$tn_name.'.'.$tn_formato; 

    if ($ext == 'jpg' || $ext == 'jpeg'){ 
        $im = imagecreatefromjpeg($origem); 
    }elseif($ext == 'png'){ 
        $im = imagecreatefrompng($origem); 
    }elseif($ext == 'gif'){ 
        return false; 
    } 
    $w = imagesx($im); 
    $h = imagesy($im); 
    if ($w > $h) 
    { 
        $nw = $largura; 
        $nh = ($h * $largura)/$w; 
    }else{ 
        $nh = $largura; 
        $nw = ($w * $largura)/$h; 
    } 
    if(function_exists('imagecopyresampled')) 
    { 
        if(function_exists('imageCreateTrueColor')) 
        { 
            $ni = imageCreateTrueColor($nw,$nh); 
        }else{ 
            $ni    = imagecreate($nw,$nh); 
        } 
        if(!@imagecopyresampled($ni,$im,0,0,0,0,$nw,$nh,$w,$h)) 
        { 
            imagecopyresized($ni,$im,0,0,0,0,$nw,$nh,$w,$h); 
        } 
    }else{ 
        $ni    = imagecreate($nw,$nh); 
        imagecopyresized($ni,$im,0,0,0,0,$nw,$nh,$w,$h); 
    } 
    if($tn_formato=='jpg'){ 
        imagejpeg($ni,$destino,60); 
    }elseif($tn_formato=='png'){ 
        imagepng($ni,$destino); 
    } 
} 

// exemplo 
//criar_thumbnail('foto.jpg'); 
?>
