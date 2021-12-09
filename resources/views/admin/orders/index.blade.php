@extends('layouts.app')

@section('content')
    <section id="orders" class="container">
      <div class="box mt-5">

        @if(session('alert-msg'))

        <div class="alert alert-{{session('alert-type')}}" role="alert">
            {{ session('alert-msg') }}
          </div>

        @endif


        @if(!$restaurant)
        @include('includes.alert_restaurant')
        @else  

        <h1 class="text-white mt-3 font-weight-bold text-center mb-2">I Tuoi Ordini</h1>

        <table class="table">
            <thead>
              <tr class="bg-secondary text-white">
                <th scope="col">#</th>
                <th scope="col">Order Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Paid</th>
                <th scope="col">Customer Address</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)  
                <tr class="font-weight-bold bg-white">
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td> € {{ $order->amount }}</td>
                    <td>
                        @if($order->is_payed)
                        <span class="badge badge-pill badge-success">Pagato</span>
                        @else
                        <span class="badge badge-pill badge-danger">Da pagare</span>
                        @endif
                    </td>
                    <td>{{ $order->customer_address }}</td>

                    <td><a class="btn btn-primary" href="{{ route('admin.orders.show', $order->id) }}">Vedi</a></td>
                </tr>
                @endforeach
            </tbody>
          </table>
          <tfoot>
            <div class="mt-4  text-center">
              <a href="{{ route('admin.orders.statistics.index') }}" class="btn btn-success">Statistiche</a>           
              <div class="mt-4 d-flex justify-content-center">
                  {{ $orders->links() }}
              </div>
            </div>
          </tfoot>
    </section>
    @endif
@endsection
