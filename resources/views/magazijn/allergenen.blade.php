<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/jamin.css') }}">

    @if (empty($allergenen))
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

        <div class="jamin-info">
            <div><span>Naam:</span> {{ $product->Naam }}</div>
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
                @forelse ($allergenen as $allergeen)
                    <tr>
                        <td>{{ $allergeen->Naam }}</td>
                        <td>{{ $allergeen->Omschrijving }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="jamin-melding">
                            In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('magazijn.index') }}" class="jamin-link jamin-terug">Terug naar Overzicht Magazijn Jamin</a>
    </div>
</x-app-layout>
