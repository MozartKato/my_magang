{{-- filepath: /home/farel-riyan-fajar-riyadi/Project/my_magang/resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    .login-container {
        background: #ddd;
        max-width: 600px;
        margin: 40px auto;
        padding: 40px 30px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .login-title {
        text-align: center;
        font-size: 2.2rem;
        margin-bottom: 32px;
        font-weight: 500;
    }
    .login-form label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
    }
    .login-form input {
        background: #6c63ff;
        color: #fff;
        border: none;
        border-radius: 2px;
        margin-bottom: 18px;
        height: 38px;
        font-size: 1.1rem;
        padding-left: 10px;
        width: 100%;
    }
    .login-form input::placeholder {
        color: #e0e0e0;
    }
    .login-btn {
        width: 100%;
        background: #ff5c5c;
        color: #fff;
        font-size: 2rem;
        border: none;
        border-radius: 2px;
        padding: 6px 0;
        margin-top: 10px;
        margin-bottom: 0;
        transition: background 0.2s;
    }
    .login-btn:hover {
        background: #ff3b3b;
    }
    .login-link {
        text-align: center;
        margin-top: 4px;
        font-size: 1rem;
    }
    .login-link a {
        color: #2ecc71;
        text-decoration: none;
    }
    .login-link a:hover {
        text-decoration: underline;
    }
</style>
<div class="login-container">
    <div class="login-title">Login</div>
    <form class="login-form" method="POST" action="/login">
        @csrf
        <label for="name">Nama</label>
        <input id="name" type="text" name="name" required>

        <label for="nis">NIS</label>
        <input id="nis" type="text" name="nis" required>

        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>

        <button type="submit" class="login-btn">Masuk</button>
    </form>
    <div class="login-link">
        Belum punya akun? <a href="/register">Daftar.</a>
    </div>
</div>
@endsection
