function Rut(texto){  

  var tmpstr = "";    

  for ( i=0; i < texto.length ; i++ )         
    if ( texto.charAt(i) != ' ' && texto.charAt(i) != '.' && texto.charAt(i) != '-' ) 
        tmpstr = tmpstr + texto.charAt(i);     
    texto = tmpstr;     
    largo = texto.length;     


    var invertido = "";     
    for ( i=(largo-1),j=0; i>=0; i--,j++ )         
        invertido = invertido + texto.charAt(i);     
    var dtexto = "";     
    dtexto = dtexto + invertido.charAt(0);     
    dtexto = dtexto + '-';     
    cnt = 0;     

    for ( i=1,j=2; i<largo; i++,j++ ){         
        //alert("i=[" + i + "] j=[" + j +"]" );         
        if ( cnt == 3 ){             
            dtexto = dtexto + '.';             
            j++;             
            dtexto = dtexto + invertido.charAt(i);             
            cnt = 1;         158
        }else{                 
           dtexto = dtexto + invertido.charAt(i);             
           cnt++;         
        }     
    }     

    invertido = "";     
    for ( i=(dtexto.length-1),j=0; i>=0; i--,j++ )         
        invertido = invertido + dtexto.charAt(i);     

    window.document.form.rut.value = invertido.toUpperCase()         

    if(revisarDigito2(texto))         
        return true;     
    return false; 
}  

