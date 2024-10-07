<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Add Image</title>
</head>
<body>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <form action="{{ route('add-image') }}" method="POST" enctype="multipart/form-data" class="card w-96 bg-white shadow-xl">
            @csrf
            <div class="card-body">
                <h2 class="card-title">Upload Image</h2>
                <label class="block">
                    <input type="file" name="image" accept="image/*" class="block w-full mt-1 text-sm text-gray-900 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100" />
                </label>
                <div class="mt-4">
                    <button type="submit" class="w-full px-4 py-2 font-semibold text-white btn btn-secondary rounded-md hover:bg-violet-700">
                        Upload
                    </button>
                </div>
                <a href="{{ route('home') }}" class="mt-4 underline">
                    <span class="text-gray-500"><span class="font-extrabold text-lg"><-</span> Kembali Ke beranda </span>
                </a>
            </div>
        </form>
    </div>
</body>
</html>