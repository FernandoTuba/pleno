@extends('layout.app')
@section('title', 'Movimentações - ')
@section('content')
    <section id="page" class="d-flex align-items-center">
        <div class="container position-relative conteudo" data-aos="fade-up" data-aos-delay="100">
            <livewire:movimentacoes/>
        </div>
    </section>
@endsection
