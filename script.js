document.addEventListener("DOMContentLoaded", function() {
    const text = "Vania Esther Saleletang";
    const typingElement = document.getElementById("typing-text");
    let index = 0;
  
    function type() {
      if (index < text.length) {
        typingElement.textContent += text.charAt(index);
        index++;
        setTimeout(type, 100); // kecepatan mengetik
      }
    }
  
    type();
  });