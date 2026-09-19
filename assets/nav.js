// Mobile nav toggle — ported from the Astro Header component.
(function () {
  var header = document.getElementById('site-header');
  var toggle = header && header.querySelector('.site-nav-toggle');
  var nav = document.getElementById('site-nav');
  var isOpen = false;

  function navLinks() {
    return nav ? Array.prototype.slice.call(nav.querySelectorAll('a[href]')) : [];
  }

  function setOpen(open) {
    isOpen = open;
    if (header) header.classList.toggle('site-header--open', open);
    if (toggle) {
      toggle.setAttribute('aria-expanded', String(open));
      toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    }
    document.body.classList.toggle('nav-open', open);

    // Move focus into the open menu, and give it back to the toggle on
    // close, so keyboard/screen-reader users land somewhere sensible rather
    // than wherever focus happened to be on the covered page underneath.
    if (open) {
      var links = navLinks();
      if (links[0]) links[0].focus();
    } else if (toggle && document.activeElement && nav && nav.contains(document.activeElement)) {
      toggle.focus();
    }
  }

  // Keep Tab from walking out of the open menu into the (scrim-covered)
  // page behind it — cycles between the toggle button and the nav links.
  function trapFocus(e) {
    if (e.key !== 'Tab' || !isOpen) return;
    var focusables = [toggle].concat(navLinks()).filter(Boolean);
    if (focusables.length < 2) return;
    var first = focusables[0];
    var last = focusables[focusables.length - 1];
    if (e.shiftKey && document.activeElement === first) {
      e.preventDefault();
      last.focus();
    } else if (!e.shiftKey && document.activeElement === last) {
      e.preventDefault();
      first.focus();
    }
  }

  if (toggle) {
    toggle.addEventListener('click', function () {
      setOpen(!isOpen);
    });
  }
  if (nav) {
    navLinks().forEach(function (link) {
      link.addEventListener('click', function () { setOpen(false); });
    });
  }
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && isOpen) setOpen(false);
    trapFocus(e);
  });
  // Tapping the scrim (anything outside the header) closes the menu, the
  // way a modal backdrop click would.
  document.addEventListener('click', function (e) {
    if (!isOpen || !header) return;
    if (header.contains(e.target)) return;
    setOpen(false);
  });
  window.addEventListener('resize', function () {
    if (window.innerWidth > 768) setOpen(false);
  });
})();
