@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

    <link href="{{asset('inspinia/css/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/ui/1.14.0-beta.2/jquery-ui.min.js" integrity="sha256-E7PeZTkHU61hmvmEMwtUMgm9Aff574wswy5F1Y0oIRA=" crossorigin="anonymous"></script>
    <!-- Data picker -->
    
    {{-- Datepicker multiple --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    {{-- Datepicker multiple --}}

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- Select2 --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.9/jquery.inputmask.min.js" integrity="sha512-F5Ul1uuyFlGnIT1dk2c4kB4DBdi5wnBJjVhL7gQlGh46Xn0VhvD8kgxLtjdZ5YN83gybk/aASUAlpdoWUjRR3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Inputmask({"mask": "(999) 999-9999"}).mask("#phone");
            Inputmask({"mask": "%"}).mask("#amount");
        });
    
        $(document).ready(function(){

            // var mem = $('.input-group.date').datepicker({
            //     todayBtn: "linked",
            //     keyboardNavigation: false,
            //     forceParse: false,
            //     calendarWeeks: true,
            //     autoclose: true,
            //     format: 'yyyy-mm-dd'
            // });

            $('#amount').inputmask({
                alias: 'numeric',
                suffix: '%', 
                rightAlign: false, 
                min: 0,
                max: 100,
                digits: 0,
                unmaskAsNumber: true // Para enviar solo el número limpio
            });

            


            $('#type').on('change',function(e){
                let value = $(this).val();                
                if(value == 'percentage'){
                    $('#amount').inputmask({
                        alias: 'numeric',
                        suffix: '%', 
                        rightAlign: false, 
                        min: 0,
                        max: 100,
                        digits: 0,
                        unmaskAsNumber: true // Para enviar solo el número limpio
                    });
                }else{
                    $('#amount').inputmask({
                        alias: 'currency',
                        prefix: '$', 
                        rightAlign: false,
                        digits: 0,
                        groupSeparator: ',',
                        autoGroup: true,
                        unmaskAsNumber: true // Para enviar solo el número limpio
                    });
                }
            })



            $('.select2').select2();


            $(".reservation_dates").flatpickr(
                {
                    mode: "multiple",
                    dateFormat: "Y-m-d"
                }
            ).open();


            $('#type_date').click(function(e){
                if($(this).prop('checked')){
                    // is range
                    $(".reservation_dates").flatpickr(
                        {
                            mode: "range",
                            dateFormat: "Y-m-d",
                        }
                    )

                    $('#label_type_date').html('Change to multiple selection')
                }else{
                    $(".reservation_dates").flatpickr(
                        {
                            mode: "multiple",
                            dateFormat: "Y-m-d",
                        }
                    )
                    $('#label_type_date').html('Change to range selection')
                }
            })

            $('#buttonrental').prop('disabled', true);

            $(".noselect").click(function(){

                if($(this).hasClass('noselect')){

                        hour_button_switch($(this), '1')
                        sethour($(this))
                        xsa()

                }else{

                    hour_button_switch($(this), '0')
                    unsethour($(this))
                    xsa()

                }


            });

        });

        //Prevent multiple submit form
        $('#reservation_form').on('submit', function() {
            $('#buttonrental').attr('disabled','disabled');
        });

        $("#clean").click(function(){               
            location.reload();
        });

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

    <style>
        .cursor-pointer{
            cursor: pointer;
        }
        .line-through{
            text-decoration: line-through;
        }
    </style>

@endsection

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Coupons</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/coupons">Coupons</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>New Coupon</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>New Coupon</h5>
                    <div class="ibox-tools">
        
                    </div>
                </div>
                <div class="ibox-content">

                    <form action="{{$action}}" method="POST" class="flex">
                        @csrf
                        <div class="row">
                            {{-- //Coupon Parameters --}}
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="form-group col ">
                                        <label for='code'>Code</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name='code' value="" >
                                        </div>
                                    </div>

                                    <div class="form-group col ">
                                        <label for='use_limit'>Use Limit (optional)</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name='use_limit' value="" >
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="form-group col">
                                        <label for='type'>Coupon Type</label>
                                        <select class="form-control m-b" name="type" id='type'>
                                            <option value="percentage" selected>Percentage</option>
                                            <option value="fixed">Fixed</option>
                                        </select>
                                    </div>
                                    <div class="form-group col ">
                                        <label for='amount'>Amount Discount</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name='amount' id="amount" value="" >
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="form-group col ">
                                        <label for='start_date'>Start Date</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name='start_date' value="{{date('Y-m-d')}}" >
                                        </div>
                                    </div>
                                    <div class="form-group col ">
                                        <label for='end_date'>End Date</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name='end_date' value="{{date('Y-m-d')}}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col ">
                                        <label for='fields'>Fields</label>
                                        <select required class="select2 form-control m-b" name="fields[]" multiple="multiple">
                                            @foreach ($fields as $item)
                                                <option value='{{$item->id}}'>{{$item->number.'.'.$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col ">
                                        <label for='end_date'>Hours</label>
                                        <select required class="select2 form-control m-b" name="hours[]" multiple="multiple">
                                            @foreach ($hours as $item)
                                                <option value='{{$item}}'>{{$item}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- //Coupon Parameters --}}

                            {{-- Dates Reservation --}}
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="form-group col-lg-8">
                                        <label for='code'>Reservation Dates</label>
                                            <input class="form-check-input" style="margin-left: 20px" type="checkbox" name="type_date" id="type_date">
                                            <label class="form-check-label" style="margin-left: 40px" for="flexRadioDefault1" id="label_type_date">
                                                Change to range
                                            </label>
                                        <div class="input-group">
                                         <input required type="text" class="form-control reservation_dates" name='reservation_dates' value="" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Dates Reservation --}}
                        </div>
    
                        <div class="hr-line-dashed"></div>
                        
                        <button type="submit" class="btn btn-w-m btn-success">SUBMIT <i class="fas fa-check"></i></button>

                        <a href="/coupons" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>






@endsection


