<!DOCTYPE html>
<html lang="en" data-theme='light'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
    @vite('resources/css/app.css')
</head>
<body>

    
    

    <div class="flex gap-3 flex-col px-5">
        {{-- navbar --}}

        <div class="navbar flex items-center shadow-lg bg-base-100 rounded-2xl">
            <div class="flex-1">
              <a class="btn btn-ghost text-xl">Gallery Village</a>
            </div>
            <div class="flex-none">
              <ul class="menu menu-horizontal px-1">
                  <li class=" rounded-lg shadow-md">
                    <a href="{{ route('add-image') }}" class="font-bold">
                        Add picture
                    </a>
                </li>
                  
              </ul>
            </div>
          </div>

        {{-- endNavbar --}}

        {{-- mainText --}}
        <div class=" w-full flex justify-center pt-10 mb-16">
            <div class="border-b-4 border-black w-2/3 p-2 flex justify-center ">
                <h1 class="text-3xl">Gallery village</h1>
            </div>
        </div>
        {{-- endMainText --}}


        {{-- Image --}}
        <div class="flex gap-2 justify-center h-auto  w-full">
            <div class="flex flex-col w-1/3 gap-2" id="section1">
                @foreach ($result[0] as $item)
                
                    <a href="{{ route('single-image',$item['id']) }}" class='shadow-sm rounded-lg pointer'>
                        <img src="{{ $item['url'] }}" alt="">
                    </a>
                @endforeach
            </div>
            <div class="flex flex-col w-1/3 gap-2" id="section2">
                @foreach ($result[1] as $item)
            
                <a href="{{ route('single-image',$item['id']) }}" class='shadow-sm rounded-lg pointer'>
                    <img src="{{ $item['url'] }}" alt="">
                </a>
                @endforeach
            </div>
            <div class="flex flex-col w-1/3 gap-2" id="section3">
                @foreach ($result[2] as $item)
                <a href="{{ route('single-image',$item['id']) }}" class='shadow-sm rounded-lg pointer'>
                    <img src="{{ $item['url'] }}" alt="">
                </a>
                @endforeach
            </div> 
        </div>
        {{-- endImage --}}
        
    </div>

    {{-- footer --}}
    <footer class="footer bg-light  flex justify-center text-neutral-600-content items-center px-6 p-4">
        
        
        <p class=" flex">© Created by
            <a href="https://www.instagram.com/msaria_z/" class="text-bold font-bold">Rizky saria</a>
        </p>
    
    </footer>
    {{-- endFooter --}}


    
    

</body>
</html>