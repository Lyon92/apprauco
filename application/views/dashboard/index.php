  <br><br>
<!--   <input type="text" name="daterange" value="01/01/2017 - 01/31/2017" />  <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp; -->

<a href="<?php echo base_url(); ?>excel/excel"  class="btn btn-success pull-right">Exportar Excel</a>
<br>
<br>
 <table class="table  table-bordered table-hover table-condensed table-responsive" id="tblDatos">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Ruta</th>
                <th>Dia</th>
                <th>Tienda</th>
                <th>Hora Estimada</th>
                <th>Conductor</th>
                <th>Rut</th>
                <th>Hora LLegada</th>
                <th>Hora Salida</th>
                <th>Tiempo en Tienda</th>
                <th>Acepta Encargada</th>
                <th>Codigo</th>
                <th>Cumplimiento</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $dato) { ?>
            <tr>
                <td><?php echo $dato->Fecha ?></td>
                <td><?php echo $dato->RutaTienda ?></td>
                <td><?php echo $dato->Dia ?></td>   
                <td><?php echo $dato->Tienda ?></td>          
                <td><?php echo $dato->HoraEstimadaLLegada ?></td>
                <td><?php echo $dato->Conductor ?></td>
                <td><?php echo $dato->RutConductor ?></td>
                <td><?php echo $dato->HoraLLegadaTienda ?></td>
                <td><?php echo $dato->HoraSalidaTienda ?></td>
                <td><?php echo $dato->HoraTranscurrida ?></td>
                <td><?php echo $dato->Acepta ?></td>
                <td><?php echo $dato->Match ?></td>
                <td><?php echo $dato->TiempoCumplido ?></td>
            
              
            </tr>
            <?php } ?>
        </tbody>
        
      </table>

       <nav aria-label="Page navigation">
          <span class="pull-right"><?php echo $this->pagination->create_links() ?></span> 
      </nav>
 <br><br><br>
<div class="col-xs-10">
	
			<canvas id="myChart"></canvas>
            <br><br>
</div>
<script>
var ctx = $("#myChart");

var paramMeses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

var paramValores = [0, 59, 80, 81, 56, 55, 40, 30, 90, 98, 45, 78];

var myChart = new Chart(ctx, {
    type: 'line',
    data:  {
    labels: paramMeses,
    datasets: [
        {
            label: "Cumplimiento",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 5,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: paramValores,
            spanGaps: false,
        }
    ]
},
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

/*var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});*/
</script>

<script type="text/javascript">
    var baseurl = "http://131.161.1.41/apprauco/";
</script>

<script type="text/javascript">
$(function() {
    $('input[name="daterange"]').daterangepicker();
});
</script>