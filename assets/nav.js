// Mobile nav toggle — ported from the Astro Header component.
(function () {
  var header = document.getElementById('site-header');
  var toggle = header && header.querySelector('.site-nav-toggle');
  var nav = document.getElementById('site-nav');

  function setOpen(open) {
    if (header) header.classList.toggle('site-header--open', open);
    if (toggle) {
      toggle.setAttribute('aria-expanded', String(open));
      toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    }
    document.body.classList.toggle('nav-open', open);
  }

  if (toggle) {
    toggle.addEventListener('click', function () {
      setOpen(!header.classList.contains('site-header--open'));
    });
  }
  if (nav) {
    nav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () { setOpen(false); });
    });
  }
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') setOpen(false);
  });
  window.addEventListener('resize', function () {
    if (window.innerWidth > 768) setOpen(false);
  });
})();
