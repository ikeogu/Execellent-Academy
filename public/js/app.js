const togle = document.querySelector('.toggle');
const nav = document.querySelector('.nav');

togle.addEventListener('click', function(){
  nav.classList.toggle('show');
  console.log(nav)
})

$('.owl-carousel').owlCarousel({
  rtl:true,
  loop:true,
  margin:10,
  nav:true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:1
      },
      1000:{
          items:1
      }
  }
})
