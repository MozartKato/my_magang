{{-- filepath: /home/farel-riyan-fajar-riyadi/Project/my_magang/resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container text-center" style="margin-top: 60px;">
    <h1>Selamat Datang di My Magang</h1>
    <p>Silakan login atau daftar untuk melanjutkan.</p>
    <a href="/login" class="btn btn-primary m-2">Login</a>
    <a href="/register" class="btn btn-success m-2">Register</a>
</div>
@endsection
