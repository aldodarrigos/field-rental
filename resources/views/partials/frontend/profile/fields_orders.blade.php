<div class="table-responsive">
    <table class="min-w-full">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">User</th>
    
                <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Reservation</th>
    
                <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
    
                <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date</th>
            </tr>
        </thead>
    
        <tbody class="bg-white">
            @foreach ($reservations as $item)
    
            @php
                //$date = new DateTime($item->res_date);
                //$now = new DateTime();
                $status = 'Finished';
                $status_bg = 'info';
                /*
                if($date < $now) {
                    $status = 'Finished';
                    $status_bg = 'graytext';
                }
                */
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
                    <div class="text-sm leading-5 text-gray-900">{{$item->field_name}}</div>
                    <div class="text-sm leading-5 text-gray-500"></div>
                </td>
    
                <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                    <span class="px-2 inline-flex text-xs uppercase leading-5 font-semibold rounded-md bg-danger text-white py-1">{{$status}}</span>
                </td>
    
                <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext text-sm leading-5 text-gray-500">
                    {{date('M d, Y', strtotime($item->res_date))}} {{$item->hour}}</td>
    
            </tr>
    
            @endforeach
    
        </tbody>
    </table>
</div>
