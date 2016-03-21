<div class="row">
  <div class="col-md-6">
    <table class="table table-bordered table-hover">
      <tr>
        <th>Jenis Dinding Rumah</th>
        <th>Jumlah</th>
        <th>Persentase</th>
      </tr>
      <tr>
        <td>Tembok</td>
        <td><?php echo $tembok;?></td>
        <td><?php echo ($tembok>0) ? number_format($tembok/$jumlahorang*100,2):0; echo " %";?></td>
      </tr>
      <tr>
        <td>Kayu / Seng</td>
        <td><?php echo $kayu;?></td>
        <td><?php echo ($kayu>0) ? number_format($kayu/$jumlahorang*100,2):0; echo " %";?></td>
      </tr>
      <tr>
        <td>Bambu</td>
        <td><?php echo $bambu;?></td>
        <td><?php echo ($bambu>0) ? number_format($bambu/$jumlahorang*100,2):0; echo " %";?></td>
      </tr>
      <tr>
        <td>Lainnya</td>
        <td><?php echo $lainnya;?></td>
        <td><?php echo ($lainnya>0) ? number_format($lainnya/$jumlahorang*100,2):0; echo " %";?></td>
      </tr>
      <tr>
        <th>Total</th>
        <th><?php echo $jumlahorang; ?></th>
        <th><?php echo ($jumlahorang>0) ? $jumlahorang/$jumlahorang*100 : 0; echo " %";?></th>
      </tr>
      
    </table>
  </div>
  <div class="col-md-6">
    <div class="row" id="row1">
      <div class="chart">
        <canvas id="pieChart" height="240" width="511" style="width: 511px; height: 240px;"></canvas>
      </div>
    </div>
  </div>
</div>
<?php // print_r($bar);?>
<script>
  $(function () { 
    
    //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [<?php 
            
            echo "
              {
              value: ";echo number_format(($tembok>0) ? $tembok/$jumlahorang*100:0,2).",
              color: \"".'#e02a11'."\",
              highlight: \"".'#e02a11'."\",
              label: \"".'Tembok'."\"
              },
              {
              value: ";echo number_format(($kayu>0) ? $kayu/$jumlahorang*100:0,2).",
              color: \"".'#00BFFF'."\",
              highlight: \"".'#00BFFF'."\",
              label: \"".'Kayu / Seng'."\"
              },
              {
              value: ";echo number_format(($bambu>0) ? $bambu/$jumlahorang*100:0,2).",
              color: \"".'#800080'."\",
              highlight: \"".'#800080'."\",
              label: \"".'Bambu'."\"
              },
              {
              value: ";echo number_format(($lainnya>0) ? $lainnya/$jumlahorang*100:0,2).",
              color: \"".'#20ad3a'."\",
              highlight: \"".'#20ad3a'."\",
              label:  \"".'Lainnya'."\"
              }"; 
            ?>

        ];
        var pieOptions = {
          segmentShowStroke: true,
          segmentStrokeColor: "#fff",
          segmentStrokeWidth: 2,
          percentageInnerCutout: 40, // This is 0 for Pie charts
          animationSteps: 100,
          animationEasing: "easeOutBounce",
          animateRotate: true,
          animateScale: false,
          responsive: true,
          maintainAspectRatio: false,
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        pieChart.Doughnut(PieData, pieOptions);
  });
</script>