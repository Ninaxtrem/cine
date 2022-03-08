(function() {
    
    document.addEventListener("mousemove", parallax);
    const elem = document.querySelector("#parallax");
    
    function parallax(e) {
        let _w = window.innerWidth/2;
        let _h = window.innerHeight/2;
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

const galleryContainer = document.querySelector('.gallery-container');
const galleryControlsContainer = document.querySelector('.gallery-controls');
const galleryControls = ['previous', 'add', 'next'];
const galleryItems = document.querySelectorAll('.gallery-item');

class Carousel {
  constructor(container, items, controls) {
    this.carouselContainer = container;
    this.carouselControls = controls;
    this.carouselArray = [...items];
  }

  updateGallery() {
    this.carouselArray.forEach(el => {
      el.classList.remove('gallery-item-1');
      el.classList.remove('gallery-item-2');
      el.classList.remove('gallery-item-3');
      el.classList.remove('gallery-item-4');
      el.classList.remove('gallery-item-5');
    });

    this.carouselArray.slice(0, 5).forEach((el, i) => {
      el.classList.add(`gallery-item-${i+1}`);
    });
  }


  setCurrentState(direction) {

    if (direction.className == 'gallery-controls-previous') {
      this.carouselArray.unshift(this.carouselArray.pop());
    } else {
      this.carouselArray.push(this.carouselArray.shift());
    }
    
    this.updateGallery();
  }

  setControls() {
    this.carouselControls.forEach(control => {
      galleryControlsContainer.appendChild(document.createElement('button')).className = `gallery-controls-${control}`;

      document.querySelector(`.gallery-controls-${control}`).innerText = control;
    });
  }
 

  useControls() {
    const triggers = [...galleryControlsContainer.childNodes];

    triggers.forEach(control => {
      control.addEventListener('click', e => {
        e.preventDefault();

        if (control.className == 'gallery-controls-add') {
          const newItem = document.createElement('img');
          const latestItem = this.carouselArray.length;
          const latestIndex = this.carouselArray.findIndex(item => item.getAttribute('data-index') == this.carouselArray.length)+1;

          
          Object.assign(newItem,{
            className: 'gallery-item',
            src: `http://fakeimg.pl/300/?text=${this.carouselArray.length+1}`
          });
          newItem.setAttribute('data-index', this.carouselArray.length+1);

          this.carouselArray.splice(latestIndex, 0, newItem);
          document.querySelector(`[data-index="${latestItem}"]`).after(newItem);
          this.updateGallery();

        } else {
          this.setCurrentState(control);
        }

      });
    });
  }
}

const exampleCarousel = new Carousel(galleryContainer, galleryItems, galleryControls);

exampleCarousel.setControls();

exampleCarousel.useControls();







var size = 200;
var margin = 20;
var count = 6;
var visible = 3; 
var last = count - visible; // 3
var offset = 0;
var carousel = (size * visible) + (margin * visible) + (size / 3);
var container = (size * count) + (margin * count);
var barely = size / visible;

var $container = $('.carousel__inner');
var $slides = $('.carousel__box');
var $left = $('.carousel__control--left');
var $right = $('.carousel__control--right');
var $previous = null;
var $next = null;

var enter = null;
var close = null;

$left.on('click', function() {
  if ( offset === 0 ) return;
  move(--offset);
});

$right.on('click', function() {
  if ( offset === count - visible ) return;
  move(++offset);
});

$slides.each(function(index, slide) {
  $(slide).data('index', index);
});

$slides.on('mouseenter', _.debounce(function() {
  var $slide = $(this);
  var index = $slide.data('index');
  $previous = previous(index);
  $next = next(index);
  
  $previous.addClass('carousel__box--previous');
  $next.addClass('carousel__box--next');
  $slide.addClass('carousel__box--enter')
}, 350));

$slides.on('mouseout', _.debounce(function() {
  var $slide = $(this);
  
  $slide
    .addClass('carousel__box--leave')
    .removeClass('carousel__box--enter')
    .delay(400)
    .queue(function() {
      $(this).removeClass('carousel__box--leave')
        .dequeue();
    });
  
  $previous.addClass('carousel__box--previous-leave')
    .removeClass('carousel__box--previous')
    .delay(300)
    .queue(function() {
      $(this).removeClass('carousel__box--previous-leave')
        .dequeue();
    });
  
  $next.addClass('carousel__box--next-leave')
    .removeClass('carousel__box--next')
    .delay(300)
    .queue(function() {
      $(this).removeClass('carousel__box--next-leave')
        .dequeue();
    });
}, 300));

function previous(hovered) {
  
  var index = hovered - offset;
  

  var start = offset + visible === count
    ? offset - 1
    : offset;
  
  return $slides.slice(start, offset + index);
}

function next(hovered) {

  var index = hovered - offset;
  
  if ( index === visible ) {
    return $slides.slice();
  } else {
    return $slides.slice(offset + index + 1, offset + visible + 1);
  }
}

function move(offset) {
  var translateX = offset === last
    ? -(container - carousel - margin)
    : -((size * offset) + (margin * offset));
  $container.css('transform', 'translateX(' + translateX + 'px)'); 
}



var size = 200;
var margin = 20;
var count = 6;
var visible = 3; 
var last = count - visible; 
var offset = 0;
var carousel2 = (size * visible) + (margin * visible) + (size / 3);
var container2 = (size * count) + (margin * count);
var barely = size / visible;

var $container = $('.carousel2__inner');
var $slides = $('.carousel2__box');
var $left = $('.carousel2__control--left');
var $right = $('.carousel2__control--right');
var $previous = null;
var $next = null;

var enter = null;
var close = null;

$left.on('click', function() {
  if ( offset === 0 ) return;
  move(--offset);
});

$right.on('click', function() {
  if ( offset === count - visible ) return;
  move(++offset);
});

$slides.each(function(index, slide) {
  $(slide).data('index', index);
});

$slides.on('mouseenter', _.debounce(function() {
  var $slide = $(this);
  var index = $slide.data('index');
  $previous = previous(index);
  $next = next(index);
  
  $previous.addClass('carousel2__box--previous');
  $next.addClass('carousel2__box--next');
  $slide.addClass('carousel2__box--enter')
}, 350));

$slides.on('mouseout', _.debounce(function() {
  var $slide = $(this);
  
  $slide
    .addClass('carousel2__box--leave')
    .removeClass('carousel2__box--enter')
    .delay(400)
    .queue(function() {
      $(this).removeClass('carousel2__box--leave')
        .dequeue();
    });
  
  $previous.addClass('carousel2__box--previous-leave')
    .removeClass('carousel2__box--previous')
    .delay(300)
    .queue(function() {
      $(this).removeClass('carousel2__box--previous-leave')
        .dequeue();
    });
  
  $next.addClass('carousel2__box--next-leave')
    .removeClass('carousel2__box--next')
    .delay(300)
    .queue(function() {
      $(this).removeClass('carousel2__box--next-leave')
        .dequeue();
    });
}, 300));

function previous(hovered) {
  
  var index = hovered - offset;
  

  var start = offset + visible === count
    ? offset - 1
    : offset;
  
  return $slides.slice(start, offset + index);
}

function next(hovered) {

  var index = hovered - offset;
  
  if ( index === visible ) {
    return $slides.slice();
  } else {
    return $slides.slice(offset + index + 1, offset + visible + 1);
  }
}

function move(offset) {
  var translateX = offset === last
    ? -(container - carousel2 - margin)
    : -((size * offset) + (margin * offset));
  $container.css('transform', 'translateX(' + translateX + 'px)'); 
}


