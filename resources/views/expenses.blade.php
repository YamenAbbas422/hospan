@extends('layouts.app')
@push('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body {
        background-color: #eee;
    }

    #rental_id,
    #name,
    #total {
        background-color: #fff;
        height: 45px;
        border: 1px solid #000;
        border-radius: 10px;
        margin: 3px 10px;
        text-align: center;
        font-size: 16px;
        color: #000;
        font-weight: bold;
    }

    #rental_id,
    #rental_id0 {
        width: 50px;
    }

    #name,
    #name0 {
        width: 600px;
    }

    #total,
    #total0 {
        width: 100px;
    }

    #rental_id0,
    #name0,
    #total0 {
        background-color: #eee;
        height: 45px;
        border: 0px solid #eee;
        border-radius: 10px;
        margin: 3px 10px;
        text-align: center;
        font-size: 16px;
        color: #000;
        font-weight: bold;
    }

    .loginPopupComment {
        text-align: center;
        width: 20%;
        border: 1px solid #777;
        border-radius: 10px;
        padding: 30px;
        position: fixed;
        z-index: 1000;
        top: 47%;
        background-color: white;
        transform: translate(75%, -50%);
        left: 50%;
        display: none;
    }

    .loginPopupComment .btn {
        background-color: #fff;
        color: #000;
        border: 1px solid #000;
        height: 45px;
        border-radius: 10px;
        float: left;
        margin: 10px;
    }
</style>
@endpush

@section('content')
<div class="container-fluid px-4">
    <div class=" mt-4 mb-4" style="align-items: center;direction:rtl">
        <div class="col-md-12">
            <strong>عدد الوحدات في المجمع </strong>
            <input type="text" id="total" placeholder="" value="17" id="" disabled>
            <strong>السعر للوحدة </strong>
            <input type="text" id="total" placeholder="" value="150" id="" disabled>
        </div>
    </div>
    <div class="" style="align-items: center;direction:rtl;">
        <div class="col-md-12">
            <h4 class="" class="" style="text-align:center;margin-right:200px;">إضافةمصروف <i class="fa fa-plus" style="font-size:32px;margin-right: 15px;" onclick="showModel()"></i></h4>

        </div>
    </div>
    <select name="" id="" class="form-control" style="width: 100px;text-align:center;margin-left:50px">
        <option value="null">حدد شهر</option>
        @foreach($months as $month)
        <option value="{{$month->id}}">{{$month->name}}</option>
        @endforeach
    </select>
    <div class="row mt-2" style="align-items: center;float:right">
        <div class="col-md-12">
            <!-- <input type="text" placeholder="" value="الإجمالي"  id="total0" disabled> -->
            <input type="text" placeholder="" value="البند المصروف" id="name0" disabled>
            <input type="text" placeholder="" id="rental_id0" style="visibility:hidden" disabled>
        </div>
    </div>
    <div id="list_invoices">
        @php
        $i=0;
        @endphp
        @foreach($invoices as $invoice)
        <div class="row" style="align-items: center;float:right">
            <div class="col-md-12">
                <!-- <input type="text" placeholder="" name="total" id="total" disabled> -->
                <a href=""><input type="text" class="invoice_name{{$invoice->id}}" placeholder="" name="name" id="name" value="{{$invoice->name}}" disabled></a>
                <input type="text" placeholder="" name="rental_id" id="rental_id" value="{{$i}}" disabled>
            </div>
        </div>
        @php
        $i++;
        @endphp
        @endforeach
    </div>
</div>
<div id="alertdata1"></div>
<div class="loginPopupComment" id="loginPopupComment">
    <div style="height: 230px;display:block; width:auto">
        <div id="alertdata"></div>
        <form action="" id="maindata">
            <div class="row mt-2 mb-1" style="align-items: center;">
                <div id="" class="col-md-12">
                    <input class="form-control ml-1 name" type="text" name="name" placeholder="اسم البند" style="text-align: center;">
                </div>
            </div>
            <div class="row mt-2" style="align-items: center;">
                <div class="col-md-6">
                    <input class="form-control unit_price" type="text" name="unit_price" placeholder="سعر الوحدة" style="text-align:  center;">
                </div>
                <div class="col-md-6">
                    <input class="form-control number" type="text" name="number" placeholder="العدد" style="text-align: center;">
                </div>

            </div>
            <div class="row mt-2 mb-1" style="align-items: center;">
                <div id="" class="col-md-12 ">
                    <input class="form-control ml-1 loan" type="text" name="loan" placeholder="الدين" style="text-align: center;">
                </div>
            </div>
            <div class="row mt-2 mb-1" style="align-items: center;">
                <div id="" class="col-md-12 ">
                    <select class="form-control ml-1 month" name="month" id="" style="text-align: center;">
                        <option value="null">حدد شهر</option>
                        @foreach($months as $month)
                        <option value="{{$month->id}}">{{$month->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" id="buttonsubmit" class="btn add_rental  mt-3">أضف</button>
            <button type="button" class="btn cancel btn-dange mt-3" onclick="closeModel()">الغاء</button>
        </form>
    </div>

</div>
@endsection

@push('scripts')
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous">
</script>
<script>
    $('.invoice_name' + id).click(function() {
        document.getElementById("loginPopupComment").style.display = "block";
        var url = "{{ route('get_invice', ['id' => '#id1']) }}";
        url = url.replace('#id1', id);
        $.ajax({
            url: url,
            type: "get",
            success: function(data) {
                $("#maindata")[0].reset();
                $.each(data.data, function(key, value) {
                    document.getElementById("loginPopupComment").getElementsByClassName('name').innerHTML = value.name;

                });
            },
            error: function(erorr) {
                console.log(erorr);
            }
        })
    });

    function showModel() {
        document.getElementById("loginPopupComment").style.display = "block";
    }

    function closeModel() {
        document.getElementById("loginPopupComment").style.display = "none";
    }
    $('#buttonsubmit').click(function(e) {
        e.preventDefault();
        var formData = new FormData($('#maindata')['0']);
        formData.append("_token", "{{ csrf_token() }}");
        $.ajax({
            enctype: 'multipart/form-data',
            method: 'post',
            dataType: "json",
            processData: false,
            contentType: false,
            data: formData,
            url: "{{ route('add_rental') }}",
            success: function(result) {
                $("#alertdata1").empty();
                $("#alertdata1").append("<div class= 'alert alert-success'>" + result.message +
                    "</div>");
                $('#atertdata1').css('display', 'block');
                $("#alertdata1").attr('hidden', false).delay(5000).fadeOut();
                $("#maindata")[0].reset();
                document.getElementById("loginPopupComment").style.display = "none";
                $('#list_invoices').append(
                    '<div class="row" style="align-items: center;float:right">' +
                    '<div class="col-md-12">' +
                    '<a href=""><input type="text" class="invoice_name' + result.data.id + '" placeholder="" name="name"' + 'id="name" value="' + result.data.name + '" disabled></a>' +
                    '<input type="text" placeholder="" name="rental_id" id="rental_id" value="{{$i}}"' + 'disabled>' +
                    '</div>' +
                    '</div>'
                );
            },
            error: function(error) {
                $("#alertdata").empty();
                $.each(error.responseJSON.errors, function(index, value) {
                    $("#alertdata").append(
                        "<div class= 'alert alert-danger'>" +
                        "   " + value + "</div>");
                });
                $('#atertdata').css('display', 'block');
                $("#alertdata").attr('hidden', false).delay(5000).fadeOut();
            }
        });
    });
</script>

@endpush