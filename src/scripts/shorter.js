if(window.innerWidth < 768){
    let output;
    const input = document.getElementById("product-desc").innerText;
    const hossza = input.length;
    
    if(hossza > 200){
        output = input.substring(0, 200).concat('...');
    }
    else{
        output = input;
    }
    document.getElementById("product-desc").innerText = output;
}