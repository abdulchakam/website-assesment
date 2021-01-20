<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <table style="border-collapse: collapse;">
        @foreach ($indikators as $indikator)
        <tbody>
            <tr height="25">
                <td width="20"><p class="text">{{ $indikator->domain->nama_domain }}</p></td>
                <td width="40"><p>{{ $indikator->domain->ket_domain }}</p></td>
                <td width="20"><p>{{ $indikator->aspek->nama_aspek }}</p></td>
                <td width="40"><p>{{ $indikator->aspek->ket_aspek }}</p></td>
                <td width="20" rowspan="2"> Pilihan Saudara</td>
            </tr>
            <tr height="50">
                <td valign="middle" width="15"><p>{{ $indikator->nama_indikator }}</p></td>
                <td valign="middle" width="40"><p>{{ $indikator->ket_indikator }}</p></td>
                <td valign="middle" width="15"><p> Pertanyaan</p></td>
                <td valign="middle" width="40"><p>{{ $indikator->pertanyaan }}</p></td>
            </tr>
            <tr height="35">
                <td height="auto">Level 0</td>
                <td colspan="3">
                    {{ $indikator->level0 }}
                </td>
                @foreach ($rekap as $item)
                    @if ($item->pilihan == "level0")
                        <td style="background: #28A745">
                            Level 0
                        </td>
                    @else
                        <td>
                            Level 0
                        </td>
                    @endif
                @endforeach
            </tr>
            <tr  height="35">
                <td>Level 1</td>
                <td colspan="3">
                    <p>
                        {{ $indikator->level1 }}
                    </p>
                </td>
                @foreach ($rekap as $item)
                    @if ($item->pilihan == "level1")
                        <td style="background: #28A745">
                            Level 1
                        </td>
                    @else
                        <td>
                            Level 1
                        </td>
                    @endif
                @endforeach
            </tr>
            <tr  height="45">
                <td>Level 2</td>
                <td colspan="3">
                    <p>
                        {{ $indikator->level2 }}
                    </p>
                </td>
                @foreach ($rekap as $item)
                    @if ($item->pilihan == "level2")
                        <td style="background:#28A745; color:white;">
                            Level 2
                        </td>
                    @else
                        <td>
                            Level 2
                        </td>
                    @endif
                @endforeach
            </tr>
            <tr  height="45">
                <td>Level 3</td>
                <td colspan="3">
                    <p>
                        {{ $indikator->level3 }}
                    </p>
                </td>
                @foreach ($rekap as $item)
                    @if ($item->pilihan == "level3")
                        <td style="background:#28A745; color:white;">
                            Level 3
                        </td>
                    @else
                        <td>
                            Level 3
                        </td>
                    @endif
                @endforeach
            </tr>
            <tr  height="45">
                <td>Level 4</td>
                <td colspan="3">
                    <p>
                        {{ $indikator->level4 }}
                    </p>
                </td>
                @foreach ($rekap as $item)
                    @if ($item->pilihan == "level4")
                        <td style="background:#28A745; color:white;">
                            Level 4
                        </td>
                    @else
                        <td>
                            Level 4
                        </td>
                    @endif
                @endforeach
            </tr>
            <tr  height="45">
                <td>Level 5</td>
                <td colspan="3">
                    <p>
                        {{ $indikator->level5 }}
                    </p>
                </td>
                @foreach ($rekap as $item)
                    @if ($item->pilihan == "level5")
                        <td style="background:#28A745; color:white;">
                            Level 5
                        </td>
                    @else
                        <td>
                            Level 5
                        </td>
                    @endif
                @endforeach
            </tr>
            <tr  height="65">
                <td>Penjelasan :</td>
                <td colspan="4">
                    @foreach ($rekap as $item)
                        <p>
                            {{  $item->penjelasan }}
                        </p>
                    @endforeach
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</body>
</html>

