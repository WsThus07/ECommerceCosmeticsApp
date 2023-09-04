@extends('user_template.layouts.template')
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
    <div class="box-main bg-white">
        <ul class="p-2 bg-light list-unstyled">
            <li class="mb-2"><a href="{{ route('Home') }}">Dashboard</a></li>
            <li class="mb-2"><a href="{{ route('pendingordersuser') }}">Pending Orders</a></li>
            <li class="mb-2"><a href="{{ route('history') }}">My Profile</a></li>
            <li class="mb-2">  <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form></li>

        </ul>
    </div>
        </div>
        <div class="col-lg-8">
    <div class="box-main bg-light">
        @yield('profilecontent')
    </div>
        </div>
    </div>
        </div>
@endsection
