<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/jamin.css') }}">

    <div class="jamin-container">
        <h1>{{ $title }}</h1>

        <div class="jamin-info">
            <div><span>Naam Product:</span> {{ $product->Naam }}</div>
            <div><span>Barcode:</span> {{ $product->Barcode }}</div>
        </div>

        <table class="jamin-table">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Omschrijving</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allergenen as $allergeen)
                    <tr>
                        <td>{{ $allergeen->Naam }}</td>
                        <td>{{ $allergeen->Omschrijving }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('magazijn.index') }}" class="jamin-link jamin-terug">Terug naar Overzicht Magazijn Jamin</a>
    </div>
</x-app-layout>
