<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Demo blog</title>
	<link rel="stylesheet" href="{{ asset('site/assets/css/main.css') }}">
</head>
<body>
<div id="layout">
	<header id="header">
		@include('site::_partials.navigation')

		<h1><a href="{{ route('home') }}">Demo blog</a></h1>
	</header>

