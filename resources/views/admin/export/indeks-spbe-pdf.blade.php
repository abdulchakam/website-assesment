<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table, td, th {
            border: 1px solid black;
            text-align: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h3 style="text-align: center">Indeks Domain SPBE</h3>
    <table>
        <tr style="background: #5F76E8; color: #fff">
            <th>Indeks SPBE</th>
            <th></th>
        </tr>
        <tr>
            <th>Domain</th>
            <th>Indeks</th>
        </tr>
        @foreach ($domains as $domain)
            <tr>
                <td>{{ $domain->ket_domain }}</td>
                <td>{{ round($indeks_domain->where('domain_id', $domain->id)->avg('nilai'), 2) }}</td>
            </tr>
        @endforeach
    </table>
    <br>

    @foreach ($domains as $domain)
    <br>
    <h3 style="text-align: center">Domain {{ $domain->ket_domain }}</h3>
    <table>
        <tr style="background: #5F76E8; color: #fff">
            <th>Indeks Domain {{ $domain->ket_domain }}</th>
            <th>{{ round($indeks_domain->where('domain_id', $domain->id)->avg('nilai'), 2) }}</th>
        </tr>
        <tr>
            <th>Aspek</th>
            <th>Indeks</th>
        </tr>
        @foreach ($indeks_domain->where('domain_id', $domain->id)->unique('aspek_id') as $indeks)
            <tr>
                <td>{{ $indeks->aspek->ket_aspek }}</td>
                <td>
                    {{
                        round(App\Rekap::where('aspek_id', $indeks->aspek_id)->avg('nilai'), 2)
                    }}
                </td>
            </tr>
        @endforeach
    </table>

    <br>
    <table>
        <tr style="background: #5F76E8; color: #fff">
            <th>Indeks Domain {{ $domain->ket_domain }}</th>
            <th>{{ round($indeks_domain->where('domain_id', $domain->id)->avg('nilai'), 2) }}</th>
        </tr>
        <tr>
            <th>Indikator</th>
            <th>Indeks</th>
        </tr>
        @foreach ($indeks_domain->where('domain_id', $domain->id) as $indeks)
            <tr>
                <td>{{ Str::after($indeks->indikator->ket_indikator, 'Kebijakan Internal') }}</td>
                <td>{{ $indeks->nilai }}</td>
            </tr>
        @endforeach
    </table>
    @endforeach
</body>
</html>

