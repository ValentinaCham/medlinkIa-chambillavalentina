<?php

function noIterate($strArr)
{
    $N = $strArr[0];
    $K = $strArr[1];
    $lenN = strlen($N);
    $lenK = strlen($K);
    
    // Contar los caracteres en K
    $charCountK = array_count_values(str_split($K));
    
    $left = 0;
    $minLength = PHP_INT_MAX;
    $result = "";
    $count = 0;
    $charCountWindow = [];
    
    // Inicializar contador de caracteres en la ventana
    foreach ($charCountK as $char => $cnt) {
        $charCountWindow[$char] = 0;
    }
    
    for ($right = 0; $right < $lenN; $right++) {
        $currentChar = $N[$right];
        
        // Si el carácter está en K, incrementar su conteo en la ventana
        if (isset($charCountK[$currentChar])) {
            $charCountWindow[$currentChar]++;
            
            // Solo incrementar el contador total si no hemos excedido el conteo necesario
            if ($charCountWindow[$currentChar] <= $charCountK[$currentChar]) {
                $count++;
            }
        }
        
        // Intentar mover el puntero izquierdo mientras mantenemos todos los caracteres de K
        while ($count == $lenK) {
            $currentWindowLength = $right - $left + 1;
            
            // Actualizar el resultado si encontramos una ventana más pequeña
            if ($currentWindowLength < $minLength) {
                $minLength = $currentWindowLength;
                $result = substr($N, $left, $currentWindowLength);
            }
            
            $leftChar = $N[$left];
            
            // Si el carácter izquierdo está en K, reducir su conteo
            if (isset($charCountK[$leftChar])) {
                $charCountWindow[$leftChar]--;
                
                // Si el conteo cae por debajo de lo necesario, disminuir el contador total
                if ($charCountWindow[$leftChar] < $charCountK[$leftChar]) {
                    $count--;
                }
            }
            
            $left++;
        }
    }
    
    return $result;
}

// keep this function call here
echo noIterate(["ahffaksfajeeubsne", "jefaa"]);