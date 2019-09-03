@extends('layouts.app')

@section('content')


<div class="columns" style="margin-top: 20px;">
    <div class="column is-3">
        <div class="box">
            <aside class="menu">
                <p class="menu-label">
                    General
                </p>
                <ul class="menu-list">
                    <li><a href="{{ route('category.index') }}">Categories</a></li>
                    <li><a href="{{ route('question.index') }}">Questions</a></li>
                    <li><a href="{{ route('category.index') }}">Users</a></li>
                </ul>
                <p class="menu-label">
                    Sessions
                </p>
                <ul class="menu-list">
                    <li><a href="{{ route('category.index') }}">Guests</a></li>
                </ul>
                <p class="menu-label">
                    Personal
                </p>
                <ul class="menu-list">
                    <li><a href="{{ route('category.index') }}">Logout</a></li>
                </ul>


            </aside>
        </div>
    </div>
    <div class="column is-9">
        <div class="box">
            @yield('content')
        </div>
    </div>

</div>



@overwrite
