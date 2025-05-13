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

document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("dark-mode-toggle");
    const body = document.body;

    // Cek apakah pengguna sudah mengaktifkan Dark Mode sebelumnya
    if (localStorage.getItem("dark-mode") === "enabled") {
        body.classList.add("dark-mode");
        console.log("Dark mode diaktifkan dari localStorage.");
    }

    // Tambahkan event listener untuk tombol dark mode
    if (toggleButton) {
        toggleButton.addEventListener("click", function () {
            if (body.classList.contains("dark-mode")) {
                body.classList.remove("dark-mode");
                localStorage.setItem("dark-mode", "disabled"); // Simpan preferensi ke localStorage
                console.log("Dark mode dinonaktifkan.");
            } else {
                body.classList.add("dark-mode");
                localStorage.setItem("dark-mode", "enabled"); // Simpan preferensi ke localStorage
                console.log("Dark mode diaktifkan.");
            }
        });
    } else {
        console.error("Tombol dark mode tidak ditemukan di halaman ini.");
    }
});