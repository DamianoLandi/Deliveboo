@extends('layouts.app')

@section('content')

    
<div class="container-fluid container box mt-5">
  <h1 class="text-white font-weight-bold mt-3 mb-4 text-center">Statistiche Ristorante</h1>
  <div class="row justify-content-around">
    <div class="col-5 card-statistic">
      <div class=" pie-chart-container">
        <canvas class="my-5" id="pie-chart"></canvas>
      </div>
    </div>
    
    <div class="col-5 card-statistic ">
      <div class=" pie-chart-container ">
        <canvas class="my-5" id="amount-chart"></canvas>
      </div>
    </div>
  </div>
  <div class="mt-4 d-flex justify-content-center">
  <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Torna agli ordini</a>
  </div>
</div>

@endsection
@section('script')

<script>

    
      // Funzione per stampare grafico del totale ordini per mese

          $(function(){
              const gData = JSON.parse(`<?php echo $chart_data; ?>`);
              console.log(gData);
              let ctx = document.getElementById('pie-chart').getContext('2d');
              
              let data = {
                  labels: gData.label,
                  datasets: [
                      {
                          label: gData.label,
                          data: gData.data,
                          backgroundColor: [
                          'rgba(255, 205, 86, 0.4)',
                          'rgba(201, 203, 207, 0.4)',
                          'rgba(255, 99, 132, 0.4)',
                          'rgba(75, 192, 192, 0.4)',
                          'rgba(255, 159, 64, 0.4)',
                          'rgba(255, 205, 86, 0.4)',
                          'rgba(153, 102, 255, 0.4)',

                          ],
                          borderColor: [
                          'rgba(75, 192, 192, 0.4)',
                          'rgba(54, 162, 235, 0.4)',
                          'rgba(153, 102, 255, 0.4)',
                          'rgba(201, 203, 207, 0.4)',
                          'rgba(255, 99, 132, 0.4)',
                          'rgba(255, 159, 64, 0.4)',
                          'rgba(255, 205, 86, 0.4)',
                          ],
                          borderWidth: [1, 1, 1, 1, 1,1,1,1,1,1]
                      }
                  ]
              };
              //options
            let options = {
              responsive: true,
              title: {
                display: true,
                position: "top",
                text: "Totale Ordini ricevuti mese per mese",
                fontSize: 18,
                fontColor: "#111"
              },
              legend: {
                display: false,
                position: "bottom",
                labels: {
                  fontColor: "#333",
                  fontSize: 16
                }
              }, 
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true, 
                          max: 10,
                      }
                  }],
              },
            };
          
            //   Instanziato primo grafico per totale ordini mese
            let chart1 = new Chart(ctx, {
              type: "bar",
              data: data,
              options: options
            });
          });


      // Funzione per stampare grafico dell'ammontare vendite

          $(function(){
              const aData = JSON.parse(`<?php echo $chart_data_amount; ?>`);
              console.log(aData);
              let amountChart = document.getElementById('amount-chart').getContext('2d');
              
              let data = {
                  labels: aData.label,
                  datasets: [
                      {
                          label: aData.label,
                          data: aData.data,
                          backgroundColor: [
                          'rgba(75, 192, 192, 0.4)',
                          'rgba(54, 162, 235, 0.4)',
                          'rgba(153, 102, 255, 0.4)',
                          'rgba(201, 203, 207, 0.4)',
                          'rgba(255, 99, 132, 0.4)',
                          'rgba(255, 159, 64, 0.4)',
                          'rgba(255, 205, 86, 0.4)',
                          ],
                          borderColor: [
                          'rgba(255, 99, 132, 0.4)',
                          'rgba(255, 159, 64, 0.4)',
                          'rgba(255, 205, 86, 0.4)',
                          'rgba(75, 192, 192, 0.4)',
                          'rgba(54, 162, 235, 0.4)',
                          'rgba(153, 102, 255, 0.4)',
                          'rgba(201, 203, 207, 0.4)'
                          ],
                          borderWidth: [1, 1, 1, 1, 1,1,1,1,1,1]
                      }
                  ]
              };
              //options
            let options = {
              responsive: true,
              title: {
                display: true,
                position: "top",
                text: "Ammontare vendite dell'ultimo mese",
                fontSize: 18,
                fontColor: "#111"
              },
              legend: {
                display: false,
                position: "bottom",
                labels: {
                  fontColor: "#333",
                  fontSize: 16
                }
              }, 
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true, 
                          max: 50000,
                      }
                  }],
              },
            };
          
          //   Instanziato secondo grafico per ammontare vendite

            let chart2 = new Chart(amountChart, {
              type: "bar",
              data: data,
              options: options
            });
          });


          
</script>

 
 


@endsection