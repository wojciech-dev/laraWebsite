const productDivs = document.querySelectorAll('.product');
const categorySelect = document.querySelectorAll('.select-category');


for (let i = 0; i < categorySelect.length; i++) {
  categorySelect[i].addEventListener("click", function (e) {
    const category = e.target.innerText;

    categorySelect.forEach((el) => el.classList.remove("bg-teal-300"));
    this.classList.add("bg-teal-300");

    [...productDivs].forEach(item => {
      const display = item.dataset.category === category || category === 'all';
      item.style.display = display ? '' : 'none';
    });
  });
}
