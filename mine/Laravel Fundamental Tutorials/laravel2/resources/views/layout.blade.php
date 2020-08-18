<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- NAvigation Bar CSS-->
<style>
#nav {
list-style-type: none;
margin: 0;
padding: 0;
overflow: hidden;
background-color: #333;
}

.nav {
float: left;
border-right:1px solid #bbb;
}

.nav :last-child {
border-right: none;
}

.nav .nav-anchor {
display: block;
color: white;
text-align: center;
padding: 14px 16px;
text-decoration: none;
}

.nav .nav-anchor:hover:not(.active) {
background-color: #111;
}

.active {
background-color: #4CAF50;
}
</style>
<!-- NAvigation Bar CSS end -->


</head>
<body>
    <!--Navigation Bar-->
@include('practice.nav')

<!--Flash Message-->
@include('practice.flash')

<!--Content of Page-->

<div>
@yield('content')
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@yield('footer_script')
<script>
    $('div.alert').delay(3000).slideUp(300);
</script>
</body>
</html>
