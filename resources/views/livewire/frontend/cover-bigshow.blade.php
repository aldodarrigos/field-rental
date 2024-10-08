<script type="text/javascript" src="{{asset('slideshow/slider.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('slideshow/slider.min.css')}}" />

<script type="text/javascript">
    $( document ).ready(function() {

        $("#slider").slider({
        speed  : 1000,     // How long the slide animation transition lasts for in millisecond
        delay  : 6000,      // How long the slide will be displayed for in milliseconds
        });

    });
</script>

<div class="bg-blue mt-50">

    <div class="relative" style='height: calc(100vh - 90px);margin-top: 90px;'>
 
        <div class="slideshow overflow-hidden w-full relative h-full">
            
            <ul class="slider overflow-hidden" id='slider'>

                @foreach ($slides as $slide)
                    <x-frontend.pieces.slide>
                        <x-slot name='img'>{{$slide->img}}</x-slot>
                        <x-slot name='img_mob'>{{$slide->img_mob}}</x-slot>
                        <x-slot name='subtitle'>{{$slide->subtitle}}</x-slot>
                        <x-slot name='title'>{{$slide->title}}</x-slot>
                        <x-slot name='no_title'>{{$slide->no_title}}</x-slot>
                        <x-slot name='button_text'>{{$slide->link_text}}</x-slot>
                        <x-slot name='button_link'>{{$slide->link_url}}</x-slot>
                        <x-slot name='no_button'>{{$slide->no_button}}</x-slot>
                        <x-slot name='no_shadow'>{{$slide->shadow}}</x-slot>
                        <x-slot name='bottom'>{{$slide->bottom}}</x-slot>
                    </x-frontend.forms.slide> 
                @endforeach
        
            </ul>
        
        </div>

        <form action="/fieldsrental" id='auto-submit'>

            <div class="w-11/12 md:w-boxed flex flex-col md:flex-row gap1 md:gap-4 absolute z-20 bottom-0 left-0 right-0 ml-auto mr-auto mx-auto bg-deepblue text-white py-1 md:py-4 px-4 border-lines border-b-0 md:border-b-8 rounded-t-lg">
    
                
                <div class="w-3/3 md:w-1/3 flex gap-4 border-0 md:border-r border-lines items-center ">
                    <div class="text-bluetext text-3x5 font-bold leading-none pr-2 font-roboto">01</div>
                    <div class="pr-4 w-full">
                        <small class="text-red text-xs uppercase">Field Type</small>
                        <div>                    
                            <x-frontend.forms.input_select>
                                <x-slot name='label'>players_number</x-slot>
                                <x-slot name='id'>players_number</x-slot>
                                <x-slot name='height'>slim</x-slot>
                                <x-slot name='bg'>dark</x-slot>
                                <x-slot name='label_on_off'>off</x-slot>
        
                                <option value="0" selected>Players number --</option>
                                <option value="1">5 vs 5 players</option>
                                <option value="2">7 vs 7 players</option>
                            </x-frontend.forms.input_select>
                        </div>
                    </div>
                </div>
    
                <div class="w-3/3 md:w-1/3 flex gap-4 border-0 md:border-r border-lines items-center">
                    <div class="text-bluetext text-3x5 font-bold leading-none pr-2 font-roboto">02</div>
                    <div class="w-full pr-4">
                        <small class="text-red text-xs uppercase">Pick a field</small>
                        <x-frontend.forms.input_select>
                            <x-slot name='label'>field</x-slot>
                            <x-slot name='id'>field</x-slot>
                            <x-slot name='height'>slim</x-slot>
                            <x-slot name='bg'>dark</x-slot>
                            <x-slot name='label_on_off'>off</x-slot>
    
                            <option value="0" selected>All fields --</option>
    
                            @foreach ($all_fields as $item)
                            <option value="{{$item->id}}" data-type='{{$item->tag_id}}'>{{$item->number.'. '.$item->name}}</option>
                            @endforeach
                        </x-frontend.forms.input_select>
                        
                    </div>
                </div>

                <input type="hidden" id='field_type' name="field_type" value=''>
    
                <div class="w-3/3 md:w-1/3 flex gap-4 items-center">
                    <div class="text-bluetext text-3x5 font-bold leading-none pr-2 font-roboto">03</div>
                    <div class="w-full pr-4">
                        <small class="text-red text-xs uppercase">Book your field</small>
                        <x-frontend.forms.input_text>
                            <x-slot name='type'>date</x-slot>
                            <x-slot name='label'></x-slot>
                            <x-slot name='id'>date</x-slot>
                            <x-slot name='default'>{{date('Y-m-d')}}</x-slot>
                            <x-slot name='placeholder'>Pick a Date</x-slot>
                            <x-slot name='autocomplete'>on</x-slot>
                            <x-slot name='required'>on</x-slot>
                            <x-slot name='height'>slim</x-slot>
                            <x-slot name='bg'>dark</x-slot>
                            <x-slot name='label_on_off'>off</x-slot>
                            <x-slot name='disable'>off</x-slot>
                            
                        </x-frontend.forms.input_text>
                    </div>
                </div>
    
            </div>
    
        </form>
    </div>
</div>

<script>
    $("#date").change(function() {
        $("form#auto-submit").submit();
    });
    $("#alt_check").click(function() {
        $("form#auto-submit").submit();
    });

    $('#field').change(function() {
        let type = $(this).find(':selected').data('type');
        $('#field_type').val(type);
        console.log(type);
    })

    $('#players_number').change(function() {
        playersNumId = $(this).val();
        
        $.ajax({
        url: "/fields_x_players/"+playersNumId,
        type: "GET",
        success: function(data){

            $('#field').html(data)

        }
    });

    })

</script>
