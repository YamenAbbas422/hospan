@extends('layouts.app')
@push('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4" style="direction:rtl">إضافة مستخدم</h1>
    <div id="alertdata"></div>
    <form action="" id="maindata">
        <div class="row mt-5">
            <div class="col-xl-3 col-md-6" style="direction: rtl;">
                <a href=""><i class="fa fa-check" id="buttonsubmit" style="font-size:48px;color:green"></i></a>
                <i class="fa fa-close" style="font-size:48px;color:red"></i>
            </div>
            <div class="col-xl-3 col-md-6">
                <input type="password" name="password" placeholder="كلمة السر" value="" style="border-radius: 15px;box-shadow: -5px 5px 5px 5px #d9d1d1;text-align:center;margin-top: 10px;">
            </div>
            <div class="col-xl-3 col-md-6">
                <input type="text" name="phone" placeholder="رقم الهاتف" value="+96655307533" style="border-radius: 15px;box-shadow: -5px 5px 5px 5px #d9d1d1;text-align:center;margin-top: 10px;" >
            </div>
            <div class="col-xl-3 col-md-6">
                <input type="text" name="name" placeholder="الاسم" style="border-radius: 15px;box-shadow: -5px 5px 5px 5px #d9d1d1;text-align:center;margin-top: 10px;">
            </div>
        </div>
    </form>
</div>

@endsection

@push('scripts')
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
        integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous">
    </script>
<script>
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
            url: "{{ route('add_user') }}",
            success: function(result) {
                $("#alertdata").empty();
                $("#alertdata").append("<div class= 'alert alert-success'>" + result.message +
                    "</div>");
                $('#atertdata').css('display', 'block');
                $("#alertdata").attr('hidden', false).delay(5000).fadeOut();
                $("#maindata")[0].reset();
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