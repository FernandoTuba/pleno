@extends('layout.app')
@section('title', 'Home - ')
@section('content')
    <section id="hero" class="d-flex align-items-center" style="background-image: url('{{ asset('projeto/public/img/hero-bg.jpg') }}')">
        <div class="container position-relative">

            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9 text-center">
                    <h1>Banco IST</h1>
                    <h2>Prova desenvolvedor full stack pleno</h2>
                </div>
            </div>

            <div class="row icon-boxes">
                <div  class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 home-card" onclick="location.href = '{{ route('pessoas') }}'">
                    <div class="icon-box">
                        <div class="icon"><i class="ri-group-line"></i></div>
                        <h4 class="title">Pessoas</h4>
                        <p class="description">Gerenciamento de pessoas</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 home-card" onclick="location.href = '{{ route('contas') }}'">
                    <div class="icon-box">
                    <div class="icon"><i class="ri-article-line"></i></div>
                    <h4 class="title">Contas</h4>
                    <p class="description">Gerenciamento de contas bancárias</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 home-card" onclick="location.href = '{{ route('movimentacoes') }}'">
                    <div class="icon-box">
                    <div class="icon"><i class="ri-money-dollar-box-line"></i></div>
                    <h4 class="title">Movimentações</h4>
                    <p class="description">Registro de movimentações financeiras</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
