@extends('layouts.default')
@section('content')

<div class="d-flex align-items-center">
    <div class="container card shadow-sm" style="margin-top:100px; max-width:500px">
        <form action="">
            <div class="mb-3">
            <input type="email" class="form-control"  name="title">
              </div>
              <div>
                <input type="datetime-local" class="form-control" name="deadline">
              </div>
              <div class="mb-3">
               <textarea class="form-control" name="description" rows="3"></textarea>
              </div>
              <button type="submit">Submit</button>
        </form>
    </div>
</div>

@endsection