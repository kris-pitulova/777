<?php 
 $version = trim(shell_exec('git symbolic-ref --short -q HEAD')); 
 file_put_contents("version", $version); 
 shell_exec('git clone https://bcd7ff5b33dfcff6b36db2b01cbf9a59995a8543@github.com/rok9ru/trpo-core.git core'); 
 ?> 
