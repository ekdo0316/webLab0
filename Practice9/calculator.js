"use strict"
window.onload = function () {
    var stack = [];
	var displayVal = "0";
	var str = "";
    for (var i in $$('button')) {
        $$('button')[i].onclick = function () {
            var value = this.innerHTML;
			var num = new RegExp("[0-9]");
			var point = new RegExp("^[0-9]+\.{1}[0-9]*[0-9]$");
			if(num.test(value))
			{
				if(displayVal == '0'){
					displayVal = value;
				}
				else{
					if(displayVal.indexOf("!") == -1){
						displayVal += value;
					}
				}
			}
			else if(value == 'AC'){
				displayVal = '0';
				stack = [];
				document.getElementById("expression").innerHTML = "0";
			}
			else if(value == '.'){
				if(displayVal.indexOf(".") == -1){
					displayVal += value;
				}
			}
			else{
				if(value == '!')
                {
					if(displayVal.indexOf("!") == -1){
						displayVal += value;
	   }  
				}
				else{
					stack.push(displayVal+value);
				
					str += displayVal+value;
					document.getElementById("expression").innerHTML = str;
					displayVal='0';
					
					
				}
				
			}
			document.getElementById("result").innerHTML = displayVal
        };
    }
};
function factorial (x) {
	if(x == 1){
		return 1;
	}
	else{
		return x*factorial(x-1);
	}
}

function highPriorityCalculator(s, val) {
	var last = s.pop;
	var result = 0;
	var op = last.pop;
	var valop = val.pop;
	if(op == "*"){
		result = parseFloat(last) * parseFloat(val);
		s.push(result);
	}
	else if(op == "^"){
		result = parseFloat(last) ^ parseFloat(val);
		s.push(result);
	}
	else if(op == "/"){
		result = parseFloat(last) / parseFloat(val);
		s.push(result);
	}
	else{
        
    }
}
function calculator(s) {
    var result = 0;
    var operator = "+";
    for (var i=0; i< s.length; i++) {
        
    }
    return result;
}
