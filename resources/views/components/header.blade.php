<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>برنامج تسيير المخابر البيداغوجية</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.css" rel="stylesheet">
  
    <style>
      .loading-overlay {
        background:lightgray;
        color:#FBEEE7;
        position:fixed;
        left:0;
        top:0;
        width:100%;
        height:100%;
        z-index:99999
      }

      .loading-overlay img{
        width: 50%;
        display: block;
        margin: 100px auto 0;
      }
      #dataTable_length   {
        display : none !important; 
      }
      #dataTable_filter {
        display : none !important; 
      }
      th {
        vertical-align : middle !important;
      }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">