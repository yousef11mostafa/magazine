<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Responsive Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="{{ url("assets/admin/css/bootstrap.css")}}" rel="stylesheet" />
     <!-- FONTAW"ESOME /adminSTYLES-->
    <link href="{{ url("assets/admin/css/font-awesome.css")}}" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="{{ url("assets/admin/css/custom.css")}}" rel="stylesheet"  />
     <!-- GOOGLE FONTS-->
        <!-- summernote-->
    <link href="{{ url("assets/admin/css/summernote-lite.css")}}" rel="stylesheet"  />
     <!-- summernote -->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>



    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url("/") }}">
                        <img src="{{ url("assets/admin/img/logo.png")}}" />
                    </a>

                    <span class="logout-spn" style="font-size:20px; color:white; text-align:center;">
                        hi:{{ Auth::user()->name }}
                    </span>

                </div>


                <span class="logout-spn" >
                    <a href="{{ url("/") }} "style="">website</a>
                  <a href="{{ url("logout") }}" style="color:#fff;">LOGOUT</a>
                </span>

            </div>
        </div>
