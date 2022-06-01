<table>
    <thead>
        <tr>
            <th>id</th>
            <th>Tỉnh/Thành phố</th>
            <th>Quận/Huyện</th>
            <th>Phường/Xã</th>
        </tr>
    </thead>
    <tbody>
            @php
                $index = 1;
            @endphp
            @foreach ($location as $provinces)
                {{-- <tr> --}}

                {{-- <td>{{ $provinces->name }}</td> --}}
                {{-- <td><span class="text-muted">{{ $index++ }}</span></td> --}}
                @foreach ($provinces->district as $district)
                    @if (count($district->ward) == 0)
                        <tr>
                            <td> {{ $index++ }}</td>
                            <td>{{ $provinces->name }}</td>
                            <td>{{ $district->name }}</td>
                        </tr>
                    @else
                        @foreach ($district->ward as $ward)
                            <tr>
                                <td> {{ $index++ }}</td>
                                <td>{{ $provinces->name }}</td>
                                <td>{{ $district->name }}</td>
                                <td>{{ $ward->name }}</td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
                {{-- <td>{{ $ward->district->provinces?$ward->district->provinces->name:' ' }}</td>
                    <td>{{ $ward->district?$ward->district->name:' ' }}</td>
                    <td>{{ $ward->name?$ward->name:'null' }}</td> --}}
                {{-- </tr> --}}
            @endforeach
    </tbody>
</table>
