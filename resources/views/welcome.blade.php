@extends('layouts.app')


@section('content')
<v-app>
    <my-header></my-header>
    <transition name="fade">
        <router-view></router-view>
    </transition>
</v-app>
@endsection
