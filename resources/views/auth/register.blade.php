{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('content')
    <style>
        .register-container {
            background: #ddd;
            max-width: 600px;
            margin: 40px auto;
            padding: 40px 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .register-title {
            text-align: center;
            font-size: 2.2rem;
            margin-bottom: 32px;
            font-weight: 500;
        }

        .register-form label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
        }

        .register-form input {
            width: 100%;
            background: #6c63ff;
            color: #fff;
            border: none;
            border-radius: 2px;
            margin-bottom: 18px;
            height: 38px;
            font-size: 1.1rem;
            padding: 0 10px;
        }

        .register-form input::placeholder {
            color: #e0e0e0;
        }

        .register-btn {
            width: 100%;
            background: #ff5c5c;
            color: #fff;
            font-size: 1.6rem;
            border: none;
            border-radius: 2px;
            padding: 10px 0;
            margin-top: 10px;
            transition: background 0.2s;
        }

        .register-btn:hover {
            background: #ff3b3b;
        }

        .register-link {
            text-align: center;
            margin-top: 12px;
            font-size: 1rem;
        }

        .register-link a {
            color: #2ecc71;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="register-container">
        <div class="register-title">Register</div>

        <form class="register-form" method="POST" action="register">
            @csrf
            <label for="name">Nama</label>
            <input id="name" type="text" name="name" required>

            <label for="email">Email</label>
            <input id="email" type="email" name="email" required>

            <label for="nis">NIS</label>
            <input id="nis" type="text" name="nis" required>

            <label for="address">Alamat</label>
            <input id="address" type="text" name="address" required>

            <label for="phone">No. HP</label>
            <input id="phone" type="text" name="phone" required>

            <label for="class">Kelas</label>
            <input id="class" type="text" name="class" required>

            <label for="major_id">Jurusan</label>
            <input id="major_id" type="text" name="major_id" required>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>

            <button type="submit" class="register-btn">Daftar</button>
        </form>

        <div class="register-link">
            Sudah punya akun? <a href="/login">Login di sini</a>
        </div>
    </div>
@endsection
