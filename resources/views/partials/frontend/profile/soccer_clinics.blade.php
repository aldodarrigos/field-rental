<div class="table-responsive">
    <table class="min-w-full">
        <thead>
            <tr>
    
                <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Event Name</th>
    
                <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Player Name</th>
    
                <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Player Age</th>
    
                <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Player gender</th>
    
                <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">T-Shirt</th>
    
                <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Obs</th>
    
                <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
    
                <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date</th>
                
            </tr>
        </thead>
    
        <tbody class="bg-white">
            @foreach ($soccer_clinic as $item)
    
            @php
                $status = 'Unavailable';
                $status_bg = 'grayhard';

                if($item->event_status == 2){
                    $status = 'Pay Now Here';
                    $status_bg = 'danger';
                    if($item->registration_status == 1) {
                        $status = 'Paid';
                        $status_bg = 'info';
                    }
                }
            @endphp
                
            <tr>
    
                <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                    <div class="text-sm leading-5 text-gray-900"><a class="text-trueblue" href="/soccer-clinic/{{$item->event_slug}}">{{$item->event_name}}</a></div>
                    <div class="text-sm leading-5 text-gray-500"></div>
                </td>
    
                <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                    <div class="text-sm leading-5 text-gray-900">{{$item->player_name}}</div>
                    <div class="text-sm leading-5 text-gray-500"></div>
                </td>
    
                <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                    <div class="text-sm leading-5 text-gray-900">{{$item->player_age}}</div>
                    <div class="text-sm leading-5 text-gray-500"></div>
                </td>
    
                <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                    <div class="text-sm leading-5 text-gray-900">{{$item->player_gender}}</div>
                    <div class="text-sm leading-5 text-gray-500"></div>
                </td>
    
                <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                    <div class="text-sm leading-5 text-gray-900">{{$item->player_tshirt}}</div>
                    <div class="text-sm leading-5 text-gray-500"></div>
                </td>
    
                <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                    <div class="text-sm leading-5 text-gray-900">{{$item->player_obs}}</div>
                    <div class="text-sm leading-5 text-gray-500"></div>
                </td>
    
                
                <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                    @if ($item->registration_status == 1)
                        <span class="px-2 inline-flex text-xs uppercase leading-5 font-semibold rounded-md bg-{{$status_bg}} text-white py-1">{{$status}}</span>
                    @else
                        <a href="/soccer-clinic-confirmation/{{$item->registration_id}}" class="px-2 inline-flex text-xs uppercase leading-5 font-semibold rounded-md bg-{{$status_bg}} text-white py-1">{{$status}}</a>
                    @endif
                    
                </td>
    
                <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                    <div class="text-sm leading-5 text-gray-900">{{date('M d, Y', strtotime($item->registration_date))}}</div>
                    <div class="text-sm leading-5 text-gray-500"></div>
                </td>
    
    
            </tr>
    
            @endforeach
    
        </tbody>
    </table>
</div>
