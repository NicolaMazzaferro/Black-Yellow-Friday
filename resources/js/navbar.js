const navbar = document.getElementById("navbar");
window.addEventListener("scroll", () => {
  if (window.scrollY > 50) {
    navbar.classList.add("bg-black", "shadow-md");
  } else {
    navbar.classList.remove("bg-black", "shadow-md");
  }
});

document.addEventListener('DOMContentLoaded', () => {
  const dropdown = document.getElementById('categoriesDropdown');
  const list = document.getElementById('categoriesList');

  dropdown?.addEventListener('click', () => {
    list.classList.toggle('hidden');
  });
});

window.toggleNavbar = function(collapseID) {
  document.getElementById(collapseID).classList.toggle("hidden");
  document.getElementById(collapseID).classList.toggle("block");
};
