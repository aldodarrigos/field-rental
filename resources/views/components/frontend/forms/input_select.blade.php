<div class="mb-2">
    @if ($label_on_off == 'on')
        <label for="{{$id}}" class="block text-xs font-semibold text-gray-600 uppercase">{{$label}}</label>
    @endif

    @php
        $py = 3;
        $bgc = 'gray-200';
        $t_color = 'black';
        $round = 'md';

        if($height == 'slim'){
            $py = 1;
            $round = 'sm';
        }

        if($bg == 'dark'){
            $bgc = 'blue';
            $t_color = 'white';
        }
    @endphp
    
    <select id="{{$id}}" name="{{$id}}" class="block w-full py-{{$py}} px-2 mt-2 text-{{$t_color}} bg-{{$bgc}} focus:outline-none focus:bg-gray-300 focus:shadow-inner border border-bluetext rounded-{{$round}}" required data-required-message="Please fill out this field.">
    {{$slot}}
    </select>

    <script>
        
        $('#checknow').on('click', function() {
            $('#{{$id}}').on('invalid', function() {
                this.setCustomValidity($(this).data("required-message"));
            });
        });


    </script>
</div>