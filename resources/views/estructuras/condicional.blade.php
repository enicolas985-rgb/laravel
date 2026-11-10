<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Extructura de control</title>
</head>
<body>
    <h1>Su nota es: {{$nota}}</h1>
    <p>Situacion:@if ($nota>5 || $nota <0 ) 
        Nota invalida
        @elseif($nota>=3)
        Curso aprobado
        @else Curso reprobado
        @endif
    </p>
    <p>Clasificacion de la nota: 
            @switch($nota)
                @case($nota<2 && $nota>=0)
                    Muy bajo
                    @break
                @case($nota<3 && $nota>=2)
                    Bajo
                    @break
                @case($nota<3.5 && $nota>=3)
                    Basico
                    @break
                @case($nota<4 && $nota>=3.5)
                    Bueno
                    @break
                @case($nota<4.6 && $nota>=4)
                    Alto
                    @break
                @case($nota<=5 && $nota>=4.6)
                    Superior
                    @break
                @default
                Nota invalida
            @endswitch 
    </p>
</body>
</html>