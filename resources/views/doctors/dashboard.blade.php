@extends('doctors.master')
@section('admintitle')
   Doctore Dashboard
@endsection

@section('dashboardContent')
     @include('doctors.layout.slidebar')
         @include('doctors.layout.navbar')
     {{-- @include('doctors.layout.rightbar') --}}
     <div class="br-mainpanel">
       <div class="br-pagetitle">
         <i class="icon ion-ios-home-outline"></i>
         <div>
           <h4>Doctor-Dashboard</h4>
           <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
         </div>
       </div>

       <div class="br-pagebody">

       </div><!-- br-pagebody -->
       @include('doctors.layout.footer')

@endsection
