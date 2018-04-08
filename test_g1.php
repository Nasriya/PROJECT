<?php
$query = "SELECT industry,count(industry) FROM company GROUP BY industry ";
$res_c = $mysqli->query($query);

if (!$res_c) {
    die('<p><strong style="color:#FF0000">!! Invalid query:</strong> ' . $mysqli->error.'</p>');
}
?>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
 $(function () {
    $('#piechart').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'กำหนด title ของกราฟ'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:,.0f}  ({point.percentage:.1f}%)</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y:,.0f} (<strong>{point.percentage:.1f} %</strong>)',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
  credits: {
   enabled: false
  },
        series: [{
            name: "Total",
            colorByPoint: true,
            data: [
   <?php
   $c_field = $res_c->field_count-1;
    $c=0; while($row = $res_c->fetch_array(MYSQLI_NUM)){ $c++; ?>
   <?php if($c>1){ ?>,<?php } ?>
    {
     name: "<?php echo htmlspecialchars(addslashes(str_replace("\t","",str_replace("\n","",str_replace("\r","",$row[0]))))); ?>",
     y: <?php echo $row[$c_field]; ?>
    }
   <?php } ?>
   ]
        }]
    });
});
</script>
<!--แสดงกราฟ-->
<div id="piechart"></div>
