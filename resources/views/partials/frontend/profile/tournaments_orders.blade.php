<div class="table-responsive">
    <table class="min-w-full">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">User</th>
    
                <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Team</th>
    
                <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Competition</th>
    
                <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Category</th>
    
                <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date</th>
    
                <th class="px-6 py-3 border-b border-bluetext bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
                
            </tr>
        </thead>
    
        <tbody class="bg-white">
            @foreach ($tournaments as $item)
    
            @php
                $status = 'Pay Now Here';
                $status_bg = 'danger';
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
                            <div class="text-sm leading-5 font-medium text-gray-900">{{$item->registrant}}
                            </div>
                            <div class="text-sm leading-5 text-gray-500">User registered</div>
                        </div>
                    </div>
                </td>
    
                <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                    <div class="text-sm leading-5 text-gray-900">{{$item->team_name}}</div>
                    <div class="text-sm leading-5 text-gray-500"></div>
                </td>
    
                <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                    <div class="text-sm leading-5 text-gray-900">{{$item->competition_name}}</div>
                    <div class="text-sm leading-5 text-gray-500"></div>
                </td>
    
                <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                    <div class="text-sm leading-5 text-gray-900">{{$item->category}}</div>
                    <div class="text-sm leading-5 text-gray-500"></div>
                </td>
    
                <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                    <div class="text-sm leading-5 text-gray-900">{{date('M d, Y', strtotime($item->registration_date))}}</div>
                    <div class="text-sm leading-5 text-gray-500"></div>
                </td>
    
                <td class="px-6 py-4 whitespace-no-wrap border-b border-bluetext">
                    @if ($item->registration_status == 1)
                        <span class="px-2 inline-flex text-xs uppercase leading-5 font-semibold rounded-md bg-{{$status_bg}} text-white py-1" data-id='{{$item->registration_id}}'>{{$status}}</span>
                    @else
                        <a href="/team-confirmation/{{$item->registration_id}}" class="px-2 inline-flex text-xs uppercase leading-5 font-semibold rounded-md bg-{{$status_bg}} text-white py-1">{{$status}}</a>
                    @endif
                    
                </td>
    
            </tr>
    
            @endforeach
    
        </tbody>
    </table>
</div>
