//Sponsor Swiper
const sponsorSwiper = new Swiper('.sponsorSwiper', {
    speed: 600,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false
    },
    slidesPerView: 3,
    breakpoints: {
        320: { slidesPerView: 1, spaceBetween: 10 },
        768: { slidesPerView: 3, spaceBetween: 30 },
        1024: { slidesPerView: 4, spaceBetween: 30}
    }
});

// Events Swiper
const partnerSwiper = new Swiper('.swiperEvents', {
    speed: 600,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false
    },
    slidesPerView: 2,
    breakpoints: {
        320: { slidesPerView: 1, spaceBetween: 10 },
        768: { slidesPerView: 2, spaceBetween: 15 },
        1024: { slidesPerView: 2, spaceBetween: 15 }
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

// Offcanvas Script
const OffcanvasCollapsibles = document.querySelectorAll(".offcanvas-menu .img-icon");
OffcanvasCollapsibles.forEach((item) => item.addEventListener("click", function() {
    this.classList.toggle("offcanvas_expanded");
    // Collapse all other dropdowns
    collapsibles.forEach((otherItem) => {
        if (otherItem !== item) {
            otherItem.classList.remove("offcanvas_expanded");
        }
    });
})
);


// Main Menu Script
const collapsibles = document.querySelectorAll(".img-icon");

// Function to collapse all dropdowns
function collapseAllDropdowns() {
    collapsibles.forEach((item) => {
        item.classList.remove("dropdown_expanded");
    });
}

// Add click event listener to each .img-icon
collapsibles.forEach((item) => {
    item.addEventListener("click", function(event) {
        // Toggle the expanded class for the clicked item
        this.classList.toggle("dropdown_expanded");

        // Collapse all other dropdowns
        collapsibles.forEach((otherItem) => {
            if (otherItem !== item) {
                otherItem.classList.remove("dropdown_expanded");
            }
        });

        // Prevent event from propagating to document click handler
        event.stopPropagation();
    });
});

// Add click event listener to the entire document
document.addEventListener("click", function() {
    // Collapse all dropdowns when clicking anywhere on the page
    collapseAllDropdowns();
});

// AOS Initialize
AOS.init();