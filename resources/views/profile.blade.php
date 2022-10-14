@extends('layout')

@section('form')
<div class="container mb-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('shout.saveprofile') }}" method="POST" class="mt-5 mb-5">
                @csrf
                <h4 class="mb-5">Update Your Profile</h4>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="shadow-sm form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="{{ Auth::user()->email }}" class="shadow-sm form-control">
                </div>

                <div class="form-group">
                    <label for="nickname">Nickname</label>
                    <input type="text" name="nickname" id="nickname" value="{{ Auth::user()->nickname }}" class="shadow-sm form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="shadow-sm btn btn-primary mt-2 float-right pl-5 pr-5">   Post   </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection



@section('script')

@endsection