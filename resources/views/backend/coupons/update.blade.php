@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

    <link href="{{asset('inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">

    <script src="{{asset('inspinia/js/plugins/iCheck/icheck.min.js')}}"></script>

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
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

            let typeCoupon = $('#type').val();
             if(typeCoupon == 'percentage'){
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

            

            $(".reservation_dates").flatpickr(
                {
                    dateFormat: "Y-m-d",
                    defaultDate: "{{$coupon->reservation_dates}}".split(','),
                    @if($coupon->range_dates_reservation !== null)
                    mode: "range",
                    defaultDate: "{{$coupon->range_dates_reservation}}",
                    @else
                    mode: "multiple",
                    defaultDate: "{{$coupon->reservation_dates}}".split(','),
                    @endif
                    
                }
            ).open();
        });
    </script>

@endsection

@php
    $response = session()->get('response');
@endphp

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Coupons</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/coupons">Coupons</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Coupon Detail</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    @if($response)
    <div class="row">
        <div class="col-lg-6 col-sm-12">
        <div class="alert alert-{{$response['alert']}}" role="alert">
            {{$response['message']}}
          </div>
        </div>
    </div>
    @endif
    {{-- Alert Response --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Coupon detail</h5>
                    <div class="ibox-tools"></div>
                </div>
                <div class="ibox-content">
                    <form method="POST" action="{{$action}}"  class="flex">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="form-group col ">
                                        <label for='code'>Code</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name='code' value="{{$coupon->code}}" >
                                        </div>
                                    </div>
                                    <div class="form-group col ">
                                        <label for='use_limit'>Use Limit (optional)</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name='use_limit' value="{{$coupon->use_limit}}" >
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="form-group col">
                                        <label for='type'>Coupon Type</label>
                                        <select class="form-control m-b" name="type" id='type'>
                                            @if ($coupon->type == 'percentage')
                                                <option value="percentage" selected>Percentage</option>
                                                <option value="fixed">Fixed</option>
                                            @else
                                                <option value="percentage">Percentage</option>
                                                <option value="fixed" selected>Fixed</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col ">
                                        <label for='amount'>Amount Discount</label>
                                        <div class="input-group">
                                            <input type="text" id="amount" class="form-control" name='amount' value="{{$coupon->amount}}"  >
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="form-group col ">
                                        <label for='start_date'>Start Date</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name='start_date' value="{{$coupon->start_date}}" >
                                        </div>
                                    </div>
                                    <div class="form-group col ">
                                        <label for='end_date'>End Date</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name='end_date' value="{{$coupon->end_date}}" >
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="form-group col ">
                                        <label for='fields'>Fields</label>
                                        <select required class="select2 form-control m-b" name="fields[]" multiple="multiple">
                                            @foreach ($fields as $field)
                                                <option value='{{ $field->id }}' 
                                                    @if($coupon->fields->contains('field_id', $field->id)) selected @endif>
                                                    {{ $field->number . '.' . $field->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col ">
                                        <label for='end_date'>Hours</label>
                                        <select required class="select2 form-control m-b" name="hours[]" multiple="multiple">
                                            @foreach ($hours as $hour)
                                                <option value='{{ $hour }}' 
                                                    @if($coupon->hours->contains( $hour)) selected @endif>
                                                    {{ $hour }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col ">
                                        <label for='fields'>Status</label>
                                        <select required class="form-control m-b" name="status">
                                            <option @if($coupon->status == "1")
                                                selected
                                                @endif value="1">Active</option>
                                            <option @if($coupon->status == "0")
                                                selected
                                                @endif value="0">Inactive</option>

                                            
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Dates Reservation --}}
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="form-group col-lg-8">
                                        <label for='code'>Reservation Dates</label>
                                            <input class="form-check-input" style="margin-left: 20px" type="checkbox" name="type_date" id="type_date"
                                            @if($coupon->range_dates_reservation !== null)
                                            checked
                                            @endif 
                                            >
                                            <label class="form-check-label" style="margin-left: 40px" for="flexRadioDefault1" id="label_type_date">
                                                Change to range
                                            </label>
                                        <div class="input-group">
                                         <input required type="text" class="form-control reservation_dates" name='reservation_dates' 
                                         @if($coupon->range_dates_reservation !== null)
                                         value="{{$coupon->range_dates_reservation}}"
                                         @else
                                         value="{{$coupon->reservation_dates}}"
                                         @endif >
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            {{-- Dates Reservation --}}
                        </div>
                       
    
                        <div class="hr-line-dashed"></div>
                        <input type="hidden" name="_method" value="PUT">
                        <button type="submit" class="btn btn-w-m btn-success">SUBMIT <i class="fas fa-check"></i></button>
                        <a href="/coupons" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="modal inmodal fade" id="delete" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"><i class="far fa-trash-alt"></i> Delete</h4>
            </div>
            <div class="modal-body">
                <p><strong>
                    Are you sure you want to delete this record?</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <a href="/delete-reservation/{{$coupon->id}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div> --}}




@endsection


