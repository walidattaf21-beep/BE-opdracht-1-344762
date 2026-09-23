<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/jamin.css') }}">

    <div class="jamin-container">
        <h1>{{ $title }}</h1>

        <table class="jamin-table">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>E-mail</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gebruikers as $gebruiker)
                    <tr>
                        <td>{{ $gebruiker->name }}</td>
                        <td>{{ $gebruiker->email }}</td>
                        <td>{{ ucfirst($gebruiker->rol) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
