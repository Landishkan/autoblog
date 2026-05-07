<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>АвтоБлог</title>
    <script src="https://cdn.tailwindcss.com"></script> </head>
<body class="bg-gray-100 p-8">
    <h1 class="text-3xl font-bold mb-8">Наши автомобили</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($cars as $car)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if($car->image)
                    <img src="{{ url('storage/' . $car->image) }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-4">
                    <h2 class="text-xl font-semibold">{{ $car->brand }} {{ $car->model }}</h2>
                    <p class="text-gray-600">{{ $car->year }} г.</p>
                    <p class="text-green-600 font-bold mt-2">${{ number_format($car->price) }}</p>
                    <p class="text-sm mt-2 text-gray-500">{{ $car->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>