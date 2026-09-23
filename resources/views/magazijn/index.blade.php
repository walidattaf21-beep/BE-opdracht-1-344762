<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/jamin.css') }}">

    <div class="jamin-container">
        <h1>{{ $title }}</h1>

        <table class="jamin-table">
            <thead>
                <tr>
                    <th>Barcode</th>
                    <th>Naam</th>
                    <th>Verpakkingseenheid (kg)</th>
                    <th>Aantal aanwezig</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($producten as $product)
                    <tr>
                        <td>{{ $product->Barcode }}</td>
                        <td>{{ $product->Naam }}</td>
                        <td>{{ $product->VerpakkingsEenheidInKilogram }}</td>
                        <td>{{ $product->AantalAanwezig ?? 0 }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="jamin-melding">Er staan geen producten in het magazijn</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
