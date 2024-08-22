<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')


    <title>Document</title>
</head>
<body class="mx-auto mt-10 max-w-2xl">
    
    <div class="bg-slate-600 w-full h-screen">
       
       {{-- @dd("aaaa") --}}


            {{$slot}}

        
    </div>

</body>
</html>