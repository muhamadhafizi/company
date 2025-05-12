@extends('layout.app2')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
    <div class="container mx-auto mt-6">
        <h1 class="text-2xl font-semibold">Dashboard</h1>
        <p class="text-gray-600">Welcome to the admin dashboard!</p>

        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold">Total Users</h2>
                <p class="text-gray-600">100</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold">Total Companies</h2>
                <p class="text-gray-600">50</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold">Total Projects</h2>
                <p class="text-gray-600">75</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold">Total Tasks</h2>
                <p class="text-gray-600">200</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold">Total Invoices</h2>
                <p class="text-gray-600">30</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold">Total Payments</h2>
                <p class="text-gray-600">20</p>
            </div>
        </div>
    </div>
@endsection
