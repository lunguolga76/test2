@extends('layouts.layout')
@section('title','cvs')

@section('content')
    @foreach($cvs as $cv)
        <div class="card m-4 shadow p-3 mb-5 bg-body rounded" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$cv->name}}</h5>
                <p class="card-text"><span>Education:&nbsp;&nbsp;</span>{{$cv->education}}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span>Experience:&nbsp;&nbsp;</span>{{$cv->experience}}</li>
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">More info</a>
                <a href="#" class="card-link">My works</a>
            </div>
        </div>
        @endforeach
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12  d-flex justify-content-center">
                    <nav aria-label="Page navigation">
                        {{ $cvs->links() }}
                    </nav>
                </div>
            </div>
        </div>
@endsection