@extends('layouts.default')
@section('content')

<div class="d-flex align-items-center">
    <div class="container card shadow-sm" style="margin-top:100px; max-width:500px">
        <div class="fs-3 fw-bold text-center">Add new task</div>
        <form action="{{ route('taskPost') }}" method="POST">
            @csrf
            <div class="mb-3 mt-3">
            <input type="text " class="form-control"  name="title">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
              <div>
                <input type="datetime-local" class="form-control" name="deadline">
                @error('deadline')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3 mt-2">
               <textarea class="form-control" name="description" rows="3"></textarea>
               @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            @if(session()->has('success'))
                <div class="alert alert-success">
                {{ session()->get('success') }}
                </div>
            @endif

            @if(session()->has('error'))    
                <div class="alert alert-danger">
                {{ session()->get('error') }}
                </div>
            @endif

              <button class="btn btn-success rounded-pill mb-3" type="submit">Submit</button>
        </form>
    </div>
</div>

@endsection