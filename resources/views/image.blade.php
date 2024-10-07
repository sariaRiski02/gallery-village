<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Single Image</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto p-4">
        <div class="card shadow-xl">
            <figure>
                <img src="{{ $data['url'] }}" alt="Image" class="rounded-xl w-1/4 mx-auto">
            </figure>
            <div class="card-body">
                
                <h2 class="card-title">id: {{ $data['image']->id }}</h2>
                <p class="card-text">url: {{ $data['image']->url }}</p>
                <a href="{{ route('delete', $data['image']->id ) }}" class="btn btn-error">Hapus Gambar</a>
            </div>
        </div>
    </div>
</body>
</html>