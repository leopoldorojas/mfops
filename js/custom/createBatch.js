var integer_validator = angular.module('arckantoApp.directive', []);

var INTEGER_REGEXP = /^\d*$/;

integer_validator.directive('integer', function() {
  return {
    require: 'ngModel',
    link: function(scope, elm, attrs, ctrl) {
      ctrl.$parsers.unshift(function(viewValue) {
        if (INTEGER_REGEXP.test(viewValue)) {
          // it is valid
          ctrl.$setValidity('integer', true);
          return viewValue;
        } else {
          // it is invalid, return undefined (no model update)
          ctrl.$setValidity('integer', false);
          return undefined;
        }
      });
    }
  };
});

var app = angular.module('arckantoApp', ['ui.date', 'arckantoApp.directive']);

function adminTotal($scope, $http) {
	$scope.loading = false;
	$scope.documentReadOnly = false;	
	$scope.amount = 0;
	$scope.varTotal = 0;
	$scope.document = {}
	$scope.operations = [
		{}
	];

	$scope.dateOptions = {
	    dateFormat: 'yy-mm-dd',     
	    yearRange: '2007:2025',     
		changeYear: true,           
		changeMonth: true,          
		maxDate: '0',
	};

	$http.get('http://localhost:8888/mfops/index.php/documentType/list').success(function(data) {
    	$scope.document_types = data;
  	});

	$http.get('http://localhost:8888/mfops/index.php/movementType/list?withPrice=true').success(function(data) {
    	$scope.movement_types = data;
  	});

	$scope.setDocumentNumber = function() {
		var index = 0;
		index = findIndexByKeyValue($scope.document_types, 'id', $scope.document.documentType_id);

		if (index > 0) {
			$scope.document.number = $scope.document_types[index].next_number;
			$scope.documentReadOnly = true;	
		} else {
			$scope.document.number = '';
			$scope.documentReadOnly = false;	
		}
	}	

	function findIndexByKeyValue(obj, key, value)
	{
	    for (var i = 0; i < obj.length; i++) {
	        if (obj[i][key] == value) {
	            return i;
	        }
	    }
	    return null;
	}

	$scope.showReferencePrice = function(operation) {
		var type_found = false;

		for (var i=0; i < $scope.movement_types.length; i++) {
			if ($scope.movement_types[i].id == operation.type_id) {
				return (type_found = true);
			}
		}

		if (!type_found) {
			operation.reference_price = '';
		}

		return type_found;		
	}

	$scope.calculatedTotalAmount = function() {
		sumatory = 0;
		angular.forEach($scope.operations, function(operation){
  			sumatory += (operation.amount == null) ? 0 : parseInt(operation.amount);
		});
		$scope.varTotal = sumatory;
		return $scope.varTotal;
  	}

	$scope.addOperation = function() {
		$scope.operations.push({});
	}

	$scope.removeOperation = function() {
		$scope.operations.pop();
	}

	$scope.submit = function() {

	    for (var i=0, numOperations=$scope.operations.length; i < numOperations; i++) {

	    	if ($scope.operations[i].reference_price != '') {
	    		if ($scope.operations[i].amount % $scope.operations[i].reference_price != 0) {
	    			alert ('El monto entre el precio de referencia del movimiento de detalle ' + (i+1).toString() + ' no da un número exacto. No se permiten operaciones con Acciones fraccionadas');
	    			return false;
	    		}
	    	}

	    	$scope.operations[i].entity_id = $scope.operations[i].entity_id || $scope.document.entity_id;
	    	$scope.operations[i].entity_name = $scope.operations[i].entity_name || $scope.document.entity_name;
	    	$scope.operations[i].operation_date = $scope.operations[i].operation_date || $scope.document.document_date;
	    }

		$scope.loading = true;
		$scope.method = 'POST';
		$scope.url = 'http://localhost:8888/mfops/index.php/document/createRestfulBatch';

	    $scope.dataToSend = {
	    	'Document': $scope.document,
	    	'Operation': $scope.operations 
	    }

	    $http({method: $scope.method, url: $scope.url, data: $scope.dataToSend, headers: {'Content-Type': 'application/x-www-form-urlencoded'}}).
	      success(function(data, status) {
			$scope.loading = false;
	        $scope.status = status;
	        $scope.data = data;

	        if (data.status == 'success') {
	        	window.location = 'http://localhost:8888/mfops/index.php/document/' + data.model.toString();
	        } else {
	        	alert(data.message);
	        }
	      }).
	      error(function(data, status) {
			$scope.loading = false;
	        $scope.data = data; 
	        $scope.status = status;
	        alert(data);
	    });
    }

	$scope.amountNotValid = function() {
		if ($scope.varTotal != parseInt($scope.totalAmount)) {
			return true;
		} else {
			return false;
		}
	}
}