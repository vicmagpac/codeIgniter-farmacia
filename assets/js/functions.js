
function numeros(){
    tecla = event.keyCode;
    if (tecla >= 48 && tecla <= 57){
	return true;
    }else{
	return false;
    }
}

function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
	var sep = 0;
	var key = '';
	var i = j = 0;
	var len = len2 = 0;
	var strCheck = '0123456789';
	var aux = aux2 = '';
	var whichCode = (window.Event) ? e.which : e.keyCode;
	if (whichCode == 13) return true;
	key = String.fromCharCode(whichCode); // Valor para o código da Chave
	if (strCheck.indexOf(key) == -1) return false; // Chave inválida
	len = objTextBox.value.length;
	if(len > 9){
		
	}else{
		for(i = 0; i < len; i++)
			if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
		aux = '';
		for(; i < len; i++)
			if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
		aux += key;
		len = aux.length;
		if (len == 0) objTextBox.value = '';
		if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
		if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
		if (len > 2) {
			aux2 = '';
			for (j = 0, i = len - 3; i >= 0; i--) {
				if (j == 3) {
					aux2 += SeparadorMilesimo;
					j = 0;
				}
				aux2 += aux.charAt(i);
				j++;
			}
			objTextBox.value = '';
			len2 = aux2.length;
			for (i = len2 - 1; i >= 0; i--)
			objTextBox.value += aux2.charAt(i);
			objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
		}
	}
	return false;
}


// create the prototype on the String object
String.prototype.trim = function() {
 // skip leading and trailing whitespace
 // and return everything in between
	return this.replace(/^\s*(\b.*\b|)\s*$/, "$1");
}



// create the prototype on the String object
String.prototype.trimLeadingZeros = function(todos) { //true, false
    if (""+todos=="undefined") todos=false;

    //tirando os zeros do come�o
    var i=0;
    while ((i < this.length- (todos?0:1) ) && (this.substring(i,i+1)=='0')) i++;
    valor = this.substring(i);
	return valor;
}

function stripCharsNotInBag(bag, campo) { //campo s� deve ser passado se for para alterar seu valor
	//bag = "0123456789";

	var temp="";
	if (campo==null) temp=this;
	if (campo!=null) temp=campo.value;

	var result = "";
	for (i=0; i<temp.length; i++){
		character = temp.charAt(i);
		if (bag.indexOf(character) != -1) result += character;
	}
	if (campo!=null && campo.value!=result) {
		campo.value=result;
	}
	return result;
}

// create the prototype on the String object
String.prototype.stripCharsNotInBag = stripCharsNotInBag;

function stripNotNumber(num) {
	return num.stripCharsNotInBag("0123456789");
}


var BASE_DATE = new Date("1997","09","07")  // 1999-out-07
var MAX_DATE = new Date("2025","01","21")   // 2025-fev-21



function formataDataDigitada(campo) {
    // retira tudo que nao eh numerico
    var temp=campo.value;
    var valor="";

    valor=stripNotNumber(temp);

    if (valor.length>8) { valor=valor.substring(0,8); }

    var j=0;
    temp="";
    for (var tam=0;tam<valor.length;tam++) {
        if (j==0) {
            temp+=valor.substring(tam,tam+1);
            if ( (tam==1) && (valor.length>2) ) { j++; temp+="/"; }
        } else if (j==1) {
            temp+=valor.substring(tam,tam+1);
            if ( (tam==3) && (valor.length>4) ) { j++; temp+="/"; }
        } else if (j==2) {
            temp+=valor.substring(tam,tam+1);
        }
    }

    if (campo.value!=temp) {
        campo.value=temp;
    }
}


	
function FormataNumero(num,decimalNum,bolLeadingZero,bolParens,bolCommas)
/**********************************************************************
	IN:
		NUM - the number to format
		decimalNum - the number of decimal places to format the number to
		bolLeadingZero - true / false - display a leading zero for
										numbers between -1 and 1
		bolParens - true / false - use parenthesis around negative numbers
		bolCommas - put commas as number separators.

	RETVAL:
		The formatted number!
 **********************************************************************/
{
        if (isNaN(parseInt(num))) return "NaN";

	var tmpNum = num;
	var iSign = num < 0 ? -1 : 1;		// Get sign of number

	// Adjust number so only the specified number of numbers after
	// the decimal point are shown.
	tmpNum *= Math.pow(10,decimalNum);
	tmpNum = Math.round(Math.abs(tmpNum))
	tmpNum /= Math.pow(10,decimalNum);
	tmpNum *= iSign;					// Readjust for sign

	// Create a string object to do our formatting on
	var tmpNumStr = new String(tmpNum);

	// See if we need to strip out the leading zero or not.
	if (!bolLeadingZero && num < 1 && num > -1 && num != 0)
		if (num > 0)
			tmpNumStr = tmpNumStr.substring(1,tmpNumStr.length);
		else
			tmpNumStr = "-" + tmpNumStr.substring(2,tmpNumStr.length);

	tmpNumStr = tmpNumStr.replace(/\./g,",");


	// Complete all decimal places
	if (decimalNum>0) {
		var iStart = tmpNumStr.indexOf(",");
		if (iStart < 0) {
			tmpNumStr+=",";
			iStart = tmpNumStr.indexOf(",");
		}

		for (i=(decimalNum-(tmpNumStr.length-iStart)); i>=0 ; i--) {
			tmpNumStr+="0";
		}
	}


	// See if we need to put in the commas
	if (bolCommas && (num >= 1000 || num <= -1000)) {
		var iStart = tmpNumStr.indexOf(",");
		if (iStart < 0)
			iStart = tmpNumStr.length;

		iStart -= 3;
		while (iStart >= 1) {
			tmpNumStr = tmpNumStr.substring(0,iStart) + "." + tmpNumStr.substring(iStart,tmpNumStr.length)
			iStart -= 3;
		}
	}

	// See if we need to use parenthesis
	if (bolParens && num < 0)
		tmpNumStr = "(" + tmpNumStr.substring(1,tmpNumStr.length) + ")";

	return tmpNumStr;		// Return our formatted string!
}

function formataValorDigitado(campo, decimal) {
	var decimalNum=2;
	if (decimal!=null)
		decimalNum=decimal;

	var temp = FormataNumero(campo.value.stripCharsNotInBag("0123456789").trimLeadingZeros() / Math.pow(10,decimalNum), decimalNum, true, false, true);

    if (campo.value!=temp) {
        campo.value=temp;
    }
}

function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;
    if((tecla > 47 && tecla < 58)) return true;
    else{
        if (tecla != 8)return false;
        else{
            return true;
        }
    }
}