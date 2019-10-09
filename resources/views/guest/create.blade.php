@extends('layouts.guest')


@section('content')

    <div class="columns">

        <div class="column is-10 is-offset-1" style="margin-top: 6vh;">
            <div class="box" style="padding: 12px;">
                <div class="columns">
                    <div class="column is-6" style="background: url({{asset('media/login.jpg')}});
                    background-size: cover;background-poistion: center"></div>
                    <div class="column is-6" style="padding: 40px;">
                        <h5 class="title is-5">Please fill in your information</h5>
                        <form method="POST" action="{{ route('guest.store') }}">
                            @csrf
                            <div class="field">

                                <label class="label">Name</label>
                                <input type="text" class="input" name="name" placeholder="Enter your name">
                                @error('name')
                                <span class="has-text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="field">

                                <label class="label">Email</label>
                                <input type="email" class="input" name="email" placeholder="Enter your email">
                                @error('email')
                                <span class="has-text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="field">

                                <label class="label">Phone</label>
                                <input type="text" class="input" name="phone" placeholder="Enter your phone">
                                @error('phone')
                                <span class="has-text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="field">

                                <label class="label">Address</label>
                                <input type="text" class="input" name="address" placeholder="Country, City, Street">
                                @error('address')
                                <span class="has-text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="field">

                                <label class="label">Birthdate</label>
                                <input type="date" class="input" name="birthdate" placeholder="Birth-date">
                                @error('birthdate')
                                <span class="has-text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="columns">
                                <div class="column is-6">
                                    <div class="field">
                                        <label class="label">Gender</label>
                                        <div class="select is-fullwidth">
                                            <select name="gender" id="">
                                                <option value="0">Male</option>
                                                <option value="0">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('gender')
                                    <span class="has-text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="column is-6">
                                    <div class="field">
                                        <label class="label">Degree</label>
                                        <div class="select is-fullwidth">
                                            <select name="degree"  id="">
                                                <option value="0">High School</option>
                                                <option value="1">Bachelor</option>
                                                <option value="2">Master</option>
                                                <option value="3">PHD</option>
                                                <option value="4">Other</option>
                                            </select>
                                        </div>
                                        @error('degree')
                                        <span class="has-text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="field">
                                <button class="button is-success">Continue</button>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
