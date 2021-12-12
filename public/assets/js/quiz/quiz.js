var escolha;
var arr = getCookie(document.cookie);
var a = 0; 
var b = 0; 
var c = 0; 
var d = 0; 
var e = 0; 


function getCookie(string) {

    console.log(string.string);
    console.log(string.length);
    if(string.length != 0) {
        var aux = string.split("=");
        var k = JSON.parse(aux[1]);
        return k;
    } else {
        return Array();
    }
}

function select(alternativa, question) {
    console.log(question);
    arr[question] = alternativa;
    console.log(arr);
    console.log(c);
    escolha = alternativa;
    document.cookie = "escolha=" + JSON.stringify(arr);
}

console.log(arr);

function finalizar() {
    let full = true;
    arr.forEach(item => {
        if (item == null)
            full=false; 
    })
    if(full){

        arr.forEach(resposta => {
            if(resposta == 0)
                a++;
            else if(resposta == 1)
                b++;
            else if(resposta == 2)
                c++;
            else if(resposta == 3)
                d++;
            else if(resposta == 4)
                e++;
        });
        let array = Array(a,b,c,d,e);
        let maior=0;
        array.forEach(item => {
            if(item > maior)
                maior = item;
        })
        console.log(array);
        console.log(maior);
        if(a==maior)
            document.getElementById('resposta').value = 0;
        else if(b==maior)
            document.getElementById('resposta').value = 1;
        else if(c==maior)
            document.getElementById('resposta').value = 2;
        else if(d==maior)
            document.getElementById('resposta').value = 3;
        else if(e==maior)
            document.getElementById('resposta').value = 4;
    } else {
        alert("deu ruim");
        document.getElementById('resposta').value = -1;
    }
   
}
