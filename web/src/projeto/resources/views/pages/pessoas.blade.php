@extends('layout.app')
@section('title', 'Pessoas - ')
@section('content')
    <section id="page" class="d-flex align-items-center">
        <div class="container position-relative conteudo" data-aos="fade-up" data-aos-delay="100">
            <livewire:pessoas/>
        </div>
    </section>
@endsection
