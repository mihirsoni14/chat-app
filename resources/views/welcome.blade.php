<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    @livewireStyles
</head>

<body>
    <div class="container mx-auto p-4">
        @livewire('post-crud')
    </div>
    @livewireScripts
</body>

</html>