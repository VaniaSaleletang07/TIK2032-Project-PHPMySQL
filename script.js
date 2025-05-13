document.addEventListener("DOMContentLoaded", function() {
    const text = "Vania Esther Saleletang";
    const typingElement = document.getElementById("typing-text");
    let index = 0;
  
    function type() {
      if (index < text.length) {
        typingElement.textContent += text.charAt(index);
        index++;
        setTimeout(type, 100); 
      }
    }
  
    type();
  });



const hiddenElements = document.querySelectorAll('.hidden');
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
            entry.target.classList.remove('hidden');
        }
    });
}, { threshold: 0.1 });

hiddenElements.forEach(el => observer.observe(el));


const skillBars = document.querySelectorAll('.progress-bar');
skillBars.forEach(bar => {
    bar.style.width = '0%'; 

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const targetWidth = bar.textContent;
                bar.style.width = targetWidth;
            }
        });
    }, { threshold: 0.5 });

    observer.observe(bar);
});

  const galleryImages = document.querySelectorAll('.gallery-img');
  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.getElementById('lightbox-img');

  galleryImages.forEach(img => {
    img.addEventListener('click', () => {
      lightboxImg.src = img.src;
      lightbox.classList.add('show');
    });
  });

  lightbox.addEventListener('click', () => {
    lightbox.classList.remove('show');
  });

document.addEventListener("DOMContentLoaded", () => {
    const toggleDarkMode = document.getElementById("dark-mode-toggle");
    const allElements = document.querySelectorAll("*");

    const savedTheme = localStorage.getItem("theme");
    if (savedTheme === "dark") {
        document.body.classList.add("dark-mode");
    }

    toggleDarkMode.addEventListener("click", () => {
        document.body.classList.toggle("dark-mode");

        if (document.body.classList.contains("dark-mode")) {
            localStorage.setItem("theme", "dark");
        } else {
            localStorage.setItem("theme", "light");
        }
    });
});