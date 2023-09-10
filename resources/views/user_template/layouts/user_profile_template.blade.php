@extends('user_template.layouts.template')
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
    <div class="box-main bg-white">
        <ul class="p-2 bg-light list-unstyled">
            <li class="mb-2"><a href="{{ route('Home') }}"> <span class="align-middle font-weight-bold">Dashboard</span></a></li>
            <li class="mb-2"><a  href="{{ route('pendingordersuser') }}"><span class="align-middle font-weight-bold">Pending Orders</span></a></li>
            <li class="mb-2"><a  href="{{ route('history') }}"><span class="align-middle font-weight-bold">My Profile</span></a></li>
            <li class="mb-2">  <a  href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle font-weight-bold">Log Out</span>
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
