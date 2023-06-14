var logosArray = [];
var imagenesArray = [];

document.getElementById('btn_agregar').onchange=function(e){
    let reader=new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload=function(){
        let preview = document.getElementById('preview');
        Image= document.createElement('img');
        Image.src=reader.result;
        logosArray.push(reader.result);
        Image.style.width ="100px";
        preview.append(Image);
    }
}

document.getElementById('btn_agregar1').onchange=function(e){
    let reader=new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload=function(){
        let preview = document.getElementById('preview1');
        Image= document.createElement('img');
        Image.src=reader.result;
        imagenesArray.push(reader.result);
        Image.style.width ="100px";
        preview.append(Image);
    }
}