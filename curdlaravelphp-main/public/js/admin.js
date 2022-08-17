var el = document.getElementById("tab-thongtincanhan");
var el2 = document.getElementById("list-thongtincanhan");
el.addEventListener('click', function (){
    if (el2.style.display==="none"){
        el2.style.display="block";
    }else{
        el2.style.display="none";
    }
})
