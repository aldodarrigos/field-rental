<table class="min-w-full">
    <thead>
        <tr>
            <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">User</th>

            <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Service</th>

            <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Price</th>

            <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date</th>

            <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
            
        </tr>
    </thead>

    <tbody class="bg-white">
        @foreach ($services as $item)

        @php
            $status = 'Pending';
            $status_bg = 'graytext';
            if($item->registration_status == 1) {
                $status = 'Paid';
                $status_bg = 'info';
            }
        @endphp
            
        <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img src="{{ Avatar::create(Auth::user()->name)->setFontFamily('arial')->toBase64() }}" />
                    </div>

                    <div class="ml-4">
                        <div class="text-sm leading-5 font-medium text-gray-900">{{Auth::user()->name}}
                        </div>
                        <div class="text-sm leading-5 text-gray-500">User registered</div>
                    </div>
                </div>
            </td>

            <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                <div class="text-sm leading-5 text-gray-900">{{$item->service_name}}</div>
                <div class="text-sm leading-5 text-gray-500"></div>
            </td>

            <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                <div class="text-sm leading-5 text-gray-900">{{$item->service_price}}</div>
                <div class="text-sm leading-5 text-gray-500"></div>
            </td>

            <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                <div class="text-sm leading-5 text-gray-900">{{$item->registration_date}}</div>
                <div class="text-sm leading-5 text-gray-500"></div>
            </td>

            <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                @if ($item->registration_status == 1)
                    <span class="px-2 inline-flex text-xs uppercase leading-5 font-semibold rounded-md bg-{{$status_bg}} text-white py-1">{{$status}}</span>
                @else
                    <a href="/service/registration-confirmation/{{$item->registration_id}}" class="px-2 inline-flex text-xs uppercase leading-5 font-semibold rounded-md bg-{{$status_bg}} text-white py-1">{{$status}}</a>
                @endif
                
            </td>

        </tr>

        @endforeach

    </tbody>
</table>