require('intersection-observer');

export default {
  init() {
    const body = document.body;
    const navBtn = document.querySelector('button.menu-link');
    const closeBtn = document.querySelector('button.close');
    const toObserve = (document.querySelector('#Banner')) ? document.querySelector('#Banner') : document.querySelector('header.major');
    const header = document.getElementById('header');

    const options = {
      rootMargin: '0px 0px 0px 0px',
      threashold: 0,
    }

    let observer = new IntersectionObserver(function(entries, observer) {
      entries.forEach(entry => {
        if(entry.intersectionRatio!=1) {
          if(header.classList.contains('alt')) {
            header.classList.remove('alt');
            header.classList.add('reveal');
          } else if(header.classList.contains('reveal')) {
            header.classList.remove('reveal');
            header.classList.add('alt');
          }
        }
      })
    }, options);

    observer.observe(toObserve);

    navBtn.addEventListener('click', function(e) {
      body.classList.add('is-menu-visible');
    });

    closeBtn.addEventListener('click', function(e) {
      body.classList.remove('is-menu-visible');
    })
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
