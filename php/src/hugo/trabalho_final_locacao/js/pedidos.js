var fTotal    = 0;
var aCarros = [];

function onClickAdicionarCarro(){
    geraTabela();
    gravaCarros();
}

function geraTabela(){
   var sCarro = document.getElementById('carSelecao').value.split('-');
   var iQtd = document.getElementById('qtd').value;
   
    
   var eTabela = document.getElementById('miniTabela');
   var eTr = document.createElement('tr');
   eTabela.appendChild(eTr);
   
   var eTd1 = document.createElement('td');
   eTd1.setAttribute("class", "linha");
   eTd1.innerHTML = sCarro[1];
   eTr.appendChild(eTd1);
   
   var eTd2 = document.createElement('td');
   eTd2.innerHTML = iQtd;
   eTd2.setAttribute("class", "linha");
   eTr.appendChild(eTd2);
   
   var eTd3 = document.createElement('td');
   eTd3.innerHTML = 'R$' + parseInt(sCarro[2])*iQtd + ' Reais';
   eTd3.setAttribute("class", "linha");
   eTr.appendChild(eTd3);
   
   fTotal += parseInt(sCarro[2])*iQtd; 
   var eTotal = document.getElementById('total');
   eTotal.setAttribute('value', fTotal);
}

function limpaTabela(){
   var eTotal = document.getElementById('total');
   eTotal.setAttribute('value', '0');
   $("td").remove(".linha");
   fTotal =0;
}

function gravaCarros(){
    var sCarCodigo  = document.getElementById('carSelecao').value.split('-');
    var sQuantidade = document.getElementById('qtd').value;
    
    var oCarro    = new Object();
    oCarro.codigo = sCarCodigo[0];
    oCarro.qtd    = sQuantidade;
    
    aCarros.push(oCarro);

    var sJson = JSON.stringify(aCarros ); //[{"carro"="1", "qdt"="10"}, {"carro"="2", "qdt"="9"}]

// gravar o sJson no campo escondido
    var eCampo = document.getElementById('carros');
    eCampo.setAttribute('value', sJson);
    

//json do arquivo .txt "carro"="[{"carro"="1", "qdt"="10"}, {"carro"="2", "qdt"="9"}]"
}


