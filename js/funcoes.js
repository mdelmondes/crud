function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){  
     var sep = 0;  
     var key = '';  
     var i = j = 0;  
     var len = len2 = 0;  
     var strCheck = '0123456789';  
     var aux = aux2 = '';  
     var whichCode = (window.Event) ? e.which : e.keyCode;  
     if (whichCode == 13 || whichCode == 8) return true;  
     key = String.fromCharCode(whichCode); // Valor para o código da Chave  
     if (strCheck.indexOf(key) == -1) return false; // Chave inválida  
     len = objTextBox.value.length;  
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
     return false;  
 } 
//cpf-cnpj

function formatarCampo(campoTexto) {
    if (campoTexto.value.length <= 11) {
        campoTexto.value = mascaraCpf(campoTexto.value);
    } else {
        campoTexto.value = mascaraCnpj(campoTexto.value);
    }
}
function retirarFormatacao(campoTexto) {
    campoTexto.value = campoTexto.value.replace(/(\.|\/|\-)/g,"");
}
function mascaraCpf(valor) {
    return valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g,"\$1.\$2.\$3\-\$4");
}
function mascaraCnpj(valor) {
    return valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g,"\$1.\$2.\$3\/\$4\-\$5");
}

//telefone
function mask(e, id, mask){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)){
        mascara(id, mask);
        return true;
    } 
    else{
        if (tecla==8 || tecla==0){
            mascara(id, mask);
            return true;
        } 
        else  return false;
    }
}
function mascara(id, mask){
    var i = id.value.length;
    var carac = mask.substring(i, i+1);
    var prox_char = mask.substring(i+1, i+2);
    if(i == 0 && carac != '#'){
        insereCaracter(id, carac);
        if(prox_char != '#')insereCaracter(id, prox_char);
    }
    else if(carac != '#'){
        insereCaracter(id, carac);
        if(prox_char != '#')insereCaracter(id, prox_char);
    }
    function insereCaracter(id, char){
        id.value += char;
    }
}
//celular

function maskCel(e, id, mask){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)){
        mascara(id, mask);
        return true;
    } 
    else{
        if (tecla==8 || tecla==0){
            mascara(id, mask);
            return true;
        } 
        else  return false;
    }
}
function mascara(id, mask){
    var i = id.value.length;
    var carac = mask.substring(i, i+1);
    var prox_char = mask.substring(i+1, i+2);
    if(i == 0 && carac != '#'){
        insereCaracter(id, carac);
        if(prox_char != '#')insereCaracter(id, prox_char);
    }
    else if(carac != '#'){
        insereCaracter(id, carac);
        if(prox_char != '#')insereCaracter(id, prox_char);
    }
    function insereCaracter(id, char){
        id.value += char;
    }
}