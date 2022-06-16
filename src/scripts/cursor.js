const cur = document.querySelector('.cursor');

cur.style.display = "none";
document.addEventListener('mousemove', e =>{
    cur.setAttribute("style", "top: "+(e.pageY-10)+"px; left: "+(e.pageX-10)+"px;")
});

