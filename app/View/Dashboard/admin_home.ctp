<div class="col-lg-12">
                        <div class="panel-body">
                     
                            <div class="row">
                                <div class="col-md-3">
                                	<?php

	$options = array('2013','2014','2015','2016','2017','2018','2019','2020');
	foreach ($options as $key => $value) {
		$options_year[$value] = $value;
	}

 	echo $this->Form->input('ano', array(
	    'label' => false,
	    'options' => $options_year,
	    'selected'=> $year_day,
	    'div'=>false
   ));

?>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-md-12">
<?php
echo "<p>";

for ($i=1;$i<=12;$i++){
	$class = 'btn btn-primary ';
	if($month_day==$i){
		$class = 'btn btn-success b';
	}
	$link = "?mes={$i}&ano={$year_day}";
	echo "<a href='$link' class='$class'>";
	echo  mostraMes($i);
	echo '</a> ';

}
echo "</p>";
	?></div>
                            </div>
                        </div>
                   
                </div>



  