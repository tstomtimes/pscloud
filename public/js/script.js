document.addEventListener('DOMContentLoaded', () => {
  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {
    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
      el.addEventListener('click', () => {
        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);
        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');
      });
    });
  }
});

$(function(){
    $(window).scroll(function (){
        $('.fadein').each(function(){
            var elemPos = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > elemPos - windowHeight + 200){
                $(this).addClass('scrollin');
            }
        });
    });
});

// $(function() {
//   $("#myTable").tablesorter();
// });

// $(function() {
//   $("#myTable").tablesorter({ sortList: [[0,0], [1,0]] });
// });

$(function() {
  $(".tenkey").keypad({
    layout: ['789' + $.keypad.CLOSE,
        '456'  + $.keypad.BACK,
        '123' + $.keypad.CLEAR,
        $.keypad.SPACE + '0'],
    keypadOnly: true,
    showAnim: '',
    keypadClass: 'ten'
  });
});

function ring(){
  // var vol = new Tone.Volume(-30);
  //   var synth = new Tone.PolySynth().chain(vol, Tone.Master);
  //   synth.triggerAttackRelease('B4', '32n');
}
