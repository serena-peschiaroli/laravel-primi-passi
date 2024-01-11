<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <header>
        <h1> {{ $header_title }} </h1>
        
    </header>
    

    <main>
        <h1> {{ $body_title }} </h1>

                {{-- mostra i task --}}
        @if (count($tasks) > 0)
            <ul>
                @foreach ($tasks as $task)
                    <li>{{ $task->name }} 
                        <!-- cancella -->
                        <form action="/task/{{ $task->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>cancella</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Non ci sono task.</p>
        @endif

        {{-- Aggiungi un task --}}
        <form action="/task" method="POST">
            @csrf
            <label for="task-name">Da fare:</label>
            <input type="text" name="name" id="task-name" value="{{ old('name') }}">
            <button type="submit">Aggiungi</button>

            {{-- mostra gli errori --}}
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>

    </main>
</body>
</html>