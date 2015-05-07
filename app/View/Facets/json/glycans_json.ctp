<?php 
$properties = <<<EOI
{
	"types": {
    	"Glycan" : {
    		"pluralLabel": "Glycans"
    	}
    },
    "properties": {
    	"mass" : {
        	"valueType": "number"
    	},
    	"tag" : {
    		"valueType": "text"
    	},
    	"dateEntered" : {
    		"valueType": "date"
    	}
    },
EOI;

$json = ltrim($json, '{');
echo $properties . $json; 


?>