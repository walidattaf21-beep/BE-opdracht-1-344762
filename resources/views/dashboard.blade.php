<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/jamin.css') }}">

    <div class="jamin-container">
        <h1>Dashboard</h1>

        @if (session('melding'))
            <p class="jamin-melding">{{ session('melding') }}</p>
        @endif

        <div class="jamin-info">
            <div><span>Ingelogd als:</span> {{ Auth::user()->name }}</div>
            <div><span>Rol:</span> {{ ucfirst(Auth::user()->rol) }}</div>
        </div>

        <table class="jamin-table">
            <thead>
                <tr>
                    <th>Wat kun je doen?</th>
                </tr>
            </thead>
            <tbody>
                @if (Auth::user()->magMagazijnZien())
                    <tr>
                        <td>
                            <a href="{{ route('magazijn.index') }}" class="jamin-link">Overzicht Magazijn Jamin</a>
                            - producten, leveringsinformatie en allergenen bekijken
                        </td>
                    </tr>
                @endif

                @if (Auth::user()->heeftRol('admin'))
                    <tr>
                        <td>
                            <a href="{{ route('gebruikers.index') }}" class="jamin-link">Overzicht Gebruikers</a>
                            - alle accounts en hun rol bekijken
                        </td>
                    </tr>
                @endif

                <tr>
                    <td>
                        <a href="{{ route('profile.edit') }}" class="jamin-link">Profiel</a>
                        - je naam, e-mail en wachtwoord aanpassen
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>
