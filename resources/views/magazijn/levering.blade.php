<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/jamin.css') }}">

    @if ($geenVoorraad)
        {{-- Na 4 seconden terug naar Overzicht Magazijn Jamin --}}
        <meta http-equiv="refresh" content="4;url={{ route('magazijn.index') }}">
        <script>
            setTimeout(function () {
                window.location.href = "{{ route('magazijn.index') }}";
            }, 4000);
        </script>
    @endif

    <div class="jamin-container">
        <h1>{{ $title }}</h1>

        @if ($leverancier)
            <div class="jamin-info">
                <div><span>Naam leverancier:</span> {{ $leverancier->Naam }}</div>
                <div><span>Contactpersoon leverancier:</span> {{ $leverancier->ContactPersoon }}</div>
                <div><span>Leveranciernummer:</span> {{ $leverancier->LeverancierNummer }}</div>
                <div><span>Mobiel:</span> {{ $leverancier->Mobiel }}</div>
            </div>
        @endif

        <table class="jamin-table">
            <thead>
                <tr>
                    <th>Naam product</th>
                    <th>Datum laatste levering</th>
                    <th>Aantal</th>
                    <th>Eerstvolgende levering</th>
                </tr>
            </thead>
            <tbody>
                @if ($geenVoorraad)
                    <tr>
                        <td colspan="4" class="jamin-melding">
                            Er is van dit product op dit moment geen voorraad aanwezig, de verwachte eerstvolgende levering is:
                            {{ $volgendeLevering ? date('d-m-Y', strtotime($volgendeLevering)) : 'onbekend' }}
                        </td>
                    </tr>
                @else
                @foreach ($leveringen as $levering)
                    <tr>
                        <td>{{ $levering->Naam }}</td>
                        <td>{{ date('d-m-Y', strtotime($levering->DatumLevering)) }}</td>
                        <td>{{ $levering->Aantal }}</td>
                        <td>
                            {{ $levering->DatumEerstVolgendeLevering
                                ? date('d-m-Y', strtotime($levering->DatumEerstVolgendeLevering))
                                : 'Onbekend' }}
                        </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>

        <a href="{{ route('magazijn.index') }}" class="jamin-link jamin-terug">Terug naar Overzicht Magazijn Jamin</a>
    </div>
</x-app-layout>
