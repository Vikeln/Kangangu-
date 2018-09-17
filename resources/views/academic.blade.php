@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('STUDENT PERFOMANCE REPORTER') }}</div>

                <div class="card-body">
                    <form method="POST" action="/academic">
                        @csrf
                        @if(session()->has('login_error'))

                          <div class="alert alert-success">
                            {{ session()->get('login_error') }}
                          </div>
                          return redirect('/login');
                        @endif
                        <div class="form-group row">
                            <label for="userName" class="col-sm-4 col-form-label text-md-right">{{ __('Select an Exam and hit Submit') }}</label>

                            <div class="col-md-6">
                                <select name='form' class='mr-sm-2 form-control' required>
                                  @foreach($exam as $key => $data){
                                  <option value="{{$data -> id}}">Form {{$data -> form}} {{$data -> name}} Term {{$data -> form}} {{$data -> year}} </option>
                                }@endforeach
                                </select>
                            <div class="form-group row mb-0"> <br>
                              <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  {{ __('Submit') }}
                                </button>

                              </div>
                            </div>
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <br><br>
@endsection
