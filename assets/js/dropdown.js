document.addEventListener("DOMContentLoaded", () => {
  const dropdowns = document.querySelectorAll(".dropdown"); // Dropdown links

  dropdowns.forEach((dropdown) => {
    const dropdownContent = dropdown.nextElementSibling; // dropdown-container direkt nach der dropdown <a> tag
    let closeTimeout;

    dropdown.addEventListener("mouseenter", () => {
      clearTimeout(closeTimeout);
      closeOtherDropdowns(dropdowns, dropdown);
      openDropdown(dropdownContent);
    });

    dropdown.addEventListener("mouseleave", () => {
      closeTimeout = setTimeout(() => {
        closeDropdown(dropdownContent);
      }, 5000);
    });

    dropdownContent.addEventListener("mouseenter", () => {
      clearTimeout(closeTimeout);
      openDropdown(dropdownContent);
    });

    dropdownContent.addEventListener("mouseleave", () => {
      closeTimeout = setTimeout(() => {
        closeDropdown(dropdownContent);
      }, 5000);
    });
  });

  // Funktion zum Öffnen eines Dropdowns
  function openDropdown(content) {
    content.style.opacity = "1";
    content.style.visibility = "visible";
    content.style.transform = "translateY(0)";
  }

  // Funktion zum Schließen eines Dropdowns
  function closeDropdown(content) {
    content.style.opacity = "0";
    content.style.visibility = "hidden";
    content.style.transform = "translateY(-10px)";
  }

  // Funktion zum Schließen anderer Dropdowns
  function closeOtherDropdowns(allDropdowns, currentDropdown) {
    allDropdowns.forEach((dropdown) => {
      if (dropdown !== currentDropdown) {
        const dropdownContent = dropdown.nextElementSibling;
        closeDropdown(dropdownContent);
      }
    });
  }
});

document.addEventListener("DOMContentLoaded", () => {
  const languageButton = document.querySelector(".languageButton");
  const languageMenu = document.querySelector(".dropdownLanguageMenu");

  if (languageButton && languageMenu) {
    languageButton.addEventListener("click", (e) => {
      e.stopPropagation();
      languageMenu.classList.toggle("show");
    });

    document.addEventListener("click", () => {
      languageMenu.classList.remove("show");
    });
  }
});
