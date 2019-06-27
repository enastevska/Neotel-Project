@extends('layouts.app')
@extends('layouts.layout')
@section('content')

    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

        <div class=”row” style="margin-left:36%">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                </div>
                <?php
                echo $link;
                echo shell_exec("$link  &");
                echo "Done.\n";
                ?>

            </div>
        </div>
    </div>
@endsection
