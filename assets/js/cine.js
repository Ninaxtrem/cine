(function() {
   
    document.addEventListener("mousemove", parallax);
   
    function parallax(e) {
        let _w = window.innerWidth/4;
        let _h = window.innerHeight/4;
        let _mouseX = e.clientX;
        let _mouseY = e.clientY;
        let _depth1 = `${50 - (_mouseX - _w) * 0.01}% ${50 - (_mouseY - _h) * 0.01}%`;
        let _depth2 = `${50 - (_mouseX - _w) * 0.02}% ${50 - (_mouseY - _h) * 0.02}%`;
        let _depth3 = `${50 - (_mouseX - _w) * 0.06}% ${50 - (_mouseY - _h) * 0.06}%`;
        let x = `${_depth3}, ${_depth2}, ${_depth1}`;
        console.log(x);
        elem.style.backgroundPosition = x;
    }

})();

var slides = document.querySelectorAll(".slide");

function eachFunc(array, fn){
  for(var i = 0; i < array.length; i++){
    fn.call(array[i]);
  }
}

function eachSiblings(node, fnprev, fnafter){
  console.log("Ejecutando la funcion eachSiblings()");
  var foundIndex = findNodeIndex(node);
  console.log("indice encontrado", foundIndex);
  for(var i = 0; i < node.parentNode.children.length; i++){
    if(node.parentNode.children[i] != node){
      if(i < foundIndex){
        fnprev.call(node.parentNode.children[i], foundIndex);
      } else {
        fnafter.call(node.parentNode.children[i], foundIndex);
      }
    }
  }
}

function findNodeIndex(node){
  console.log("Ejecutando la funcion findNodeIndex()");
  if(node != undefined){
    console.log("Nodo definido");
    console.log("Numero de nodos en los que se buscara", node.parentNode.children.length);
    for(var i = 0; i < node.parentNode.children.length; i++){
      console.log("Iterando nodo practicamente hermano", i);
      if(node === node.parentNode.children[i]){ 
        console.log("Encontrado", i);
        return i;
      }
    }
  } else {
    console.log("Nodo -- undefined --");
  }
}

function siblings(node){
  var siblings = [];
  for(var i = 0; i < node.parentNode.children; i++){
    if(node.parentNode.children[i] == node){
      siblings.push(node.parentNode.children[i]);
    }
  }
  return siblings;
}

eachFunc(slides, function(){
  this.addEventListener("mouseover", function(){
    var layerHover = this.querySelector(".onhover");
    layerHover.style.width = "135%";
    eachSiblings(this, function(x){
      if((x + 1) % 6 == 0){ 
        this.style.transform = "translateX(-36%)";
      } else {
        if(x % 6 != 0){
          this.style.transform = "translateX(-18%)";
        }
      }
    }, function(x){ 
      if(x % 6 == 0){ 
        this.style.transform = "translateX(36%)";
      } else {
        if((x + 1) % 6 != 0){ 
          this.style.transform = "translateX(18%)";
        }
      }
    });
  }, false);
  this.addEventListener("mouseleave", function(){
    var layerHover = this.querySelector(".onhover");
    layerHover.style.width = "";
    eachSiblings(this, function(){
      this.style.transform = "";
    }, function(){
      this.style.transform = "";
    });
  }, false);
});

var sliderContent = document.querySelector(".slider-content");
var prev = document.querySelector(".prev"),
    next = document.querySelector(".next");
var pos = 0;
next.addEventListener("click", function(){
  if(pos < Math.ceil(slides.length/6) - 1){
    pos++;
    console.log(pos);
    sliderContent.style.transform = "translateX(-"+(pos*100)+"%)";
  }
});

prev.addEventListener("click", function(){
  if(pos > 0){
    pos--;
    console.log(pos);
    sliderContent.style.transform = "translateX(-"+(pos*100)+"%)";
  }
});



