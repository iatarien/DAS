<!DOCTYPE html>
<html lang="ar">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DAS</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    

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
      .dropdown-content {
        display: block;
        position: absolute;
        background-color: white;
        width: 300px;
        padding: 12px 16px;
        border: 1px solid #c7c7cc;
        z-index: 1;
        text-align : right;
      }

      /* Links inside the dropdown */
      .dropdown-content span {
        color: black;
        padding: 6px 16px;
        text-decoration: none;
        display: block;
      }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">