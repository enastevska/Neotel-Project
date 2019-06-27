

@extends('layouts.app')

@section('content')

    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <STYLE>
            .close:focus,.close:hover {
                color:#000;
                text-decoration:none;
                cursor:pointer;
                filter:alpha(opacity=50);
                opacity:.5}

            .close{
                float:right;
                font-size:21px;
                font-weight:700;
                line-height:1;
                color:#000;
                text-shadow:0 1px 0 #fff;
                filter:alpha(opacity=20);
                opacity:.2}

            button.close{
                padding:0;
                cursor:pointer;
                background:0 0;
                border:0;
                -webkit-appearance:none;
                -moz-appearance:none;
                appearance:none}
            .close{margin-top:-2px}
            .close,.alert-dismissible .close{
                position:relative;
                top:-2px;
                right:-21px;
                color:inherit}

            .close{margin-top:-2px}
            .modal-dialog {

                width: 360px;

                height:600px !important;

            }

            .modal-content {

                /* 80% of window height */

                height: 60%;

                background-color:#BBD6EC;

            }
            .border { border-width: 25px; border-color: red; border-style: solid; }


        </STYLE>
    </head>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
    </div>
    </div>
    <div class="container">
        <!-- Trigger the modal with a button -->
        <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Small Modal</button>-->

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog" >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div style="margin:20px;" >
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4>Modal Header</h4>
                    </div>

                    <div class="modal-body" style="margin-top: -30px">
                        <hr>
                        <div style="margin-right: 50%;text-align: justify">
                            <p>What is Lorem Ipsum?
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

                                Why do we use it?
                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

                        </div>
                        <div style="float: right;margin-top: -50%;margin-right: 10%">
                            <img src="/img/popup.jpeg" class="border">

                    </div>
                    </div>
                    <div style="margin: 10px">
                        <hr>
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-left: 90%">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(window).on('load',function(){
            $('#myModal').modal('show');
        });

       /* $(function() {

            $('#button').click(function() {
                $('#myModal').modal('hide');
            });
        });*/


    </script>
@endsection


