@extends('layouts.layout')
@section('title','Jobs')

@section('content')

<div class="col-12">
    <div class="row">
        @if($jobs->count())
            <div class="col-lg-4">
                <form id="searchForm" class="form-input d-flex justify-content-start align-items-start">
                    <div class="input-group shadow p-3 mb-5 bg-body rounded">
                        <input type="text" id="search" name="search" placeholder="Search job or location..."
                               required value="{{ old('search') }}" class="@error('username') is-invalid @enderror
                                form-control " />
                        <button type="button" id="submitButton" class="btn btn-outline-primary"><i
                                    class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="row" id="myCard">
                @foreach($jobs as $job)
                    <div class="card m-2 shadow p-3 mb-5 bg-body rounded" style="width: 16rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$job->title}}</h5>
                            <p class="card-text"><small>Company: &nbsp;</small> {{$job->company}}</p>
                            <a href="#" class="btn btn-primary">{{$job->location}}</a>
                            <div class="card-body ">
                                <a href="{{$job->description}}" class="card-link">Job Description</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  d-flex justify-content-center ">
                        <nav aria-label="Page navigation">
                            {{ $jobs->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        @else
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <a href="{{route('scarper')}}"><h3 class="my-4">Please press on this link to see the scrawled
                                data</h3></a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<script type="text/javascript">
    $.ajaxSetup({headers: {'csrftoken': '{{ csrf_token() }}'}});
</script>
<script>
    $(document).ready(function () {
        $('#submitButton').click(function () {
            var search = $('#search').val();
            $.ajax({
                type: "get",
                dataType: "json",
                url: "{{route('search')}}",
                data: {search: search},
                success: function (res) {
                    var cardSearch = '';
                    $('#myCard').html('');
                    $.each(res, function (index, value) {
                        cardSearch = "<div class='card m-2' style='width: 16rem;'> " +
                            "<div class='card-body'>" +
                            "<h5 class='card-title'>" + value.title + "</h5>" +
                            "<p class='card-text'><small>Company:</small>" + value.company + "</p>" +
                            "<a href='#' class='btn btn-primary'>" + value.location + "</a></div>"+
                            "<div class='card-body'><a href =" + value.description + "class='card-link'>Job Description</a>"+
                            "</div></div>";
                        $('#myCard').append(cardSearch);
                    });
                },
            });
        });
    });
</script>
@endsection