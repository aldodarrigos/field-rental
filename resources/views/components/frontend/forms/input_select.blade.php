<div class="mb-2">
    @if ($label_on_off == 'on')
        <label for="{{$id}}" class="block text-xs font-semibold text-gray-600 uppercase">{{$label}}</label>
    @endif
    
    <select id="{{$id}}" name="{{$id}}" class="block w-full py-1 px-2 mt-2 text-graytext bg-blue focus:outline-none focus:bg-gray-300 focus:shadow-inner border border-bluetext rounded-sm">
    {{$slot}}
    </select>
</div>