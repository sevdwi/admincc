@extends('layouts.head-isi')

@section('content')
<div class="map-bg"></div>
  <div class="lines-bg"></div>
  <div class="dot dot-1"></div>
  <div class="dot dot-2"></div>
  <div class="dot dot-3"></div>
  <div class="dot dot-4"></div>


  <!-- Main Content -->
  <div class="main-content">
    <div class="menu-container">

      <!-- Menu Item: Layanan Individu ASN (Top Left) -->
      <a href="{{route('pariwisata.index')}}" class="menu-item item-top-left">
        <i class="bi bi-brightness-alt-high-fill"></i>
        <span class="text-uppercase">
            <h5> Pariwisata</h5>
        </span> 
      </a>

      <!-- Menu Item: Layanan Manajemen ASN Instansi (Top Right) -->
      <a href="#" class="menu-item item-top-right">
        <i class="bi bi-person-badge"></i>
        <span>Layanan lainnyaa</span>
      </a>

      <!-- Menu Item: Layanan Seleksi (Middle Left) -->
      <a href="#" class="menu-item item-middle-left">
        <i class="bi bi-building-fill-check"></i>
        <span class="text-uppercase">Layanan lainnyaa</span>
      </a>

      <!-- Center BKN Logo -->
      <div class="circle-center">
      <img src="{{ asset('images/server.png') }}" alt="CC Logo" class="bkn-icon">
        <div class="bkn-logo-text text-center">Command Center</div>
      </div>

      <!-- Menu Item: Layanan Pendukung (Middle Right) -->
      <a href="#" class="menu-item item-middle-right">
        <i class="bi bi-gear-wide-connected"></i>
        <span class="text-uppercase">Layanan lainnyaa</span>
      </a>

    </div>

    <!-- Majalah Digital Button -->
    <a href="https://cc.cilacapkab.go.id" class="btn-majalah">
      <i class="bi bi-book-half"></i>
      Dashboar utama Command Center
    </a>
  </div>

  <div class="privacy-link">Privacy · Terms</div>
@endsection
